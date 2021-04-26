<?php

namespace App\Http\Controllers;

use App\custommer;
use App\orderdetail;
use App\orders;
use App\product;
use App\productAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
class cardController extends Controller
{
 
    
    public function index()
    {
    
       
        $custommer=custommer::find(Auth::guard('custommer')->id());
    
        $data=Cart::instance('shopping')->content();
        $total =  Cart::instance('shopping')->total();
        // dd($data);
        return view('client.checkout.index',compact('data','total','custommer'));
    }


    public function addToCard(Request $request, $id)
    {
      
        $custommerid = Auth::guard('custommer')->id();
        $product = product::find($id);
        $productattribute = productAttribute::where('product_id', $product->id)
            ->where('attributevalue_id', $request->attributevalue_id)
            ->where('attributevaluesize_id', $request->attributevaluesize_id)->first();
        $ids=$productattribute->id;
     
        $cart=Cart::search(function ($cartItem, $rowId) use($ids) {
            return $cartItem->id === $ids;
        });
       
        $item = $cart->first();
       
    
        if (!empty($item)) {
            $item = Cart::instance('shopping')->get($cart[0]);
            Cart::instance('shopping')->update($item->rowId, ['qty' => $item->qty+1]);
            
        } else {
            $data = Cart::instance('shopping')->add(array('id' => $ids,'name'=>$product->name,'weight'=>1, 'qty' => $request->quantity, 'price' => $product->price,'options' => ['size' => $productattribute->productsize->name,'color'=>$productattribute->productcolor->name] ));
               
            
        }
   
        return redirect('/gio-hang');
    }

    public function checkout(Request $request)
    {
       $total=0;
        $cart=Cart::instance('shopping')->content();
        foreach($cart as $item){
           
            $total += $total_price=$item->qty * $item->price;
         
          }
        
       $order=new orders();
       $order->firstname=$request->firstname;
       $order->lastname=$request->lastname;
       $order->phone=$request->phone;
       $order->amount=$total;
       $order->status=1;
       $order->custommer_id=Auth::guard('custommer')->id();
       $order->address=$request->address;
       $order->save();
     
      foreach($cart as $item){
        $orderdetail=new orderdetail();
        $orderdetail->order_id=$order->id;
        $orderdetail->product_id=$item->id;
        $orderdetail->quantity=$item->qty;
        $orderdetail->total_price=$item->qty * $item->price;
        $orderdetail->save();
      }
      Cart::instance('shopping')->destroy();
      return redirect('/');
    }
}
