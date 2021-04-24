<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Http\Request;

class homeClientController extends Controller
{
    public function index()
    {
        
        $dienthoai=category::where('status',1)->where('id',38)->first();
        $phukien=category::where('status',1)->where('id',39)->first();
        $productphone=product::where('status',1)->where('category_id',38)->get();
        
        return view('client.productdetail.index',compact('dienthoai','phukien','productphone'));
    }
}
