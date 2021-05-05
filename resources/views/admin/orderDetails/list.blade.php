@extends('admin.master')
@section('css')

@endsection
@section('content')
    <div class="content-wrapper">


        @csrf
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">



                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết đơn hàng</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="container">



                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">


                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Thông tin khách hàng</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <strong><i class="fas fa-user mr-1"></i> {{ $order->firstname }}
                                                {{ $order->lastname }}</strong>



                                            <hr>

                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chĩ giao
                                                hàng</strong>

                                            <p class="text-muted">{{ $order->address }}</p>

                                            <hr>

                                            <strong><i class="fas fa-phone mr-1"></i> Số điện thoại</strong>

                                            <p class="text-muted">
                                                <span class="tag tag-danger">{{ $order->phone }}</span>

                                            </p>

                                            <hr>

                                            <strong><i class="far fa-file-alt mr-1"></i> Ghi chú</strong>

                                            <p class="text-muted">{{ $order->note }}</p>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>



                                </div>

                                <div class="col-md-5">

                                    <div class="card card-default " style="background-color: #f9fafb">
                                        <div class="card-header">
                                            <h5 class="m-0">Trạng thái</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <ul class="progressbar">
                                                    @if ($order->status == 1)
                                                        <li class="active l1">Xác nhận</li>
                                                        <li class=" l2">Đóng gói</li>
                                                        <li class=" l3">Xuất kho</li>
                                                        <li class=" l3">Giao hàng</li>
                                                        <li class=" l3">Hoàn thành</li>
                                                    @elseif ($order->status==2)
                                                        <li class="complete l1">Xác nhận</li>
                                                        <li class="active l2">Đóng gói</li>
                                                        <li class=" l3">Xuất kho</li>
                                                        <li class=" l3">Giao hàng</li>
                                                        <li class=" l3">Hoàn thành</li>
                                                    @elseif ($order->status==3)
                                                        <li class="complete l1">Xác nhận</li>
                                                        <li class="complete l2">Đóng gói</li>
                                                        <li class="active l3">Xuất kho</li>
                                                        <li class=" l3">Giao hàng</li>
                                                        <li class=" l3">Hoàn thành</li>
                                                    @elseif ($order->status==4)
                                                        <li class="complete l1">Xác nhận</li>
                                                        <li class="complete l2">Đóng gói</li>
                                                        <li class="complete l3">Xuất kho</li>
                                                        <li class="active l3">Giao hàng</li>
                                                        <li class=" l3">Hoàn thành</li>
                                                    @elseif ($order->status==5)
                                                        <li class="complete l1">Xác nhận</li>
                                                        <li class="complete l2">Đóng gói</li>
                                                        <li class="complete l3">Xuất kho</li>
                                                        <li class="complete l3">Giao hàng</li>
                                                        <li class="complete active l3">Hoàn thành</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group ">
                                                <label>Ngày Mua hàng</label><br>
                                                <input type="datetime" readonly class="form-control"
                                                    value="{{ $order->order_date }}">
                                            </div>

                                        </div>
                                    </div>



                                </div>

                            </div>
                            <form action="/admin/don-hang/cap-nhat/{{ $order->id }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Thông tin sản phẩm</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Đơn giá</th>

                                                        <th>Màu</th>
                                                        <th>Dung lượng</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orderdetail as $item)
                                                            <tr>
                                                                <td>{{ $item->productname }} <input
                                                                        name="productattribute_id[]"
                                                                        value="{{ $item->productid }}" hidden type="text">
                                                                </td>
                                                                <td>{{ $item->export_price }}</td>
                                                                <td>{{ $item->color }}</td>
                                                                <td>{{ $item->size }}</td>
                                                                <td>{{ $item->soluong }}<input name="qty[]"
                                                                        value="{{ $item->soluong }}" hidden type="text">
                                                                </td>
                                                                <td>{{ $item->total_price }}</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Tổng tiền</td>
                                                            <td>{{ number_format($order->amount) }} VND</td>
                                                        </tr>
                                                        <tr style="border:none">
                                                            <td style="border:none"></td>
                                                            <td style="border:none"></td>
                                                            <td style="border:none"></td>
                                                            <td style="border:none"></td>
                                                            <td style="border:none">Khách phải trả</td>
                                                            <td style="border:none">{{ number_format($order->amount) }}
                                                                VND</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="card card-default">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            @if ($order->status == 1)
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="0" hidden><button class="btn btn-danger"
                                                                        type="submit">Hủy đơn hàng</button></td>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="2" hidden><button class="btn btn-success"
                                                                        type="submit">Xác nhận</button></td>
                                                                </td>
                                                            @elseif ($order->status==2)
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="0" hidden><button class="btn btn-danger"
                                                                        type="submit">Hủy đơn hàng</button></td>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="3" hidden><button class="btn btn-success"
                                                                        type="submit">Đóng gói</button></td>
                                                                </td>
                                                            @elseif ($order->status==3)
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="0" hidden><button class="btn btn-danger"
                                                                        type="submit">Hủy đơn hàng</button></td>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="float: right">
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="4" hidden><button class="btn btn-success"
                                                                        type="submit">Xuất
                                                                        kho</button></td>
                                                                </td>
                                                            @elseif ($order->status==4)
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="5" hidden><button class="btn btn-success"
                                                                        type="submit">Hoàn thành</button></td>
                                                                </td>

                                                            @else
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td style="float: left"> <input type="text" name="status"
                                                                        value="6" hidden><button class="btn btn-success"
                                                                        type="submit">Trả hàng</button></td>
                                                                </td>

                                                            @endif
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>
                <!-- /.card -->


                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- /.content -->
    </div>

@endsection



@section('script')

@endsection
