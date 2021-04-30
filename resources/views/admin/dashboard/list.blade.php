@extends('admin.master')

@section('content')

    <div class="content-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $countOrder }}</h3>

                                <p>Tổng số đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $countProduct }}<sup style="font-size: 20px"></sup></h3>

                                <p>Tổng số sản phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ number_format($doanhthu) }} VND</h3>

                                <p>Tổng doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p class="title_thongke">Thống kê đơn hàng doanh số</p>

                        <form  autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">



                                    <p style="margin: 0px">Lọc theo ngày
                                        <input name="date" id="date-range-picker" type="text">
                                    </p>
                                </div>

                                <div class="col-md-2">
                                    <p>
                                        Lọc theo:
                                        <select class="dashboard-filter form-control">
                                            <option>--Chọn--</option>
                                            <option value="thang9">Trong tháng 9</option>
                                            <option value="7ngay">7 ngày qua</option>
                                            <option value="thangtruoc">tháng trước</option>
                                            <option value="thangnay">tháng này</option>
                                            <option value="365ngayqua">365 ngày qua</option>
                                        </select>
                                    </p>
                                </div>
                            </div>

                        </form>
                    </div>




                    <div class="container-fluid col-md-12">
                        <div id="myfirstchart"></div>

                    </div>





                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" style="padding: 20px">
                            <div class="row">
                                <div class="left" style="margin-left: 15px;border-right:1px solid rgb(199, 199, 199);">
                                    <h2 class="tl">Tổng quan trong ngày</h2>
                                    <div class="row">
                                        <div class="form-group">

                                            <div class="user-block">
                                                <img src="https://img.icons8.com/dusk/64/000000/money-bag.png" />
                                                <span class="username">
                                                    <p class="title-dashboard">Doanh thu</p>
                                                    <span class="price1">
                                                        @if ($dtdate > 0)
                                                            {{ $dtdate }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">

                                            <div class="user-block">
                                                <img src="https://img.icons8.com/wired/64/000000/apple-calculator.png" />
                                                <span class="username">
                                                    <p class=" title-dashboard">Đơn hàng</p>
                                                    <span class="price2">
                                                        @if ($orderdate > 0)
                                                            {{ $orderdate }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">

                                            <div class="user-block">
                                                <img src="https://img.icons8.com/cotton/64/000000/user-male.png" />
                                                <span class="username">
                                                    <p class=" title-dashboard">Khách hàng mới</p>
                                                    <span class="price3">0</span>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right3">
                                    <h2 class="tl">Đơn hàng hiện tại</h2>

                                    <div class="contai">


                                        <div class="order-dashboard-item">
                                            <div class="img">

                                                <img src="https://img.icons8.com/ultraviolet/40/000000/money--v1.png" />
                                            </div>
                                            <div class="detail-title-order">
                                                0 <a href=""> Chưa thanh toán</a>
                                            </div>
                                        </div>


                                        <div class="order-dashboard-item">
                                            <div class="img">
                                                <img
                                                    src="https://img.icons8.com/ultraviolet/40/000000/in-transit--v2.png" />
                                            </div>
                                            <div class="detail-title-order">
                                                0<a href="">Chưa giao</a>
                                            </div>
                                        </div>






                                        <div class="order-dashboard-item">
                                            <div class="img">
                                                <img
                                                    src="https://img.icons8.com/ultraviolet/40/000000/shopping-bag--v2.png" />
                                            </div>
                                            <div class="detail-title-order">
                                                0 <a href=""> Chưa xác nhận</a>
                                            </div>
                                        </div>

                                        <div class="order-dashboard-item">
                                            <div class="img">
                                                <img
                                                    src="https://img.icons8.com/ultraviolet/40/000000/expensive-2--v2.png" />
                                            </div>
                                            <div class="detail-title-order">
                                                0 <a href="">Hoàn trả</a>
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
                                   <h2>Thống kê sản phẩm</h2>
                               </div>
                               <div class="card-body">
                                   <table class="table" id="datatable">
                                       <thead>
                                           <th> Tên sản phẩm</th>
                                           <th> Danh mục</th>
                                           <th> Loại sản phẩm</th>                                       
                                           <th> Số lượng</th>
                                           <th> Số lượng bán</th>
                                           <th> Action</th>
                                       </thead>
                                       <tbody>
                                          @foreach ($product as $item)
                                        
                                          <tr>  <a href="#">
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->producttype->name }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->quantity_sell }}</td>
                                            <td><div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Select
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <button type="button" class="btn btn-success" style="margin-left:15px" data-toggle="modal"
                                                    data-target="#exampleModalLong">
                                                 Nhập số lượng
                                                </button>
                                                  <a class="dropdown-item" href="/admin/product/{{ $item->product_id }}/edit" type="button">Tạo sale</a>
                                                 
                                                </div>
                                              </div></td>   </a>
                                           </tr>
                                      
                                          @endforeach
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                       <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                       aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
                                   
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                       data-dismiss="modal">Hủy</button>
                                   <button type="submit" class=" add-to-cart">Mua hàng</button>
                               </div>
                           </div>
                       </div>
                   </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('script')

    <script>
        $('div.alert').delay(3000).slideUp();
        $(document).ready(function() {
            $('#date-range-picker').daterangepicker({
                "dateLimit": {
                    "years": 1
                },
                "locale": {
                    "format": "YYYY-MM-DD"
                }
            });



        });
        
    </script>

    <script type="text/javascript">
     $(function() {
            $("#datatable").DataTable({
                "responsive": true,
             
                "pageLength": 10,
                "autoWidth": false,
                "language": {
                    "search": "Tìm kiếm:",
                    "info": "Hiển thị _START_ từ _END_ của _TOTAL_ bản ghi",
                    "infoEmpty": "Chưa có dữ liệu",
                    "loadingRecords": "Vui lòng đợi - loading...",
                    "processing": "Đang xử lý...",
                    "paginate": {

                        "next": "Tiếp",
                        "previous": "Lùi",
                        "first": "Đầu",
                        "last": "Cuối",


                    }
                },
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
        $(document).ready(function() {
            let token = document.head.querySelector('[name=csrf-token]').content;
            loaddata();
            var char = new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.


                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                label: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng'],
                labels: ['đơn hàng', 'doanh số', 'lợi nhuận', 'số lượng'],
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: true,

            });

            function loaddata() {
                $.ajax({
                    url: '/admin/databar',
                    type: 'get',
                    data: {
                        _token: token
                    },
                    success: function(data) {
                        char.setData(data);
                    }
                })
            }
            $('.applyBtn').on('click',function(){
               
            let token = document.head.querySelector('[name=csrf-token]').content;
            var date =$('#date-range-picker').val();
            $.ajax({
                url:'/admin/dashboard/softdate',
                type:'get',
                data:{
                    order_date:date,
                    _token:token
                },
                success: function(data) {
                    console.log(data);
                        char.setData(data);
                }
            })
        })
        })

    </script>
@endsection
