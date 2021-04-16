<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accessoriesController extends Controller
{
    public function index()
    {
        return view('admin.accessories.index');
    }
}
