@extends('admin.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="content-wrapper">

        <form accept-charset="utf-8" action="/admin/don-hang/add" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">



                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Thêm sản phẩm</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="container">



                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">


                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Chi tiết đơn hàng</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body ">
                                                <fieldset>
                                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                                        <table id="table" class="table table-hover table-striped mb-0 ">
                                                            <thead>
                                                                <th>Tên sản phẩm</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Số lượng</th>
                                                                <th>Giá</th>
                                                                <th></th>
                                                            </thead>
                                                            <tbody style="  overflow: scroll !important;height: 210px;">
                                                                @foreach ($products as $item)
                                                                    <tr class="link addorder ">
                                                                        <td>{{ $item->productname->name }}</td>
                                                                        <td> @if ($item->attributevaluesize_id!=null)
                                                                            {{ $item->productsize->name }}
                                                                        
                                                                            
                                                                        @endif
                                                                        </td>
                                                                        <td>@if ($item->attributevalue_id!=null)
                                                                            {{ $item->productcolor->name }}
                                                                        
                                                                            
                                                                        @endif
                                                                        </td>
                                                                        <td>{{ $item->quantity }}</td>
                                                                        <td>{{ number_format($item->export_price) }}đ
                                                                        </td>
                                                                        <td><a
                                                                                data-url="/admin/don-hang/create/{{ $item->id }}"></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>


                                                    </div>
                                                    <br>
                                                    <br>
                                                    <table class="table">
                                                        <tbody class="tborder">
                                                           
                                                        </tbody>
                                                    </table>
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table">

                                                    <td><a href="/admin/product" class="btn btn-secondary">Cancel</a>
                                                    <td></td>
                                                    <td> <input type="submit" value="Thêm"
                                                            class="btn btn-success float-right "></td>
                                                    </td>
                                                </table>
                                            </div>
                                        </div>




                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-default " style="background-color: #f9fafb">
                                            <div class="card-header">
                                                <h5 class="m-0">Tìm kiếm khách hàng</h5>
                                            </div>
                                            <div class="card-body">
                                                <select style="height: 100px"
                                                    class="js-example-placeholder-single js-states form-control "
                                                    name="idcustommer">
                                                    <option selected="selected"></option>
                                                    
                                                </select>
                                            </div>

                                        </div>



                                    </div>

                                </div>
                            </div>


                        </div>





                    </div>
                    <!-- /.card -->


                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
        </form>
        <!-- /.content -->
    </div>

@endsection



@section('script')

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            let token = document.head.querySelector('[name=csrf-token]').content;
            $('.js-example-placeholder-single').select2({
                tags: true,
                ajax: {
                    url: "/admin/don-hang/searchaccout",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: token,
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
        $(function() {

            $('.addorder').on('click', function() {

                let urlreq = $(this).find('td').find('a').data('url');
                let token = document.head.querySelector('[name=csrf-token]').content;
                $.ajax({
                    url: urlreq,
                    type: 'post',
                    data: {
                        _token: token

                    },
                    success: function(data) {
                       $('.tborder').append(data);
                    }
                })

            })
        });
        $('div.alert').delay(3000).slideUp();


        let token = document.head.querySelector('[name=csrf-token]').content;
        var options = {

            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + token,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + token,
        };

    </script>

    <script>


    </script>
    <script>
        CKEDITOR.replace('my-editor', options);

    </script>

@endsection
