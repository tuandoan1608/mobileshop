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
                            <h3 class="card-title">Thêm sản phẩm</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="container">



                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">


                                        <div class="card card-default">
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
                                                        <label class="col-sm-3" for="disabledTextInput">Tên sản
                                                            phẩm</label>
                                                        <input type="text" name="name" class="form-control col-sm-9"
                                                            placeholder="Nhập tên sản phẩm" required>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="disabledTextInput">Giá hiển thị sản
                                                            phẩm</label>
                                                        <input type="text" name="price" class="form-control col-sm-9"
                                                            placeholder="Nhập giá sản phẩm" required>
                                                    </div>








                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="disabledTextInput">Nội dung</label>
                                                        <textarea id="my-editor" name="content" rows="25"
                                                            class="form-control col-md-8 "></textarea>
                                                    </div>

                                                    <br>



                                                </fieldset>

                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                Thông tin giảm giá
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Discount</label>
                                                    <input type="text" name="discount" class="form-control col-sm-9"
                                                        placeholder="Nhập phần trăm giảm giá (Chỉ nhập số)">
                                                </div>

                                                <div class="form-group">
                                                    <label>Ngày bắt đầu:</label>
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <input type="text" name="startdate"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#reservationdate" />
                                                        <div class="input-group-append" data-target="#reservationdate"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày kết thúc:</label>
                                                    <div class="input-group date" id="reservationdate1"
                                                        data-target-input="nearest">
                                                        <input type="text" name="enddate"
                                                            class="form-control datetimepicker-input"
                                                            data-target="#reservationdate1" />
                                                        <div class="input-group-append" data-target="#reservationdate1"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="specification">
                                            <div class="card card-default ">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thông số kỉ thuật</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <button type="button" class="btn btn-success" id="getspe">Chọn thông
                                                            số mặc định</button>
                                                    </div>
                                                    <div class="container">
                                                        <ul class="ks-cboxtags" id="thongsokt">
                                                            @foreach ($spe as $key => $item)
                                                                <li><input type="checkbox" name="spe[]"
                                                                        id="checkbox{{ $key }}"
                                                                        value="{{ $item->id }}"><label class="uppercase"
                                                                        for="checkbox{{ $key }}">{{ $item->name }}</label>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                        <ul class="ks-cboxtags" id="thongsokts">

                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <button id="addspe" class="btn btn-success"
                                                            type="button">Add</button>
                                                    </div>
                                                    <div class="tskt">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <th>Thông số kĩ thuật</th>

                                                                <th>Nội dung</th>
                                                            </thead>
                                                            <tbody class="spe">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->


                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <a style="color: #007bff;font-size:25px">Thuộc tính sản
                                                    phẩm:</a>
                                            </div>
                                            <div class="card-body">

                                                <div class="radio-group">
                                                    <input onclick="myfun()" checked type="radio" id="option-one" value="1"
                                                        name="attribute"><label class="label" for="option-one">Có</label>
                                                    <input onclick="myfun()" type="radio" id="option-two" value="0"
                                                        name="attribute"><label class="label" for="option-two">Không</label>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="quantity" style="display:none" class="card card-default collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">Số lượng sản phẩm</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <a href=""> Nhập số lượng</a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <th>Giá nhập</th>
                                                        <th>Giá bán</th>
                                                        <th>Số lượng</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input class="form-control" name="import_price"
                                                                    type="number"></td>
                                                            <td><input class="form-control" name="export_price"
                                                                    type="number"></td>
                                                            <td><input class="form-control" name="quantity" type="number">
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <div id="attribute" class="card card-default collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">Thêm thuộc tính</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <a href="">Thêm thuộc tính</a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="attribute-form">
                                                    <div class="attribute-top">
                                                        Dung lượng
                                                    </div>
                                                    <fieldset class="attribute-fie">
                                                        <div class="container">
                                                            <ul class="ks-cboxtags">
                                                                @foreach ($size as $key => $item)
                                                                    <li><input type="checkbox" name="datasize[]"
                                                                            id="checkbox12{{ $key }}"
                                                                            value="{{ $item->id }}"><label
                                                                            class="uppercase"
                                                                            for="checkbox12{{ $key }}">{{ $item->name }}
                                                                            GB</label></li>
                                                                @endforeach

                                                            </ul>

                                                        </div>
                                                    </fieldset>

                                                </div>
                                                <div class="attribute-form">
                                                    <div class="attribute-top">
                                                        Màu sắc
                                                    </div>
                                                    <fieldset class="attribute-fie">
                                                        <div class="container">
                                                            <ul class="ks-cboxtags">
                                                                @foreach ($color as $key => $item)
                                                                    <li><input type="checkbox" name="datacolor[]"
                                                                            id="checkbox3{{ $key }}"
                                                                            value="{{ $item->id }}"><label
                                                                            class="uppercase"
                                                                            for="checkbox3{{ $key }}">{{ $item->name }}</label>
                                                                    </li>
                                                                @endforeach

                                                            </ul>

                                                        </div>
                                                    </fieldset>

                                                </div>
                                                <button type="button" class="btn btn-success" id="getdata"> Add</button>

                                                <div class="size">
                                                    <table class="table">
                                                        <thead>
                                                            <th>Size</th>
                                                            <th>Giá nhập</th>
                                                            <th>Giá bán</th>
                                                        </thead>
                                                        <tbody class="s">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="color">
                                                    <table class="table">
                                                        <thead>
                                                            <th>Color</th>

                                                            <th>Số lượng</th>
                                                        </thead>
                                                        <tbody class="c">

                                                        </tbody>
                                                    </table>
                                                </div>




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
                                                <h5 class="m-0">Trạng thái</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        <input name="status" value="1" checked="" type="checkbox">Có
                                                    </label><br>
                                                    <label class="radio-inline">
                                                        <input name="status" value="0" type="checkbox">Không
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card-header">
                                                <h5 for="disabledSelect" class="m-0">Phân loại</h5>
                                            </div>
                                            <div class="card-body">

                                                <div class="form-group ">
                                                    <label>Danh mục</label><br>
                                                    <div style="display: inline-block">
                                                        <select id="danhmuc"
                                                            class="js-example-basic-multiple  custom-select  text-light border-0 bg-white "
                                                            style="width:200px" name="category_id">



                                                            {!! $category !!}

                                                        </select>
                                                        <button class="btn btn-success adddm" data-toggle="modal"
                                                            data-target="#addd" type="button"><i class="fa fa-plus"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </div>


                                                <div class="form-group ">
                                                    <label for="disabledSelect">Loại sản phẩm</label><br>
                                                    <select id="loaisp"
                                                        class="js-example-basic-multiple  custom-select mb-3 text-light border-0 bg-white "
                                                        style="width:200px" name="producttype_id">


                                                        @foreach ($protype as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-success addloai" data-toggle="modal"
                                                        data-target="#addloai" type="button"><i class="fa fa-plus"
                                                            aria-hidden="true"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal fade" id="addd" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục sản
                                                            phẩm <span class="title"></span></h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin: 5px">
                                                            <div class="col-lg-12">
                                                                <form role="form">
                                                                    <fieldset class="form-group">
                                                                        <label>Tên danh mục</label>
                                                                        <input class="form-control namedm" name="namedm"
                                                                            placeholder="Nhập tên loại sản phẩm">

                                                                    </fieldset>
                                                                    <div class="form-group">
                                                                        <label>Danh mục</label>
                                                                        <select class="form-control idCategorydm"
                                                                            name="categori_id">
                                                                            <option value="0">Danh mục cha</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Trạng thái</label>
                                                                        <select class="form-control statusdm" name="status">
                                                                            <option value="1" class="ht">Hiển Thị</option>
                                                                            <option value="0" class="kht">Không Hiển Thị
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success updatedm">Save</button>
                                                        <button type="reset" class="btn btn-primary">Làm Lại</button>
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="addloai" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Thêm loại sản
                                                            phẩm <span class="title"></span></h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" style="margin: 5px">
                                                            <div class="col-lg-12">
                                                                <form role="form">
                                                                    <fieldset class="form-group">
                                                                        <label>Tên loại sản phẩm</label>
                                                                        <input class="form-control nameloai" name="nameloai"
                                                                            placeholder="Nhập tên loại sản phẩm">

                                                                    </fieldset>
                                                                    <div class="form-group">
                                                                        <label>Danh mục</label>
                                                                        <select class="form-control idCategoryloai"
                                                                            name="categori_id"> </select></select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Trạng thái</label>
                                                                        <select class="form-control statusloai"
                                                                            name="status">
                                                                            <option value="1" class="ht">Hiển Thị</option>
                                                                            <option value="0" class="kht">Không Hiển Thị
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-success updateloai">Save</button>
                                                        <button type="reset" class="btn btn-primary">Làm Lại</button>
                                                        <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Ảnh đại diện</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">

                                                    <div class="mx-auto">
                                                        <div class="input-group ">
                                                            <div class="custom-file">
                                                                <input type="file" required name="feature_image_path"
                                                                    class="custom-file-input" id="inputGroupFile">
                                                                <label class="custom-file-label" for="inputGroupFile"
                                                                    aria-describedby="inputGroupFileAddon">Choose
                                                                    image</label>
                                                            </div>

                                                        </div>
                                                        <div class="border rounded-lg text-center p-3">
                                                            <img src="//placehold.it/140?text=IMAGE" class="img-fluid"
                                                                id="preview" />
                                                        </div>
                                                    </div>

                                                </div>
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
    <script>
        $(document).ready(function() {
            $("select[name='category_id']").change(function() {

                var id = $(this).val();
                let token = document.head.querySelector('[name=csrf-token]').content;

                $.ajax({
                    url: '/admin/loaisp',
                    method: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(data) {
                        $("select[name='producttype_id'").html('');
                        $('.loader').hide();
                        $.each(data, function(key, value) {
                            $("select[name='producttype_id']").append(
                                "<option value=" + value.id + ">" + value.name +
                                "</option>"
                            );
                        });
                    }

                });
            });
        })

    </script>
    <script>
        $('#getdata').click(function(e) {
            e.preventDefault();
            $('.loader').show();
            let size = '';
            let color = '';
            // su dung vong lap de them gia tri checkbox vao chuoi....
            jQuery("input[name='datasize[]']:checked").each(function() {

                size = size + '/' + jQuery(this).val();

            });
            if (size.length == 1) {
                size = size.substring(1);
            }
            if (size.length == 0) {
                alert('hãy chọn size');
                $('.loader').hide();
            }

            jQuery("input[name='datacolor[]']:checked").each(function() {
                color = color + '/' + jQuery(this).val();
            });
            if (color.length == 1) {
                color = color.substring(1);
            }
            if (color.length == 0) {
                alert('hãy chọn màu');
                $('.loader').hide();
            }

            $.ajax({
                url: '/admin/getsize',
                method: 'post',

                data: {
                    size: size,
                    color: color

                },
                success: function(data) {
                    $('.loader').hide();
                    $('.s').html(data.outsize);
                    $('.c').html(data.outcolor);
                    $('.size').show();
                    $('.color').show();

                }
            })
        });
        $('#addspe').click(function(e) {
            e.preventDefault();

            $('.loader').show();
            let spe = '';

            // su dung vong lap de them gia tri checkbox vao chuoi....
            jQuery("input[name='spe[]']:checked").each(function() {

                spe = spe + '/' + jQuery(this).val();

            });

            if (spe.length == 1) {
                spe = spe.substring(1);
            }
            if (spe.length == 0) {
                alert('hãy chọn thông số kĩ thuật');
                $('.loader').hide();
            }


            $.ajax({
                url: '/admin/addspe',
                method: 'post',

                data: {

                    spe: spe

                },
                success: function(data) {
                    $('.loader').hide();
                    $('.spe').html(data);

                    $('.tskt').show();

                }
            })
        });
        $('#getspe').on('click', function() {
            $('.loader').show();
            let token = document.head.querySelector('[name=csrf-token]').content;
            $.ajax({
                url: '/admin/getspe',
                type: 'get',
                data: {
                    _token: token
                },
                success: function(data) {
                    $('.loader').hide();
                    $('#thongsokt').remove();
                    $('#thongsokts').html(data);
                }
            })
        })

    </script>






    <script>
        $(function() {

            $('#reservationdate').datetimepicker({

                format: 'L'
            });
            $('#reservationdate1').datetimepicker({
                format: 'L'

            });

            $("#datetimepicker").on("dp.change", function(e, picker) {
                $('#datetimepicker1').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker1").on("dp.change", function(e, picker) {
                $('#datetimepicker').data("DateTimePicker").maxDate(e.date);
            });
        });

    </script>
    <script type="text/javascript">
        function myfun() {
            var yes = document.getElementById("option-one");
            var no = document.getElementById("option-two");
            var atti = document.getElementById("attribute");
            var qty = document.getElementById("quantity");
            if (yes.checked == true) {
                atti.style.display = "block";
                qty.style.display = "none";
            }
            if (no.checked == true) {
                atti.style.display = "none";
                qty.style.display = "block";
            }
        }

    </script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
            $("#inputGroupFile").on('change', function() {
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            })

        });

    </script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        let token = document.head.querySelector('[name=csrf-token]').content;
        var options = {

            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + token,
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + token,
        };

    </script>

    //
    <script>
        CKEDITOR.replace('my-editor', options);

    </script>

@endsection
