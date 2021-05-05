<?php

namespace App\Http\Controllers;

use App\custommer;
use App\Mail\MailNotify;
use App\orderdetail;
use App\orders;
use App\product;
use App\productAttribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class cardController extends Controller
{


    public function index()
    {
        $custommer = custommer::find(Auth::guard('custommer')->id());
        $data = Cart::instance('shopping')->content();
        $total = 0;
        foreach ($data as $item) {
            $price = $item->price;
            $total += $price;
        }
        // dd($data);
        return view('client.checkout.index', compact('data', 'total', 'custommer'));
    }


    public function addToCard(Request $request, $id)
    {
        $custommerid = Auth::guard('custommer')->id();
        $product = product::find($id);
        $productattribute = productAttribute::where('product_id', $product->id)
            ->where('attributevalue_id', $request->attributevalue_id)
            ->where('attributevaluesize_id', $request->attributevaluesize_id)->first();
        $ids = $productattribute->id;
        $cart = Cart::search(function ($cartItem, $rowId) use ($ids) {
            return $cartItem->id === $ids;
        });
        $item = $cart->first();
        if (!empty($item)) {
            $item = Cart::instance('shopping')->get($cart[0]);
            Cart::instance('shopping')->update($item->rowId, ['qty' => $item->qty + 1]);
        } else {
            if ($product->startsale == 1) {
                $dc = $product->discount;
                $expr = $productattribute->export_price;
                $price = $expr * (100 - $dc) / 100;
                $data = Cart::instance('shopping')->add(array('id' => $ids, 'name' => $product->name, 'weight' => 1, 'qty' => $request->quantity, 'price' => $price, 'options' => ['size' => $productattribute->productsize->name, 'color' => $productattribute->productcolor->name]));
            } else {
                $data = Cart::instance('shopping')->add(array('id' => $ids, 'name' => $product->name, 'weight' => 1, 'qty' => $request->quantity, 'price' => $productattribute->export_price, 'options' => ['size' => $productattribute->productsize->name, 'color' => $productattribute->productcolor->name]));
            }
        }

        return redirect('/gio-hang');
    }
    public function addToCards(Request $request, $id)
    {
        $custommerid = Auth::guard('custommer')->id();
        $product = product::find($id);
        $productattribute = productAttribute::where('product_id', $product->id)->first();
        $ids = $productattribute->id;
        $cart = Cart::search(function ($cartItem, $rowId) use ($ids) {
            return $cartItem->id === $ids;
        });
        $item = $cart->first();
        if (!empty($item)) {
            $item = Cart::instance('shopping')->get($cart[0]);
            Cart::instance('shopping')->update($item->rowId, ['qty' => $item->qty + 1]);
        } else {
            if ($product->startsale == 1) {
                $dc = $product->discount;
                $expr = $productattribute->export_price;
                $price = $expr * (100 - $dc) / 100;
                $data = Cart::instance('shopping')->add(array('id' => $ids, 'name' => $product->name, 'weight' => 1, 'qty' => $request->qty, 'price' => $price));
            } else {
                $data = Cart::instance('shopping')->add(array('id' => $ids, 'name' => $product->name, 'weight' => 1, 'qty' => $request->qty, 'price' => $productattribute->export_price));
            }
        }

        return response()->json(['code'=>200]);
    }
    public function checkout(Request $request)
    {

        $total = 0;
        $date_order = Carbon::now()->toDateString();
        $cart = Cart::instance('shopping')->content();
        foreach ($cart as $item) {

            $total_price = $item->qty * $item->price;
            $total += $total_price;
        }
        $order_code=Str::random(7);
        $order = new orders();
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->phone = $request->phone;
        $order->amount = $total;
        $order->status = 1;
        $order->order_code=$order_code;
        $order->order_date = $date_order;
        $order->custommer_id = Auth::guard('custommer')->id();
        $order->address = $request->address;
        $order->save();

        foreach ($cart as $item) {
            $orderdetail = new orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $item->id;
            $orderdetail->quantity = $item->qty;
            $orderdetail->total_price = $item->qty * $item->price;
            $orderdetail->save();
        }
        $orderdetail = orders::join('order_detail', 'orders.id', '=', 'order_detail.order_id')
         ->leftjoin('product_attribute', 'order_detail.product_id', '=', 'product_attribute.id')
         ->leftjoin('product', 'product_attribute.product_id', '=', 'product.id')
         ->leftjoin('attribute_value', 'product_attribute.attributevalue_id', '=', 'attribute_value.id')
         ->leftjoin('attribute_value_size', 'product_attribute.attributevaluesize_id', '=', 'attribute_value_size.id')
         ->where('orders.id', '=', $order->id)
         ->select('orders.*', 'order_detail.order_id', 'order_detail.product_id as productid', 'order_detail.quantity as soluong', 'order_detail.total_price', 'product_attribute.*', 'product.name as productname', 'attribute_value.name as color', 'attribute_value_size.name as size')
         ->get();
        Cart::instance('shopping')->destroy();
        $url = route('donhang', ['id'=>$order->id]);
        Mail::send('emails.mail', array('order'=>$order, 'url'=>$url,'orderdetail'=>$orderdetail), function ($message) {
            $message->from('sinnobi11226@gmail.com', 'Đơn hàng mới');
            $message->to('1710294@dlu.edu.vn', 'Đơn hàng mới'); 
            $message->subject('Một đơn hàng mới vừa được tạo');
        });
        return redirect('/');
    }
    public function cart()
    {
        $data = Cart::instance('shopping')->content();
        $total = 0;
        foreach ($data as $item) {
            $price = $item->price;
            $total += $price;
        }
        return view('client.productcart.index',compact('data','total'));
    }
    public function delete($id)
    {
        

        Cart::instance('shopping')->remove($id);
        return response()->json([
            'code'=>200,
            'message'=>'success'
        ]);
    }
}
