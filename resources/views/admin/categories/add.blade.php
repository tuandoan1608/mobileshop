@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh mục sản phẩm</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form accept-charset="utf-8" action="{{ route('category.store') }}" method="post">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="form-group">
                            <label for="disabledTextInput">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục"
                                required>
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

                        <button type="submit" class="btn btn-success">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập Lại</button>
                    </fieldset>
                </form>
               
            </div>
        </div>
    </div>

</div>


  
    </div>

@endsection
