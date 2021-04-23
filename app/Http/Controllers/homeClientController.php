<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeClientController extends Controller
{
    public function index()
    {
        return view('client.productdetail.index');
    }
}
