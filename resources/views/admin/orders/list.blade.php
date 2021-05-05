@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách đơn hàng</h3>
                                <div style="float: right;margin-top:-5px"><a href="{{ route('product.create') }}"><button
                                            class="btn btn-success">tạo đơn hàng</button></a></div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                          
                                           
                                            <th>Tên khách hàng</th>

                                         
                                            <th>Trạng thái đơn hàng</th>
                                     
                                            <th>Tổng tiền</th>
                                            <th>Ngày tạo đơn</th>
                                           
                                            <th>Acction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                            
                                                

                                                <td>{{ $item->getcustomer->firstname }} {{ $item->getcustomer->lastname }}</td>
                                               
                                                <td>
                                                    @if ($item->status==1)
                                                        <span>Chưa xác nhận</span>
                                                    @elseif($item->status==2)
                                                    <span>Đã xác nhận</span>
                                                    @elseif($item->status==3)
                                                    <span>Đã đóng gói</span>
                                                    @elseif($item->status==4)
                                                    <span>Đã xuất kho</span>
                                                    @elseif($item->status==5)
                                                    <span>Đã hoàn thành</span>
                                                    @else
                                                    <span>Trả hàng</span>
                                                    @endif
                                                </td>
                                                
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <button class="btn btn-primary editProducttype"><a
                                                            style="text-decoration: none;color:white;"
                                                            href="/admin/don-hang/danh-sach/{{ $item->id }}"><i
                                                                class="fas fa-edit"></i></a></button>
                                                    <button class="btn btn-danger delete"
                                                        title="{{ 'Xóa ' . $item->name }}" type="button"
                                                        data-url="/admin/producttype/{{ $item->id }}"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
            $("#example1").DataTable({
                "responsive": true,
                "pageLength": 25,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
        $('div.alert').delay(3000).slideUp();

    </script>

@endsection
