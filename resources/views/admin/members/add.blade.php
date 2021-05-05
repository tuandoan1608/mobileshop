@extends('admin.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">

        <form accept-charset="utf-8" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">



                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Tạo tài khoản</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="container">



                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Thông tin tài khoản</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body ">


                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <label for="disabledTextInput">Họ và tên đệm
                                                            <span style="color: red;font-size:20px">*</span></label>
                                                        <input type="text" name="firstname" class="form-control 
                                                                                        placeholder="" required>

                                                                    </div>

                                                                    <div class=" col-lg-6">
                                                        <label for="disabledTextInput">Tên <span
                                                                style="color: red;font-size:20px">*</span></label>
                                                        <input type="text" name="lastname" class="form-control "
                                                            placeholder="" required>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <label for="disabledTextInput">Email
                                                            <span style="color: red;font-size:20px">*</span></label>
                                                        <input type="email" name="email" class="form-control 
                                                                                        placeholder="" required>

                                                                    </div>

                                                                    <div class=" col-lg-6">
                                                        <label for="disabledTextInput">Mật khẩu <span
                                                                style="color: red;font-size:20px">*</span></label>
                                                        <input type="password" name="password" class="form-control "
                                                            placeholder="" required>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <label for="disabledTextInput">Số điện thoại
                                                            <span style="color: red;font-size:20px">*</span></label>
                                                        <input type="number" name="phone" class="form-control 
                                                                                        placeholder="" required>

                                                                    </div>

                                                                    <div class=" col-lg-6">
                                                        <label for="disabledTextInput">Vài trò <span
                                                                style="color: red;font-size:20px">*</span></label>
                                                        <select class="js-example-basic-multiple form-control" name="role[]"
                                                            multiple="multiple">

                                                            @foreach ($role as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <label for="disabledTextInput">Địa chĩ
                                                            <span style="color: red;font-size:20px">*</span></label>
                                                        <textarea class="form-control" name="address" id="" cols="30"
                                                            rows="10"></textarea>

                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-success float-right">Lưu</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
        </form>
        <!-- /.content -->
    </div>

@endsection



@section('script')

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
@endsection
