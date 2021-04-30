<?php

namespace App\Http\Controllers;

use App\attributevalue;
use App\attributevalue_size;
use App\category;
use App\product;
use App\producttype;
use Illuminate\Http\Request;

class productcateController extends Controller
{
    public function index($slug)
    {
        $cate = category::where('slug', $slug)->first();
        $brand = producttype::where('categori_id', $cate->id)->get();

        $product = product::where('category_id', $cate->id)->where('status',1)->paginate(20);
        return view('client.productcatorgori.index', compact('brand',  'product'));
    }
    
}
