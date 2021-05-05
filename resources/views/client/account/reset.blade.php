@extends('client.master')
@section('content')

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
                    <form action="/password/resets?email={{ request()->email }}" method="POST">

                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Đăng nhập</h4>


                            <div class="row">


                                <div class="col-12 mb-20">
                                    <label>Mật khẩu mới</label>
                                    <input class="mb-0 @error('email') is-invalid @enderror" type="password" name="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Xác nhận mật khẩu mới</label>
                                    <input class="mb-0 @error('password_config') is-invalid @enderror" type="password"
                                        name="password_config" placeholder="Password">
                                    @error('password_config')
                                        <span>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="register-button mt-0">Đổi mật khẩu</button>
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
