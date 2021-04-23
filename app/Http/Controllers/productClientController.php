<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productClientController extends Controller
{
    public function index()
    {
        return view('client.productdetail.index');
    }
}
