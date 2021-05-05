<?php

namespace App\Http\Controllers;

use App\custommer;
use App\orderdetail;
use App\orders;
use App\product;
use App\productAttribute;
use App\statistic;
use App\User;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class orderController extends Controller
{
   public function index()
   {
      $this->authorize('order-list');
      $data = orders::orderby('status', 'asc')->get();
      return view('admin.orders.list', compact('data'));
   }

   public function getorder($id)
   {

      $order = orders::find($id);
      $orderdetail = orders::join('order_detail', 'orders.id', '=', 'order_detail.order_id')
         ->leftjoin('product_attribute', 'order_detail.product_id', '=', 'product_attribute.id')
         ->leftjoin('product', 'product_attribute.product_id', '=', 'product.id')
         ->leftjoin('attribute_value', 'product_attribute.attributevalue_id', '=', 'attribute_value.id')
         ->leftjoin('attribute_value_size', 'product_attribute.attributevaluesize_id', '=', 'attribute_value_size.id')
         ->where('orders.id', '=', $id)
         ->select('orders.*', 'order_detail.order_id', 'order_detail.product_id as productid', 'order_detail.quantity as soluong', 'order_detail.total_price', 'product_attribute.*', 'product.name as productname', 'attribute_value.name as color', 'attribute_value_size.name as size')
         ->get();
      // dd($orderdetail);

      return view('admin.orderDetails.list', compact('order', 'orderdetail'));
   }
   public function update(Request $request, $id)
   {
      $this->authorize('order-edit');
      // dd($request->all());
      $order = orders::find($id);
      $order->status = $request->status;
      $order->save();
      $count = statistic::where('order_date', $order->order_date)->count();
      if ($request->status == 3) {
         $total_order = orders::where('order_date', $order->order_date)->count();
         $sale = 0;
         $quantity = 0;
         $profit = 0;

         foreach ($request->productattribute_id as $key => $product_id) {
            $product = productAttribute::find($product_id);
            $product_price = $product->export_price;
            $product_importprice = $product->import_price;
            $product_qty = $product->quantity;
            $product_sell = $product->quantity_sell;
            foreach ($request->qty as $key1 => $qty) {
               if ($key == $key1) {
                  $pro_remain = $product_qty - $qty;
                  $productsell = $product_sell + $qty;
                  $product->quantity = $pro_remain;
                  $product->quantity_sell = $productsell;
                  $product->save();
                  $sale += $product_price * $qty;
                  $quantity += $qty;
                  $profit += $product_importprice * $qty;
               }
            }
         }
         if ($count > 0) {
            $statitic = statistic::where('order_date', $order->order_date)->first();
            $statitic->sales = $statitic->sales + $sale;
            $statitic->profit = $statitic->profit + $profit;
            $statitic->quantity = $statitic->quantity + $quantity;
            $statitic->total_order = $statitic->total_order + $total_order;
            $statitic->save();
         } else {
            $statitic = new statistic();
            $statitic->sales = $sale;
            $statitic->profit = $profit;
            $statitic->quantity = $quantity;
            $statitic->total_order = $total_order;
            $statitic->order_date = $order->order_date;
            $statitic->save();
         }
      }
      return back();
   }
   public function create()
   {
      $this->authorize('order-add');
      $addorder = Cart::instance('order')->content();

      $products = productAttribute::all();
     
      return view('admin.orders.add', compact('products', 'addorder'));
      
   }
   public function addorder($id)
   {
      $output = '';
      $data = productAttribute::find($id);
      if ($data->attributevalue_id != null) {
         $size = $data->productsize->name;
         $color = $data->productcolor->name;
      } else {
         $size = '';
         $color = '';
      }
      $product = product::find($data->product_id);
     
            $output .=
               '<tr> 
                  <td>' . $product->name . '</td>
                  <td>' . $size . '</td>
                  <td>' . $color . '</td>
                  <td><input type="number" class="form-control" value="' . $product->name . '" ></td>
                  <td>' . $data->export_price . '</td>
            </tr>';

           
         
         
      
      return response($output);
   }
   public function searchaccout(Request $request)
   {
      $search = $request->search;

      if ($search == '') {
         $employees = custommer::orderby('lastname', 'asc')->select('id', 'lastname')->limit(5)->get();
      } else {
         $employees = custommer::orderby('lastname', 'asc')->select('id', 'lastname')->where('lastname', 'like', '%' . $search . '%')->limit(5)->get();
      }

      $response = array();
      foreach ($employees as $employee) {
         $response[] = array(
            "id" => $employee->id,
            "text" => $employee->lastname
         );
      }

      echo json_encode($response);
      exit;
   }

   public function createorder(Request $request)
   {

      $date_order = Carbon::now()->toDateString();
      if ($request->price) {
         $total = 0;
         foreach ($request->price as $item) {
            $total += $item;
         }
      }

      $custommer = custommer::find($request->idcustommer);
      $order_code=Str::random(7);
      $order = new orders();
      $order->firstname = $custommer->firstname;
      $order->lastname =  $custommer->lastname;
      $order->phone =  $custommer->phone;
      $order->amount = $total;
      $order->status = 1;
      $order->order_code=$order_code;
      $order->order_date = $date_order;
      $order->custommer_id = $custommer->id;
      $order->address =  $custommer->address;
      $order->save();

      if ($request->price) {

         foreach ($request->price as $key => $item) {
            $orderdetail = new orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $request->product_id[$key];
            $orderdetail->quantity = $request->quantity[$key];
            $orderdetail->total_price = $request->quatity[$key] * $request->price[$key];
            $orderdetail->save();
         }
      }
      Cart::instance('order')->destroy();
   }
}
