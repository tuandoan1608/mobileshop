@extends('client.master')
@section('content')
<div class="col-md-12" id="errors">
    @include('flash::message')
</div>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Login Register</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->
                    <form action="/login" method="POST">
                        
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Đăng nhập</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                        
                            <div class="row">
                               
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email</label>
                                    <input class="mb-0" type="email" name="email" placeholder="Email Address">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Mật khẩu</label>
                                    <input class="mb-0" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Nhớ tài khoảng</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    <a href="/quen-mat-khau"> Quên mật khẩu</a>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="register-button mt-0">Đăng nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <form action="/register" method="post">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Đăng ký</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Họ tên lót</label>
                                    <input class="mb-0" name="firstname" type="text" placeholder="Họ tên lót">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>tên</label>
                                    <input class="mb-0" type="text" name="lastname" placeholder="Tên">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Mật khẩu</label>
                                    <input class="mb-0" name="password" type="password" placeholder="Mật khẩu">
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Số điện thoại</label>
                                    <input class="mb-0" type="number" name="phone" placeholder="Số điện thoại">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Email </label>
                                    <input class="mb-0" type="email" name="email" placeholder="Email ">
                                </div>
                                <div class="col-md-12 mb-20">
                                    <label>Địa chỉ </label>
                                    <input class="mb-0" type="text" name="address" placeholder="Địa chỉ">
                                </div>

                                <div class="col-12">
                                    <button class="register-button mt-0">Đăng ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('div.alert').delay(3000).slideUp();
    </script>
@endsection