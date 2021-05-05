@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>
        <section class="content-header col-md-12" style="margin:10px; display:inline">

            <div class="heder-tab" style=" margin-left:20px;  padding:10px;
                      
                    list-style: none;
                    background-color: white;
                    border-radius: 4px;">
                <ol id="menu" class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i> Trang chủ /</a></li>
                    <li><a href="">Nhân viên / </a></li>
                    <li class="active">Danh sách</li>

                </ol>
                <div style="float: right;margin-top:-32px"><a href="{{ route('user.create') }}"><button
                            class="btn btn-success">Tạo tài khoản</button></a></div>
            </div>



        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên nhân viên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                 
                                            <th>Địa chỉ</th>
                                            <th>Chĩnh sửa</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)


                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td><button class="btn btn-primary edit" title="{{ 'Sửa ' . $item->name }}"
                                                        type="button" ><a style="text-decoration: none;color:white;" href="/admin/user/{{ $item->id }}/edit"><i class="fas fa-edit"></i></a></button>
                                                    <button class="btn btn-danger delete" title="{{ 'Xóa ' . $item->name }}"
                                                        type="button" data-url="/admin/category/{{ $item->id }}"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "pageLength": 25,
                "lengthChange": false,
                "autoWidth": false,
                "language": {
                    "search": "Tìm kiếm:",
                    "info": "Hiển thị _START_ từ _END_ của _TOTAL_ bản ghi",
                    "infoEmpty": "Chưa có dữ liệu",
                    "loadingRecords": "Vui lòng đợi - loading...",
                    "processing": "Đang xử lý...",
                    "paginate": {

                        "next": "Tiếp",
                        "previous": "Lùi",
                        "first": "Đầu",
                        "last": "Cuối",


                    }
                },
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
        $('div.alert').delay(3000).slideUp();
        $(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                let urlreq = $(this).data('url');
                let that = $(this);
                Swal.fire({
                    title: 'Chắc chắn xóa?',
                    text: "Bạn không thể lấy lại dữ liệu!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'yes'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'delete',
                            url: urlreq,
                            success: function(data) {
                                if (data.code == 200) {
                                    that.parent().parent().remove();
                                    Swal.fire(
                                        'Thành công!',
                                        'Xóa thành công.',
                                        'success'
                                    )
                                } else {
                                    Swal.fire(
                                        'Không thể xóa',
                                        'Có loại sản phẩm thuộc danh mục này.',
                                        'error'
                                    )
                                }
                            }
                        })

                    }
                })
            })
        })

    </script>
@endsection
