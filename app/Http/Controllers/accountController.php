<?php

namespace App\Http\Controllers;

use App\custommer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laracasts\Flash\Flash;

class accountController extends Controller
{ 
    use AuthenticatesUsers;
   
public function __construct()
{
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:custommer')->except('logout');
        
        
}
    
    public function index()
    {

        return view('client.account.login_register');
    }
    public function login(Request $request)
    {
  
       
      
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);
        if (Auth::guard('custommer')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/');
        }
        else{
            
            Flash::error('Tài khoảng hoặc mật khẩu không đúng.');
            return back()->withInput()->withErrors('Tài khoảng hoặc mật khẩu không đúng');
         }
    }
    public function register()
    {
        # code...
    }
    public function update(Request $request)
    {
        $data=[
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'phone'=>$request->phone,
            'address'=>$request->address
        ];
        $custommer=custommer::where('id',Auth::guard('custommer')->id())->update($data);
       

        return redirect('/gio-hang');
    }
    public function logout()
    {
        
        Auth::logout();
       return redirect('/dang-nhap');
    }
}
