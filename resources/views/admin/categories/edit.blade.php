@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="card ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh mục sản phẩm</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form accept-charset="utf-8" action="/admin/category/{{ $data->id }}" method="post">
                    {!! csrf_field() !!}
                    @method('put')
                    <fieldset>
                        <div class="form-group">
                            <label for="disabledTextInput">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}" placeholder="Nhập tên danh mục"
                                required>
                        </div>
                       
                        <div class="form-group">
                            <label for="disabledTextInput">Danh mục con</label>
                           <select name="parent_id" class="form-control" id="">
                             <option value="0">Danh mục cha</option>
                                   {!! $option !!}
                              
                           </select>
                        </div>
                       
                        <div class="form-group">
                            <label>Status:</label>
                            <label class="radio-inline">
                                <input name="status" value="1" checked="" type="radio">Hiện
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="0" type="radio">Ẩn
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success">Lưu</button>
                        <button type="reset" class="btn btn-primary">Nhập Lại</button>
                    </fieldset>
                </form>
               
            </div>
        </div>
    </div>

</div>


  
    </div>

@endsection
