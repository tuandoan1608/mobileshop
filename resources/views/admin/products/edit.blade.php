@extends('admin.master')
@section('css')

@endsection
@section('content')
    <div class="content-wrapper">

        <form accept-charset="utf-8" action="/admin/product/{{ $product->id }}" method="post"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">



                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Sửa sản phẩm</h3>


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
                                                        <input type="text" name="name" value="{{ $product->name }}"
                                                            class="form-control col-sm-9" placeholder="Nhập tên sản phẩm"
                                                            required>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="disabledTextInput">Giá hiển thị sản
                                                            phẩm</label>
                                                        <input type="text" value="{{ $product->price }}" name="price"
                                                            class="form-control col-sm-9" placeholder="Nhập giá sản phẩm"
                                                            required>
                                                    </div>








                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="disabledTextInput">Nội dung</label>
                                                        <textarea id="my-editor" name="content" rows="25"
                                                            class="form-control col-md-8 ">{{ $product->content }}</textarea>
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
                                                    <input type="text" value="{{ $product->discount }}" name="discount"
                                                        class="form-control col-sm-9" placeholder="Nhập discount">
                                                </div>

                                                <div class="form-group">
                                                    <label>Ngày bắt đầu:</label>
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <input type="text" value="{{ $product->startdate }}"
                                                            name="startdate" class="form-control datetimepicker-input"
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
                                                        <input value="{{ $product->enddate }}" type="text" name="enddate"
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

                                                    <div class="container">
                                                        <ul class="ks-cboxtags" id="thongsokt">
                                                            @foreach ($spe as $key => $item)
                                                                @if ($item->getspe($product->id)->isEmpty())
                                                                    <li><input type="checkbox" name="spe[]"
                                                                            id="checkbox{{ $key }}"
                                                                            value="{{ $item->id }}"><label
                                                                            class="uppercase"
                                                                            for="checkbox{{ $key }}">{{ $item->name }}</label>
                                                                    </li>
                                                                @else
                                                                    <li><input type="checkbox" disabled="disabled"
                                                                            name="spe[]" id="checkbox{{ $key }}"
                                                                            value="{{ $item->id }}"><label
                                                                            style="background-color: rgb(104, 101, 101)"
                                                                            class="uppercase"
                                                                            for="checkbox{{ $key }}">{{ $item->name }}</label>
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                        </ul>
                                                        <ul class="ks-cboxtags" id="thongsokts">

                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <button id="addspe" type="button">Thêm</button>
                                                    </div>
                                                    <div class="tskt">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <th>Thông số kĩ thuật</th>

                                                                <th>Nội dung</th>
                                                            </thead>
                                                            <tbody class="spe">
                                                                @foreach ($speci as $item)
                                                                    <tr>
                                                                        <td> <label
                                                                                for="">{{ $item->spename->name }}</label><input
                                                                                style="   visibility: hidden;"
                                                                                name="speid[]" readonly
                                                                                value=" {{ $item->spetification_id }} " type="text"
                                                                                class="form-control"></td>

                                                                        <td> <input  type="text" name="specontent[]"
                                                                                value="{{ $item->content }}" required
                                                                                class="form-control"></td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        @if ($productattribute->count() > 1)

                                            


                                            <div id="attribute" class="card card-default collapsed-card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Thêm thuộc tính</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" title="Collapse">
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
                                                                        <li><input {{ $size_id->contains('attributevaluesize_id',$item->id) ?'disabled':''}} type="checkbox" name="datasize[]"
                                                                                id="checkbox1{{ $key }}"
                                                                                value="{{ $item->id }}"><label  {{ $size_id->contains('attributevaluesize_id',$item->id) ?'class=disactive':''}}
                                                                                class="uppercase"
                                                                                for="checkbox1{{ $key }}">{{ $item->name }}
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
                                                                        <li><input  {{ $color_id->contains('attributevalue_id',$item->id) ?'disabled':''}} type="checkbox" name="datacolor[]"
                                                                                id="checkbox2{{ $key }}"
                                                                                value="{{ $item->id }}"><label {{ $color_id->contains('attributevalue_id',$item->id) ?'class=disactive':''}}
                                                                                class="uppercase"
                                                                                for="checkbox2{{ $key }}">{{ $item->name }}</label>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>

                                                            </div>
                                                        </fieldset>

                                                    </div>
                                                    <button type="button" id="getdata"> theem</button>

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


                                        @endif
                                    </div>

                                    <div class="col-md-4">

                                        <div class="card card-default " style="background-color: #f9fafb">
                                            <div class="card-header">
                                                <h5 class="m-0">Trạng thái</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    @if ($product->status == 1)
                                                        <label class="radio-inline">
                                                            <input name="status" value="1" checked="" type="checkbox">Có
                                                        </label><br>
                                                        <label class="radio-inline">
                                                            <input name="status" value="0" type="checkbox">Không
                                                        </label>
                                                    @else
                                                        <label class="radio-inline">
                                                            <input name="status" value="1" type="checkbox">Có
                                                        </label><br>
                                                        <label class="radio-inline">
                                                            <input name="status" value="0" checked="" type="checkbox">Không
                                                        </label>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="card-header">
                                                <h5 for="disabledSelect" class="m-0">Phân loại</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group ">
                                                    <label>Danh mục</label><br>
                                                    <select id="danhmuc"
                                                        class="js-example-basic-multiple  custom-select  text-light border-0 bg-white "
                                                        style="width:200px" name="category_id">



                                                        {!! $category !!}

                                                    </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="disabledSelect">Loại sản phẩm</label><br>
                                                    <select id="loaisp"
                                                        class="js-example-basic-multiple  custom-select mb-3 text-light border-0 bg-white "
                                                        style="width:200px" name="producttype_id">


                                                        @foreach ($protype as $item)
                                                            @if ($product->producttype_id == $item->id)
                                                                <option selected value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
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
                                                                <input type="file" name="feature_image_path"
                                                                    class="custom-file-input" id="inputGroupFile">
                                                                <label class="custom-file-label" for="inputGroupFile"
                                                                    aria-describedby="inputGroupFileAddon">Choose
                                                                    image</label>
                                                            </div>

                                                        </div>
                                                        <div class="border rounded-lg text-center p-3">
                                                            <img src="{{ Storage::url($product->image) }}"
                                                                class="img-fluid" id="preview" />
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h2>Thuộc tính sản phẩm</h2>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <th>Tên sản phẩm</th>

                                                        <th>Dung lượng</th>
                                                        <th>Màu sắc</th>
                                                        <th>Giá nhập</th>
                                                        <th>Giá bán</th>
                                                        <th>Số lượng</th>
                                                       
                                                    </thead>
                                                    <tbody>
                                                        @if ($productattribute->count() > 1)
                                                            @foreach ($productattribute as $item)
                                                                <tr>
                                                                    <td><label class="uppercase"
                                                                            for="">{{ $item->productname->name }}</label>
                                                                        <input name="product_attribute[]"
                                                                            value="{{ $item->id }}"
                                                                            style="visibility: hidden" type="text">
                                                                    </td>

                                                                    <td>{{ $item->productsize->name }}GB</td>
                                                                    <td>
                                                                        <p class="uppercase">
                                                                            {{ $item->productcolor->name }}
                                                                        </p>
                                                                    </td>
                                                                    <td><input name="import_price[]"
                                                                            value="{{ $item->import_price }}"
                                                                            class="form-control" type="text"></td>
                                                                    <td><input name="export_price[]"
                                                                            value="{{ $item->export_price }}"
                                                                            class="form-control" type="text"></td>
                                                                    <td><input name="quantity[]"
                                                                            value="{{ $item->quantity }}"
                                                                            class="form-control" type="text"></td>
                                                                    <td><button title="Delete"
                                                                            data-url="/admin/deleteattribute/{{ $item->id }}"
                                                                            class="action- scalable delete delete-option">
                                                                            <span class="icon">
                                                                                <i class="far fa-trash-alt"></i>
                                                                            </span>
                                                                        </button> </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            @foreach ($productattribute as $item)
                                                                <tr>
                                                                    <td><label class="uppercase"
                                                                            for="">{{ $item->productname->name }}</label>
                                                                        <input name="product_attribute[]"
                                                                            value="{{ $item->id }}"
                                                                            style="visibility: hidden" type="text">
                                                                    </td>

                                                                    <td>Không có</td>
                                                                    <td>
                                                                        Không có
                                                                    </td>
                                                                    <td><input name="import_price[]"
                                                                            value="{{ $item->import_price }}"
                                                                            class="form-control" type="text"></td>
                                                                    <td><input name="export_price[]"
                                                                            value="{{ $item->export_price }}"
                                                                            class="form-control" type="text"></td>
                                                                    <td><input name="quantity[]"
                                                                            value="{{ $item->quantity }}"
                                                                            class="form-control" type="text"></td>
                                                                  
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3>Hình ảnh thuộc tính</h3>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>

                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                @foreach ($product_img as $item)

                                                                    <td class="float-left">
                                                                        <div class="form-group">
                                                                            <input type="text" name="img_color[]"
                                                                                value="{{ $item->color_id }}"
                                                                                style="visibility: hidden">
                                                                            <label class="uppercase"
                                                                                for="">{{ $item->getcolorimg->name }}</label>
                                                                            <div class="mx-auto" style="width: 200px">
                                                                                <div class="input-group ">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" name="img"
                                                                                            class="custom-file-input"
                                                                                            id="inputGroupFile">
                                                                                        <label class="custom-file-label"
                                                                                            for="inputGroupFile"
                                                                                            aria-describedby="inputGroupFileAddon">Choose
                                                                                            image</label>
                                                                                    </div>

                                                                                </div>
                                                                                <div
                                                                                    class="border rounded-lg text-center p-3">
                                                                                    <img src="{{ Storage::url($item->image) }}"
                                                                                        class="img-fluid" id="preview" />
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </td>
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">

                                            <td><a href="/admin/product" class="btn btn-secondary">Cancel</a>
                                            <td></td>
                                            <td> <input type="submit" value="Thêm" class="btn btn-success float-right ">
                                            </td>
                                            </td>
                                        </table>
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
                alert('hãy chọn size')
            }

            jQuery("input[name='datacolor[]']:checked").each(function() {
                color = color + '/' + jQuery(this).val();
            });
            if (color.length == 1) {
                color = color.substring(1);
            }
            if (color.length == 0) {
                alert('hãy chọn màu')
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

    </script>

    <script>
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
                            type: 'GET',
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
