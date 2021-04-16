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
                    <li><a href=""><i class="fa fa-dashboard"></i> Home /</a></li>
                    <li><a href="">category / </a></li>
                    <li class="active">List</li>

                </ol>
                <div style="float: right;margin-top:-32px"><a href="{{ route('category.create') }}"><button
                            class="btn btn-success">Thêm danh mục</button></a></div>
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
                                            <th>Tên danh mục</th>

                                            <th>Trạng thái</th>

                                            <th>Chĩnh sửa</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)


                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td><button class="btn btn-primary edit" title="{{ 'Sửa ' . $item->name }}"
                                                        data-toggle="modal" data-target="#edit" type="button"
                                                        data-id="{{ $item->id }}"><i class="fas fa-edit"></i></button>
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
                        <!-- /.card -->
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục <span
                                                class="title"></span></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="margin: 5px">
                                            <div class="col-lg-12">
                                                <form role="form" enctype="multipart/form-data">

                                                    <fieldset class="form-group">
                                                        <label>Tên danh mục </label>
                                                        <input class="form-control name" name="name"
                                                            placeholder="Nhập tên loại sản phẩm">
                                                        <div class="alert alert-danger errorName"></div>
                                                    </fieldset>

                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control status" name="status">
                                                            <option value="1" class="ht">Hiển Thị</option>
                                                            <option value="0" class="kht">Không Hiển Thị</option>
                                                        </select>
                                                    </div>
                                                    <button type="button" class="btn btn-success update">Save</button>
                                                    <button type="reset" class="btn btn-primary">Nhập Lại</button>
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- delete Modal-->

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
