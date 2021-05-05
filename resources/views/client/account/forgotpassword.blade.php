@extends('client.master')

@section('content')



    <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Quên mật khẩu</li>
            </ul>
        </div>
    </div>
</div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Error 404 Area Start -->
    <div class="error404-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-wrapper text-center ptb-50 pt-xs-20">
                    
                    <div class="search-error">
                        <form id="search-form" method="post" action="/verify">
                            @csrf
                            <div id="errors">
                                @include('flash::message')
                            </div>
                            <input name="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Nhập email để lấy lại mật khẩu">
                            <button type="submit"><i class=""></i> Gửi</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $('#errors').delay(2000).slideUp();
</script>
@endsection
