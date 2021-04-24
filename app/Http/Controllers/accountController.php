<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class accountController extends Controller
{  const ALL_GUARD = [
    'custommer'
];
public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:custommer');
     
    }
    public function guard()
    {
        return Auth::guard('custommer');
    }
    public function index()
    {

        return view('client.account.login_register');
    }
    public function login(Request $request)
    {
        $data=$request->only('email','password');
        if (Auth::guard('custommer')->attempt($data)) {
            
           return redirect()->route('/');
        }
        else{
            return view('client.account.login_register');
         }
    }
    public function register()
    {
        # code...
    }
    public function forgetpass()
    {
        # code...
    }
}
