<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeClientController extends Controller
{
    public function index()
    {
        
        $dienthoai=category::where('status',1)->where('id',38)->first();
        $phukien=category::where('status',1)->where('id',39)->first();
        $productphone=product::where('status',1)->get();
        $category=category::all();

        return view('client.productdetail.index',compact('productphone','category'));
    }
}
