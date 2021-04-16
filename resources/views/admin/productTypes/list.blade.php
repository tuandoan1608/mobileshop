@extends('admin.master')

@section('content')
  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>
            <section class="content-header col-md-12" style="margin:10px; display:inline" >
           
                <div class="heder-tab" style=" margin-left:20px;  padding:10px;
                  
                list-style: none;
                background-color: white;
                border-radius: 4px;">
                    <ol id="menu" class="breadcrumb" >
                        <li><a href=""><i class="fa fa-dashboard"></i> Home /</a></li>
                        <li><a href="">category / </a></li>
                        <li class="active">List</li>
                        
                    </ol>
                    <div style="float: right;margin-top:-32px"><a href="{{route('producttype.create')}}"><button class="btn btn-success">Thêm danh mục</button></a></div>
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
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên loại sản phẩm</th>
                                                <th>Slug</th>
                                                <th>Danh mục sản phẩm</th>
                                                <th>Trạng thái</th>
                                                <th>Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            @foreach($producttype as $key => $value)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->slug }}</td>
                                                    <td>{{ $value->category->name }}</td>
                                                    <td>
                                                        @if($value->status==1)
                                                            {{ "Hiển thị" }}
                                                        @else
                                                            {{ "Không hiển thị" }}
                                                        @endif		
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary editProducttype" title="{{ "Sửa ".$value->name }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-danger delete" title="{{ "Xóa ".$value->name }}"  type="button" data-url="/admin/producttype/{{$value->id}}"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                  
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa loại sản phẩm <span class="title"></span></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="margin: 5px">
                                            <div class="col-lg-12">
                                                <form role="form">
                                                    <fieldset class="form-group">
                                                        <label>Tên loại sản phẩm</label>
                                                        <input class="form-control name" name="name" placeholder="Nhập tên loại sản phẩm">
                                                        <div class="alert alert-danger error"></div>
                                                    </fieldset>
                                                    <div class="form-group">
                                                        <label>Danh mục sản phẩm</label>
                                                        <select class="form-control idCategory" name="categori_id"></select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Trạng thái</label>
                                                        <select class="form-control status" name="status">
                                                            <option value="1" class="ht">Hiển Thị</option>
                                                            <option value="0" class="kht">Không Hiển Thị</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success updateProductType">Save</button>
                                        <button type="reset" class="btn btn-primary">Làm Lại</button>
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'delete',
                            url: urlreq,
                            success: function(data) {
                                if (data.code == 200) {
                                    that.parent().parent().remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
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
