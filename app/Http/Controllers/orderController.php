<?php

namespace App\Http\Controllers;

use App\orderdetail;
use App\orders;
use App\productAttribute;
use App\statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
   public function index()
   {
        $data=orders::all();
        return view('admin.orders.list',compact('data'));
   }

   public function getorder( $id)
   {  
    
      $order=orders::find($id);
      $orderdetail = orders::join('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->leftjoin('product_attribute', 'order_detail.product_id', '=', 'product_attribute.id')
            ->leftjoin('product', 'product_attribute.product_id', '=', 'product.id')
            ->leftjoin('attribute_value', 'product_attribute.attributevalue_id', '=', 'attribute_value.id')
            ->leftjoin('attribute_value_size', 'product_attribute.attributevaluesize_id', '=', 'attribute_value_size.id')
            ->where('orders.id', '=', $id)
            ->select('orders.*', 'order_detail.order_id','order_detail.product_id as productid','order_detail.quantity as soluong','order_detail.total_price','product_attribute.*','product.name as productname','attribute_value.name as color','attribute_value_size.name as size' )
            ->get();
      // dd($orderdetail);
 
      return view('admin.orderDetails.list',compact('order','orderdetail'));
   }
   public function update(Request $request,$id)
   {
      
      // dd($request->all());
      $order=orders::find($id);
      $order->status=$request->status;
      $order->save();
      $count=statistic::where('order_date',$order->order_date)->count();
      if($request->status==3){
        $total_order=orders::where('order_date',$order->order_date)->count();
        $sale=0;
        $quantity=0;
        $profit=0;
   
        foreach($request->productattribute_id as $key => $product_id){
            $product=productAttribute::find($product_id);
            $product_price=$product->export_price;
            $product_importprice=$product->import_price;
            $product_qty=$product->quantity;
            $product_sell=$product->quantity_sell;
            foreach($request->qty as $key1 =>$qty){
               if($key==$key1){
                  $pro_remain=$product_qty-$qty;
                  $productsell=$product_sell +$qty;
                  $product->quantity=$pro_remain;
                  $product->quantity_sell=$productsell;
                  $product->save();
                 $sale +=$product_price *$qty;
                 $quantity+=$qty;
                 $profit +=$product_importprice *$qty;
               }
            }
        }
        if($count >0){
            $statitic=statistic::where('order_date',$order->order_date)->first();
            $statitic->sales=$statitic->sales+$sale;
            $statitic->profit= $statitic->profit +$profit;
            $statitic->quantity= $statitic->quantity+$quantity;
            $statitic->total_order=$statitic->total_order+$total_order;
            $statitic->save();
        }else{
         $statitic=new statistic();
         $statitic->sales=$sale;
         $statitic->profit=$profit;
         $statitic->quantity=$quantity;
         $statitic->total_order=$total_order;
         $statitic->order_date=$order->order_date;
         $statitic->save();
        }
      }
      return back();
   }
}
