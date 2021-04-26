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
                                                        <textarea id="my-editor" name="content" rows="25" class="form-control col-md-8 "></textarea>
                                                    </div>

                                                    <br>


                                                    <div class="form-group">
                                                        <label>Thông số kỹ thuật:</label>
                                                        <br>
                                                        <label class="radio-inline">
                                                            <input name="spe" value="1" id="yes" onclick="myfun()"
                                                                checked="" type="radio">Có
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input name="spe" value="0" id="no" onclick="myfun()"
                                                                type="radio">Không
                                                        </label>
                                                    </div>
                                                </fieldset>

                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                Thông tin  giảm giá
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="disabledTextInput">Discount</label>
                                                    <input type="text" name="discount" class="form-control col-sm-9"
                                                        placeholder="Nhập discount">
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>Date:</label>
                                                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Date:</label>
                                                      <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                                                          <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                      </div>
                                                  </div>

                                            </div>
                                        </div>

                                        <div id="specification">
                                            <div class="card card-default collapsed-card">
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
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedBudget">Thương
                                                            hiệu:</label>
                                                        <input type="text" name="band" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="band">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedBudget">Màn
                                                            hình:</label>
                                                        <input type="text" name="display" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="display">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4  col-form-label" for="inputSpentBudget">Hệ
                                                            điều
                                                            hành:</label>
                                                        <input type="text" name="operating" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="operating">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Camera
                                                            sau:</label>
                                                        <input type="text" name="camera_rear" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="camera_rear">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label" for="inputSpentBudget">Camera
                                                            trước:</label>
                                                        <input type="text" name="camera_front" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="camera_front">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Chip:</label>
                                                        <input type="text" name="chip" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="chip">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputSpentBudget">RAM:</label>
                                                        <input type="text" name="ram" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="ram">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Bộ
                                                            nhớ
                                                            trong:</label>
                                                        <input type="text" name="memory" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="memory">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputSpentBudget">SIM:</label>
                                                        <input type="text" name="sim" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="sim">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Pin:</label>
                                                        <input type="text" name="battery" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="battery">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Bảo
                                                            mật
                                                            nâng cao:</label>
                                                        <input type="text" name="security" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="security">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Wifi:</label>
                                                        <input type="text" name="wifi" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="wifi">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Thiết
                                                            kế:</label>
                                                        <input type="text" name="design" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="design">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label"
                                                            for="inputEstimatedDuration">Khối
                                                            lượng:</label>
                                                        <input type="text" name="mass" class="form-control">
                                                        {{-- <select
                                                            class="js-example-placeholder-single js-states form-control col-sm-8"
                                                            name="mass">
                                                            <option selected="selected"></option>
                                                            @foreach ($speci as $item)
                                                                <option>{{ $item->Band }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                            </div>
                                            <!-- /.card -->


                                        </div>
                                        <div class="card card-default ">
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
                                                        <ul class="attribute-option">
                                                            @foreach ($size as $item )
                                                            <li class="atribute-option">
                                                                <div class="form-group">
                                                                    <input name="datasize[]" value="{{ $item->id }}" type="checkbox">
                                                                    <label for="">{{ $item->name }}GB</label>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            

                                                        </ul>
                                                    </fieldset>
                                             
                                                </div>
                                                <div class="attribute-form">
                                                    <div class="attribute-top">
                                                        Màu sắc
                                                    </div>
                                                    <fieldset class="attribute-fie">
                                                        <ul class="attribute-option">
                                                            @foreach ($color as $item )
                                                            <li class="atribute-option">
                                                                <div class="form-group">
                                                                    <input name="datacolor[]" value="{{ $item->id }}" type="checkbox">
                                                                    <label for="">{{ $item->name }}</label>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                            

                                                        </ul>
                                                    </fieldset>
                                                 
                                                </div>
                                                <button type="button" id="getdata" > theem</button>
                                               
                                                    <table class="table tb">
                                                        <thead>
                                                            <th>Size</th>
                                                            <th>Color</th>
                                                            <th>Giá nhập</th>
                                                            <th>Giá bán</th>
                                                            <th>Số  lượng</th>
                                                         
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                              
                                                <div class="img">

                                                </div>



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
                                                        <input name="spe" value="1" checked="" type="checkbox">Có
                                                    </label><br>
                                                    <label class="radio-inline">
                                                        <input name="spe" value="0" type="checkbox">Không
                                                    </label>
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
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
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
                                                                <input type="file" name="feature_image_path" class="custom-file-input"
                                                                    id="inputGroupFile">
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






                            {{-- <div id="cols" class="cols">
                                <div >
                                    <button class="action-close" data-role="closeBtn" type="button">
                                        <i class="fa fa-times" style="font-size: 30px;" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div>dsfdsf</div>
                            </div> --}}
                            <!-- /.row -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Thêm" class="btn btn-success float-left">
                            </div>
                        <!-- /.card-body -->
                        {{-- <div class="col-md-12">

                            <div class="card-body">
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-secondary">
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
                                                                <th></th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <select
                                                                        class="js-example-basic-multiple form-control col-sm-9"
                                                                        style="width:200px" name="astributevalue_id[]">
                                                                        @foreach ($color as $item)

                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>


                                                                    <input type="text" name="import_price[]"
                                                                        class="form-control " placeholder="Nhập giá nhập">
                                                                </td>
                                                                <td>


                                                                    <input type="text" name="export_price[]"
                                                                        class="form-control " placeholder="Nhập giá bán">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="quantity[]"
                                                                        class="form-control " placeholder="Nhập số lượng">
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="image0[]" class="form-control "
                                                                        multiple>
                                                                </td>
                                                                <td style="text-align: left;">
                                                                    <input type="button" class="btn btn-lg btn-block "
                                                                        id="addrow" value="+" />
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                    </div>
                                    
                                    </div>
                                </section>
                            </div>

                        </div> --}}





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
      $('#getdata').click(function(e){
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
                        if(size.length==0){
                            alert('hãy chọn size')
                        }
                       
                        jQuery("input[name='datacolor[]']:checked").each(function() {
                            color = color + '/' + jQuery(this).val();
                        });
                        if (color.length == 1) {
                            color = color.substring(1);
                        }
                        if(color.length==0){
                            alert('hãy chọn màu')
                        }
                      $.ajax({
                          url:'/admin/getsize',
                          method:'post',

                          data:{
                              size: size,
                              color:color
                              
                          },
                          success:function(data){
                            $('.loader').hide();
                              $('tbody').html(data.output);
                              $('.img').html(data.out);
                             
                          }
                      })
      });
                   
                   
        

    </script>



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- daetpicker --}}
    <script>
        $(".js-example-placeholder-single").select2({

            placeholder: 'Select an item',
            tags: true
            


        });
        $(function () {
        
       $('#reservationdate').datetimepicker({
  
        format: 'DD-MM-YYYY',
       });
       $('#reservationdate1').datetimepicker({
        format: 'DD-MM-YYYY',
    
       });
    
       $("#datetimepicker").on("showCalendar.daterangepicker", function (e,picker) {
           $('#datetimepicker1').data("DateTimePicker").minDate(e.date);
       });
       $("#datetimepicker1").on("showCalendar.daterangepicker", function (e,picker) {
           $('#datetimepicker').data("DateTimePicker").maxDate(e.date);
       });
   });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });

        function myfun() {
            var yes = document.getElementById("yes");
            var no = document.getElementById("no");
            var spe = document.getElementById("specification");
            if (yes.checked == true) {
                spe.style.display = "block";
            }
            if (no.checked == true) {
                spe.style.display = "none";
            }
        }

    </script>
    <script>
        $(document).ready(function() {
            var couter = 1;
            $('#addrow').click(function() {
                var row = $('<tr>');
                var col = '';
                @foreach ($color as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach < /select></td > ';
                col +=
                    '<td> <input type="text" name="import_price[]" class="form-control " placeholder="Nhập giá nhập"></td>';
                col +=
                    '<td> <input type="text" name="export_price[]" class="form-control " placeholder="Nhập giá bán"></td>';
                col +=
                    '<td>   <input type="text" name="quantity[]" class="form-control " placeholder="Nhập số lượng"></td>';
                col += '<td>   <input type="file" name="image' + couter +
                    '[]" class="form-control " placeholder="Nhập số lượng" multiple></td>';
                col +=
                    '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Xoá"></td>';
                row.append(col);
                couter++;
                $('table.order-list').append(row);
            })
            $('table.order-list').on('click', '.ibtnDel', function(event) {
                $(this).closest('tr').remove();
            })


            //load loai sp khi add san pham
            var url = "/admin/loaisp";
            $("select[name='category_id']").change(function() {
                var id = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(data) {
                        $("select[name='producttype_id'").html('');
                        $.each(data, function(key, value) {
                            $("select[name='producttype_id']").append(
                                "<option value=" + value.id + ">" + value.name +
                                "</option>"
                            );
                        });
                    }
                });
            });
        });

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
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+token,
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+token,
  };
</script>

//
<script>
CKEDITOR.replace('my-editor', options);
</script>

@endsection
