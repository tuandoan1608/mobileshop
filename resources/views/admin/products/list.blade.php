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
                                h3 class="card-title">Danh sách sản phẩm</h3>
                                <div style="float: right;margin-top:-5px"><a href="{{ route('product.create') }}"><button
                                            class="btn btn-success">Thêm sản phẩm</button></a></div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên SP</th>

                                            <th>Giá</th>
                                            <th>Hình ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Loại SP</th>

                                            {{-- <th>Giá nhập</th>
                                            <th>Giá bán</th>
                                            <th>Màu sắc</th> --}}
                                            <th>Chĩnh sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>

                                                <td>{{ $item->price }}</td>
                                                <td><img src="{{ Storage::url($item->image) }}" title="{{ $item->name }}"
                                                        width="200px" height="200px"></td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->producttype->name }}</td>

                                                {{-- <td>{{$item->import_price}}</td>
                                        <td>{{$item->export_price}}</td>
                                        <td>{{$item->attributevalue_id}}</td> --}}
                                                <td>
                                                    <button class="btn btn-primary editProducttype"
                                                        title="{{ 'Sửa ' . $item->name }}" data-toggle="modal"
                                                        data-target="#edit" type="button" data-id="{{ $item->id }}"><a
                                                            style="text-decoration: none;color:white;"
                                                            href="/admin/product/{{ $item->id }}/edit"><i
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
