@extends('admin.master')
@section('content')
    <div class="content-wrapper">
     
            <form accept-charset="utf-8" action="{{ route('spetification.store') }}" method="post">
                {!! csrf_field() !!}
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông số kĩ thuật</h6>
            </div>
            <div class="row" style="margin: 5px;height:100%">
               
                    <div class="col-lg-7">
                        <div class="card card-default">
                            <div class="card-header">
                                Thêm thông số kĩ thuật
                            </div>
                            <div class="card-body">

                                <div class="form-group ">
                                    <table id="myTable" class=" table order-list">
                                        <thead>
                                            <tr>
                                                <th>Tên thông số</th>
                                                <th>Mặc định</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" placeholder="Tên thông số"
                                                        name="name[]"></td>
                                                <td>
                                                    <select class="form-control" name="default[]" id="">
                                                        <option value="0">Null</option>
                                                        <option value="1">Default</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="status[]" id="">
                                                        <option value="1">Enable</option>
                                                        <option value="0">Disable</option>
                                                    </select>
                                                </td>
                                                <td style="text-align: left;">
                                                    <input type="button" class="btn btn-lg btn-block " id="addrows"
                                                        value="+" />
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="card card-default">

                            <div class="card-body">
                                <table class="table">



                                    <tr>
                                        <td><button>Hủy</button></td>

                                        <td><button type="submit" class="btn btn-success">Lưu</button></td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
              
                <div class="col-lg-5">
                    <div class="card card-default">
                        <div class="card-header">
                            Thông số có sẳn
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Thông số kĩ thuật</th>
                                    <th>Mặc định</th>
                                </thead>
                                <tbody>
                                    @foreach ($spe as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->default==1)
                                                <input readonly checked disabled="disabled" type="checkbox">
                                                @else
                                                <input readonly disabled="disabled" type="checkbox">
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
   

    </div>



    </div>

@endsection
@section('script')
    <script>
        $("#addrows").on("click", function() {
            var newRow = $("<tr>");
            var cols = "";
            cols +=
                '<td><input type="text" class="form-control" placeholder="Tên thông số" name="name[]" ></td>';
            cols +=
                '<td><select class="form-control" name="default[]" id=""><option value="0">Null</option><option value="1">Default</option></select></td>';
                cols +=
                '<td> <select class="form-control" name="status[]" id=""><option value="1">Enable</option><option value="0">Disable</option></select></td>';


            cols +=
                '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);

        });

        $("table.order-list").on("click", ".ibtnDel", function(event) {
            $(this).closest("tr").remove();

        });

    </script>
@endsection
