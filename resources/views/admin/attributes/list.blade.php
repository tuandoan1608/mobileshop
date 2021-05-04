@extends('admin.master')
@section('css')
    <style>
        .modal-wrapper {
  display: block !important;
}
.modal-wrapper.modal {
  visibility: hidden;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  z-index: -9;
}
.modal-wrapper.modal.show {
  visibility: visible;
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  z-index: 1050;
}
.modal-wrapper .modal-dialog {
  max-width: 880px;
}
.modal-wrapper .close {
  color: #333333;
  font-size: 30px;
  font-weight: 400;
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  position: absolute;
  right: 15px;
  top: 5px;
  z-index: 99;
}
.modal-wrapper .close:hover {
	color: #fed700;
}
.modal-wrapper .slider-thumbs-1 {
  margin-top: 10px;
  margin-right: -10px;
}
.modal-wrapper .slider-thumbs-1 .sm-image {
  margin-right: 10px;
}

.product-details-images .lg-image img, 
.product-details-thumbs .sm-image img {
  width: 100%;
}

.product-details-thumbs .sm-image {
  cursor: pointer;
}

.product-details-view-content .product-info h2 {
  font-size: 18px;
  letter-spacing: -.025em;
  line-height: 24px;
  color: #0363cd;
  text-transform: capitalize;
  font-weight: 500;
  margin: 0 0 15px 0;
}
.product-details-ref {
	font-size: 13px;
	color: #7a7a7a;
}
.product-details-view-content .product-info .price-box {
  margin-bottom: 20px;
}
.product-details-view-content .product-info .price-box .new-price {
  font-weight: 500;
  font-size: 24px;
  line-height: 27px;
  color: #e80f0f;
}
.product-details-view-content .content-center .product-variants {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.product-variants .produt-variants-size {
  margin-right: 30px;
}
.product-variants .produt-variants-size label {
	display: block;
	font-size: 14px;
	font-weight: 400;
}
.product-variants .produt-variants-size .form-control-select {
  width: 60px;
  border-radius: 0px;
  border: 1px solid #ddd;
  height: 30px;
}
.product-variants .produt-variants-color label {
  display: block;
  font-size: 16px;
  font-weight: 600;
}
.product-variants .produt-variants-color .color-list li {
  display: inline-block;
  margin-right: 10px;
}
.product-variants .produt-variants-color .color-list li a {
  border: 2px solid rgba(0, 0, 0, 0);
  display: block;
  height: 28px;
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
  width: 28px;
}
.product-variants .produt-variants-color .color-list li a:hover {
  border: 2px solid #333333;
}
.product-variants .produt-variants-color .color-list li a.orange-color {
  background: #f39c11;
}
.product-variants .produt-variants-color .color-list li a.orange-color.active {
  border: 2px solid #333333;
}
.product-variants .produt-variants-color .color-list li a.paste-color {
  background: #5d9cec;
}
.cart-quantity {
	margin-top: 25px;
	overflow: hidden;
	float: left;
	width: 100%;
}
.cart-quantity label {
  display: block;
  font-size: 16px;
  font-weight: 600;
}
.cart-quantity .add-to-cart {
	border: none;
	font-size: 14px;
	color: #242424;
	position: relative;
	background: #fed700;
	cursor: pointer;
	font-weight: 500;
	text-transform: capitalize;
	padding: 13px 70px;
	border-radius: 2px;
	transition: all 0.3s ease-in-out;
}
.cart-quantity .add-to-cart:hover {
  background: #242424;
  color: #ffffff;
}
.cart-plus-minus {
  float: left;
  margin-right: 15px;
  position: relative;
  width: 76px;
  text-align: left;
}
.cart-plus-minus .cart-plus-minus-box {
	border: 1px solid #e1e1e1;
	color: #242424;
	height: 46px;
	text-align: center;
	width: 48px;
	width: 48px;
	width: 3rem;
	background: #fff;
}
.cart-plus-minus .dec.qtybutton, .cart-plus-minus .inc.qtybutton {
  border-bottom: 1px solid #e1e1e1;
  border-right: 1px solid #e1e1e1;
  border-top: 1px solid #e1e1e1;
  color: #333333;
  cursor: pointer;
  height: 23px;
  line-height: 20px;
  position: absolute;
  text-align: center;
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
  width: 28px;
}
.cart-plus-minus .dec.qtybutton:hover, .cart-plus-minus .inc.qtybutton:hover {
  background: #ddd;
}
.cart-plus-minus .dec.qtybutton {
  bottom: 0;
  right: 0;
}
.cart-plus-minus .inc.qtybutton {
  border-bottom: none;
  top: 0;
  right: 0;
}
.product-details-thumbs .slick-arrow, 
.tab-style-right .slick-arrow,
.tab-style-left .slick-arrow {
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 0;
  right: auto;
  background: #242424;
  color: #ffffff;
  border: none;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border-radius: 5px;
  z-index: 5;
  visibility: hidden;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  -webkit-transition: 0.3s ease-in-out;
  transition: 0.3s ease-in-out;
  cursor: pointer;
}
.tab-style-right .slick-arrow, .tab-style-left .slick-arrow {
	top: 16px;
	left: 40px;
	right: auto;
}
.product-details-thumbs .slick-arrow:hover {
  background: #fed700;
  color: #ffffff;
}
.product-details-thumbs .slick-arrow.slick-next,
.tab-style-right .slick-arrow.slick-next {
  right: 10px;
  left: auto;
}
.tab-style-right .slick-arrow.slick-next, 
.tab-style-left .slick-arrow.slick-next {
	right: 40px;
	left: auto;
	bottom: 0;
	top: auto;
}
.product-details-thumbs:hover .slick-arrow, 
.tab-style-right:hover .slick-arrow,
.tab-style-left:hover .slick-arrow {
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  visibility: visible;
  opacity: 1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}
.modal-body .product-social-sharing {
	padding-bottom: 43px;
}
    </style>
@endsection
@section('content')
  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('flash::message')
        </div>
            <section class="content-header col-md-12" style="margin:10px; display:inline" >
           
                <div class="heder-tab" style=" margin-left:20px;  padding:10px;
                  
                list-style: none;
                background-color: white;
                border-radius: 4px;">
                    <ol id="menu" class="breadcrumb" >
                        <li><a href=""><i class="fa fa-dashboard"></i> Home /</a></li>
                        <li><a href="">Attribute / </a></li>
                        <li class="active">List</li>
                        
                    </ol>
                    <div style="float: right;margin-top:-32px"><div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thêm attribute
                        </button>
                        <div class="dropdown-menu">
                           
                                <li><a class="dropdown-item" href="/admin/attribute/add?type=new">Thêm mới</a></li>
                                <li><a class="dropdown-item" href="#">Thêm màu</a></li>
                            
                        </div>
                      </div></div>
                </div>
                   
                  
                  
            </section>
           

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                       
                        <div class="card">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th>STT</th>
                                            <th> Thuộc tính</th>
                                            <th> Danh sách thuộc tính</th>
                                          
                                            <th>Sửa</th>
                                           
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                        
                                   
                                    <tr>
                                        <td>1</td>
                                        <td>{{$size->name}}</td>
                                        <td>
                                            @foreach ($attributesize as $item )
                                               <p class="float-left" style="margin-right: 10px">{{ $item->name }} GB</p>
                                            @endforeach
                                        </td>
                                        
                                       
                                        <td width="3%" class="center"> <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$color->name}}</td>
                                        <td>
                                            @foreach ($attributecolor as $item )
                                               <p class="float-left" style="margin-right: 10px">{{ $item->name }}</p>
                                            @endforeach
                                        </td>
                                        
                                       
                                        <td width="3%" class="center"> <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.card-header -->
                            <div class="card-body">
                                
                                <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                                       <!-- Product Details Left -->
                                                        <div class="product-details-left">
                                                            <div class="product-details-images slider-navigation-1">
                                                                <div class="lg-image">
                                                                    <img src="images/product/large-size/1.jpg" alt="product image">
                                                                </div>
                                                                <div class="lg-image">
                                                                    <img src="images/product/large-size/2.jpg" alt="product image">
                                                                </div>
                                                                <div class="lg-image">
                                                                    <img src="images/product/large-size/3.jpg" alt="product image">
                                                                </div>
                                                                <div class="lg-image">
                                                                    <img src="images/product/large-size/4.jpg" alt="product image">
                                                                </div>
                                                                <div class="lg-image">
                                                                    <img src="images/product/large-size/5.jpg" alt="product image">
                                                                </div>
                                                                <div class="lg-image">
                                                                    <img src="images/product/large-size/6.jpg" alt="product image">
                                                                </div>
                                                            </div>
                                                            <div class="product-details-thumbs slider-thumbs-1">                                        
                                                                <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                                                                <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                                                                <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                                                <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                                                <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                                                <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
                                                            </div>
                                                        </div>
                                                        <!--// Product Details Left -->
                                                    </div>
                    
                                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                                        <div class="product-details-view-content pt-60">
                                                            <div class="product-info">
                                                                <h2>Today is a good day Framed poster</h2>
                                                                <span class="product-details-ref">Reference: demo_15</span>
                                                                <div class="rating-box pt-20">
                                                                    <ul class="rating rating-with-review-item">
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                        <li class="review-item"><a href="#">Read Review</a></li>
                                                                        <li class="review-item"><a href="#">Write Review</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="price-box pt-20">
                                                                    <span class="new-price new-price-2">$57.98</span>
                                                                </div>
                                                                <div class="product-desc">
                                                                    <p>
                                                                        <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                                <div class="product-variants">
                                                                    <div class="produt-variants-size">
                                                                        <label>Dimension</label>
                                                                        <select class="nice-select">
                                                                            <option value="1" title="S" selected="selected">40x60cm</option>
                                                                            <option value="2" title="M">60x90cm</option>
                                                                            <option value="3" title="L">80x120cm</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="single-add-to-cart">
                                                                    <form action="#" class="cart-quantity">
                                                                        <div class="quantity">
                                                                            <label>Quantity</label>
                                                                            <div class="cart-plus-minus">
                                                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                                                    </form>
                                                                </div>
                                                                <div class="product-additional-info pt-25">
                                                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                                    <div class="product-social-sharing pt-25">
                                                                        <ul>
                                                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "pageLength": 25,
                "lengthChange": false,
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
        $('div.alert').delay(3000).slideUp();
        $(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                let urlreq = $(this).data('url');
                let that = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'GET',
                            url: urlreq,
                            success: function(data) {
                                if (data.code == 200) {
                                    that.parent().parent().remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                }
                            }
                        })

                    }
                })
            })
        })
    
 
    </script>
@endsection
