<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class loginController extends Controller
{
   public function index()
   {

      if(Auth::check()){
         return redirect('/admin/trang-chu');
      }else{
         return view('admin.auth.login');
      }
      
   }
   public function login(Request $request)
   {
      $user = $request->only('email', 'password');
      if (Auth::attempt($user)) {
         Flash::info('Đăng nhập thành công.');
         return redirect('/admin/trang-chu');
      } else {

         Flash::error('Tên đăng nhập hoặc mật khẩu không chính xác.');
         return redirect()->back();
      }
   }
   
   public function getLogout()
   {
       Auth::logout();
       Flash::info('Đăng xuất thành công.');
       return redirect()->route('login');
   }
   public function register()
   {
      return view('admin.auth.register');
   }
   public function registers(Request $request)
   {
      $data=[
         'name'=>'tuan',
         'email'=>$request->email,
         'password'=>bcrypt($request->password),
         'action'=>1
      ];
      DB::table('users')->create($data);
      return view('admin.auth.register');
   }
}
