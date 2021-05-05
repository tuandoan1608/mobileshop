<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            
            return redirect('/admin/trang-chu');
        } else {
            return redirect()->route('login');
        }
    }
    public function home()
    {
        return view('admin.home.index');
    }
}
