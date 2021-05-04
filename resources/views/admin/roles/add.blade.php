@extends('admin.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">

        <form accept-charset="utf-8" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">



                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Tạo vai trò</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="container">



                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Thông tin vai trò</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body ">


                                                <div class="row">


                                                    <label for="disabledTextInput">Tên vai trò
                                                        <span style="color: red;font-size:20px">*</span></label>
                                                    <input type="text" name="name" class="form-control" placeholder=""
                                                        required>

                                                </div>
                                                <div class=" row">


                                                    <label for="disabledTextInput">Tên hiển thị
                                                        <span style="color: red;font-size:20px">*</span></label>
                                                        <input type="text" name="displayname" class="form-control" placeholder=""
                                                        required>

                                                </div>
                                                <br>
                                                <br>
                                                <div class="row">


                                                    <label for="disabledTextInput">Quyền</label>


                                                </div>

                                                @foreach ($permission as $item)
                                                    <div class="card">
                                                        <div class="card-header"
                                                            style="background-color: rgb(123, 83, 168)">
                                                            <input type="checkbox">
                                                            <label for="">Module {{ $item->displayname }}</label>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                @foreach ($item->permissionchildrent as $items)
                                                                    <div class="col-md-3">
                                                                        <input name="permission_id[]" value="{{ $items->id }}" type="checkbox">
                                                                        <label for="">{{ $items->displayname }}</label>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class=" row">
                                                    <button type="submit" class="btn btn-success float-right">Lưu</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>
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
