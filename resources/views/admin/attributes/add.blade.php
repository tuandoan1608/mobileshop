@extends('admin.master')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attribute Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Attribute Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('astributestore') }}" method="POST">
                @csrf
                <div class="container">

                    <div class="col-md-12">
                        <div class="card card-default" style="box-shadow: none">
                            <div class="card-header">
                                <h3 class="card-title">Attribute Properties</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-2" for="inputName">Loại đầu vào thuộc tính</label>

                                        <select id="frontend_input" type="text" name="attribute_type"
                                            title="Catalog Input Type for Store Owner"
                                            class="form-control custom-select col-md-4">

                                            @foreach ($attribute as $item)
                                                <option value="{{ $item->id }}" id="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group " id="multi" >
                                    <table id="myTable" class=" table order-list">
                                        <thead>
                                            <tr>
                                                <th>Tên thuộc tính</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="namesize[]" class="form-control "
                                                        placeholder="Tên thuộc tính">
                                                </td>
                                                <td style="text-align: left;">
                                                    <input type="button" class="btn btn-lg btn-block " id="addrow"
                                                        value="+" />
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="form-group " id="multis" style="display: none">
                                    <table id="myTable" class=" table order-list">
                                        <thead>
                                            <tr>      
                                                <th>Tên thuộc tính</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="color" id="favcolor" name="color[]" value="#ff0000"><label
                                                        for="head">Chọn màu</label></td>
                                                <td>


                                                    <input type="text" name="namecolor[]" class="form-control "
                                                        placeholder="Tên thuộc tính">
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
                            <!-- /.card-body -->
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary float-left">Back</a>
                        <input type="submit" value="Save" class="btn btn-success float-left">
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let select = document.getElementById('5');
            let selects = document.getElementById('6');
            let select1 = document.getElementById('sel');

            $("select").change(function() {
                if (select.selected == true) {
                    document.getElementById('multi').style.display = "block";
                    document.getElementById('multis').style.display = "none";
                } else if (selects.selected == true) {
                    document.getElementById('multis').style.display = "block";
                    document.getElementById('multi').style.display = "none";
                } else if (select1.selected == true) {
                    document.getElementById('multis').style.display = "none";
                    document.getElementById('multi').style.display = "none";
                }
            });

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input type="text" class="form-control" name="name[]"/></td>';

                cols +=
                    '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);

            });

            $("#addrows").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";
                cols +=
                    '<td><div> <input type="color" id="favcolor" name="color[]" value="#ff0000"><label for="head">Chọn màu</label></div></td>';
                cols +=
                    '<td><input type="text" class="form-control" placeholder="Tên thuộc tính" name="namecolor[]"/></td>';


                cols +=
                    '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                newRow.append(cols);
                $("table.order-list").append(newRow);

            });


            $("table.order-list").on("click", ".ibtnDel", function(event) {
                $(this).closest("tr").remove();

            });



        });



        function calculateRow(row) {
            var price = +row.find('input[name^="price"]').val();

        }

        function calculateGrandTotal() {
            var grandTotal = 0;
            $("table.order-list").find('input[name^="price"]').each(function() {
                grandTotal += +$(this).val();
            });
            $("#grandtotal").text(grandTotal.toFixed(2));
        }

    </script>
@endsection
