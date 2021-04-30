<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\product_spetification;
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
        ->select('attributevaluesize_id','export_price')
        ->groupBy('attributevaluesize_id','export_price')
        ->get();
        $productimg=productImage::where('product_id',$product->id)->get();
        $productspe=product::join('product_spetification','product.id','=','product_spetification.product_id')
                    ->leftjoin('specifications','product_spetification.spetification_id','=','specifications.id')
                    ->select('product_spetification.content','specifications.name')
                    ->where('slug',$slug);
        $productalike=product::whereNotIn('id',[$product->id])->where('category_id',$product->category_id)->get();
       
        
        return view('client.product.index',compact('product','productattribute','productimg','productspe','productalike'));
    }
    public function card(Request $request,$id)
    {
        
       

       return back();
    
    }
}
