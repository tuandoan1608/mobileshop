@extends('admin.master')
@section('css')

@endsection
@section('content')
    <div class="content-wrapper">

        <form accept-charset="utf-8" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">



                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Sửa sản phẩm</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">

                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin sản phẩm</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body ">

                                            <fieldset>
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Tên sản phẩm</label>
                                                    <input type="text" name="name" class="form-control col-sm-9"
                                                        placeholder="Nhập tên sản phẩm" required value="{{$product->name}}">
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Giá sản phẩm</label>
                                                    <input type="text" name="price" class="form-control col-sm-9"
                                                        placeholder="Nhập giá sản phẩm" required value="{{$product->price}}">
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Discount</label>
                                                    <input type="text" name="discount" class="form-control col-sm-9"
                                                        placeholder="Nhập discount" value="{{$product->discount}}">
                                                </div>



                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Ảnh đại diện</label>
                                                    <input type="file" name="feature_image_path"
                                                        class="form-control-file col-sm-9" required value="{{$product->name}}">
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledSelect">Danh mục</label>
                                                    <select class="js-example-basic-multiple form-control col-sm-9"
                                                    style="width:200px" name="category_id">


                                                    @foreach ($category as $item)
                                                       @if ($item->id==$product->category_id)
                                                       <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                       @else
                                                       <option  value="{{ $item->id }}">{{ $item->name }}</option>   
                                                       @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledSelect">Loại sản phẩm</label>
                                                    <select class="js-example-basic-multiple form-control col-sm-9"
                                                        style="width:200px" name="producttype_id">


                                                        @foreach ($protype as $item)
                                                       @if ($item->id==$product->producttype_id)
                                                       <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                       @else
                                                       <option  value="{{ $item->id }}">{{ $item->name }}</option>   
                                                       @endif
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Nội dung</label>
                                                    <textarea class="form-control my-editor col-sm-9"
                                                        id="exampleFormControlTextarea1" name="content"
                                                        rows="15">{{$product->content}}</textarea>
                                                </div>
                                                <br>

                                                <br>

                                            </fieldset>

                                        </div>
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-5">
                                    <div class="card card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông số kỉ thuật</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedBudget">Thương
                                                    hiệu:</label>
                                                    <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="band">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedBudget">Màn
                                                    hình:</label>

                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="display">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4  col-form-label" for="inputSpentBudget">Hệ điều
                                                    hành:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="operating">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedDuration">Camera
                                                    sau:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="camera_rear">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputSpentBudget">Camera
                                                    trước:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="camera_front">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"
                                                    for="inputEstimatedDuration">Chip:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="chip">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputSpentBudget">RAM:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="ram">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedDuration">Bộ
                                                    nhớ
                                                    trong:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="memory">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputSpentBudget">SIM:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="sim">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"
                                                    for="inputEstimatedDuration">Pin:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="battery">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedDuration">Bảo
                                                    mật
                                                    nâng cao:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="security">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"
                                                    for="inputEstimatedDuration">Wifi:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="wifi">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedDuration">Thiết
                                                    kế:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="design">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="inputEstimatedDuration">Khối
                                                    lượng:</label>
                                                <select
                                                    class="js-example-placeholder-single js-states form-control col-sm-8"
                                                    name="mass">
                                                    <option selected="selected"></option>
                                                    @foreach ($speci as $item)
                                                        <option>{{ $item->Band }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="col-md-12">

                            <div class="card-body">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Sản phẩm theo màu</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table id="myTable" class=" table order-list">
                                                        <thead>
                                                            <tr>
                                                                <th>Màu sắc</th>
                                                                <th>Giá nhập</th>
                                                                <th>Giá bán</th>
                                                                <th>Số lượng</th>
                                                                <th>Hình ảnh</th>
                                                                <th> <td style="text-align: left;">
                                                                    <input type="button" class="btn btn-lg btn-block "
                                                                        id="addrow" value="+" />
                                                                </td></th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($product_attribute as $items )
                                                            <tr>
                                                                <td>
                                                                    <select
                                                                        class="js-example-basic-multiple form-control col-sm-9"
                                                                        style="width:200px" name="astributevalue_id[]">
                                                                        @foreach ($color as $item)
                                                                           @if ($item->id==$items->attributevalue_id)
                                                                           <option selected value="{{ $item->id }}">
                                                                            {{ $item->name }}</option>
                                                                           @else
                                                                           <option selected value="{{ $item->id }}">
                                                                            {{ $item->name }}</option>
                                                                           @endif
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>


                                                                    <input type="text" name="import_price[]"
                                                                        class="form-control " placeholder="Nhập giá nhập" value="{{$items->import_price}}">
                                                                </td>
                                                                <td>


                                                                    <input type="text" name="export_price[]"
                                                                        class="form-control " placeholder="Nhập giá bán" value="{{$items->export_price}}">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="quantity[]"
                                                                        class="form-control " placeholder="Nhập số lượng" value="{{$items->quantity}}">
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="image0[]" class="form-control "
                                                                        multiple>
                                                                </td>
                                                                <td><a data-url="{{route('proattribute-delete',['id'=>$items->id])}}"  class="ibtnDel delete btn btn-md btn-danger "  >Xóa</a></td>
                                                               
                                                            </tr>
                                                            @endforeach
                                                        </tbody>

                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-secondary">Cancel</a>
                                            <input type="submit" value="Thêm" class="btn btn-success float-left">
                                        </div>
                                    </div>
                                </section>
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".js-example-placeholder-single").select2({

            placeholder: 'Select an item',
            tags:true
            // ajax: {
            //     url: '/admin/search/search',
            //     dataType: 'json',
            //     delay: 250,
            //     processResults: function(data) {
            //         return {
            //             results: $.map(data, function(item) {
                            
            //                 return {
            //                     text: item.name,
            //                     id: item.id
            //                 }
            //             })
            //         };
            //     },
            //     cache: true
            // }


        });

    </script>
    <script>
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
                            type: 'GET',
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });

    </script>
    <script>
        $(document).ready(function() {
            var couter = 1;
            $('#addrow').click(function() {
                var row = $('<tr>');
                var col = '';
                col +=
                    '<td>  <select class="js-example-basic-multiple form-control col-sm-9" style="width:200px" name="astributevalue_id[]"> @foreach ($color as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td>';
                col +=
                    '<td> <input type="text" name="import_price0[]" class="form-control " placeholder="Nhập giá nhập"></td>';
                col +=
                    '<td> <input type="text" name="export_price0[]" class="form-control " placeholder="Nhập giá bán"></td>';
                col +=
                    '<td>   <input type="text" name="quantity0[]" class="form-control " placeholder="Nhập số lượng"></td>';
                col += '<td>   <input type="file" name="images' + couter +
                    '[]" class="form-control " placeholder="Nhập số lượng" multiple></td>';
                col +=
                    '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Xóa"></td>';
                row.append(col);
                couter++;
                $('table.order-list').append(row);
            })
            $('table.order-list').on('click', '.ibtnDel', function(event) {
                $(this).closest('tr').remove();
            })
        });
        var editor_config = {
            path_absolute: "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                //   var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                //   if (type == 'image') {
                //     cmsURL = cmsURL + "&type=Images";
                //   } else {
                //     cmsURL = cmsURL + "&type=Files";
                //   }
                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name +
                    '&lang=' + tinymce.settings.language;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);

    </script>
@endsection
