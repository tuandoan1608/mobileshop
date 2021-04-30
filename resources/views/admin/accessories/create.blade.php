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
                                                    <label>Ngày bắt đầu:</label>
                                                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                          <input type="text" name="startdate" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Ngày kết thúc:</label>
                                                      <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                                          <input type="text" name="enddate" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                                                          <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                          </div>
                                                      </div>
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


                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Thêm" class="btn btn-success float-left">
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
  
        format: 'L'
       });
       $('#reservationdate1').datetimepicker({
        format: 'L'
    
       });
    
       $("#datetimepicker").on("dp.change", function (e,picker) {
           $('#datetimepicker1').data("DateTimePicker").minDate(e.date);
       });
       $("#datetimepicker1").on("dp.change", function (e,picker) {
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
