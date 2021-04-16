@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <div class="content-wrapper">
        <section class="content-header col-md-12" style="margin:10px" >
           
            <ol id="menu" class="breadcrumb" style=" padding:10px;  
          
            list-style: none;
            background-color: white;
            border-radius: 4px;">
                <li><a href=""><i class="fa fa-dashboard"></i> Home /</a></li>
                <li><a href="">category / </a></li>
                <li class="active">List</li>
            </ol>
        </section>
        <div class="main-conten">
            <div>


                <div class="card">
                 
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form accept-charset="utf-8" action="/admin/category/{{$data->id}}" method="post">
                            {!! csrf_field() !!}
                            @method('put')
                            <fieldset>
                                <div class="form-group">
                                    <label for="disabledTextInput">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{$data->name}}" required>
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

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>

    </div>
</div> 
@endsection