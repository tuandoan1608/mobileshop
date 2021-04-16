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
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Attribute</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên attribute</label>
                                    <input type="text" name="attribute" id="inputName" class="form-control">
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-8">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Color</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="myTable" class=" table order-list">
                                    <thead>
                                        <tr>
                                            <td>Tên màu</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-sm-3">
                                                <input type="text" name="namecolor[]" class="form-control" />
                                            </td>
                                            <td class="col-sm-3">
                                                <div>
                                                    <input type="color" id="favcolor" name="color[]" value="#ff0000">
                                                    <label for="head">Chọn màu</label>
                                                </div>
                                            </td>
                                            <td colspan="5" style="text-align: left;">
                                                <input type="button" class="btn btn-lg btn-block " id="addrow"
                                                    value="Add Row" />
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

                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Porject" class="btn btn-success float-left">
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
           

            $("#addrow").on("click", function() {
                var newRow = $("<tr>");
                var cols = "";

                cols += '<td><input type="text" class="form-control" name="namecolor[]"/></td>';
                cols +=
                    '<td><div> <input type="color" id="favcolor" name="color[]" value="#ff0000"><label for="head">Chọn màu</label></div></td>';

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
