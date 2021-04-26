<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\productAttribute;
use App\productImage;
use App\specification;
use Illuminate\Http\Request;

class productClientController extends Controller
{
    public function index($slug)
    {
        $product=product::where('slug',$slug)->first();
        $productattribute=productAttribute::where('product_id',$product->id)
        ->select('attributevaluesize_id')
        ->groupBy('attributevaluesize_id')
        ->get();
        $productimg=productImage::where('product_id',$product->id)->get();
        $specification=specification::where('product_id',$product->id)->first();
        return view('client.product.index',compact('product','productattribute','specification','productimg'));
    }
    public function card(Request $request,$id)
    {
        
        // $product = product::find($id);
       
        // $rows = Cart::search(function($key, $value) {
        //     return $key->id ===  Request::get('id');
        // });
        
        // $item = $rows->first();
   
        // if(!empty($item)){
           
        //     $item = Cart::get($rows[0]);
        //     Cart::instance('shopping')->update($item->rowId, $item->qty + 1);
        // }else{
        //   if(!empty($request->quantity)){
        //     $data= Cart::instance('shopping')->add(array('id' => $id,'custommerID'=>$custommerid,'image'=>$product->image,'slug'=>$product->metatitle, 'name' => $product->name, 'qty' => $request->quantity, 'price' => $product->price,'weight' => 1));
        //   }else{
        //     $data= Cart::instance('shopping')->add(array('id' => $id,'custommerID'=>$custommerid,'image'=>$product->image,'slug'=>$product->metatitle, 'name' => $product->name, 'qty' => 1, 'price' => $product->price,'weight' => 1));
        //   }
        // }

       return back();
    
    }
}
