@extends('client.master')
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-quantity">Số lượng</th>
                                    <th class="li-product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                          @foreach ($data as $item)
                          <form action="/cart/remove/{{ $item->id }}" method="post">
                          <tr>
                            <td class="li-product-remove"><a data-url="/cart/remove/{{ $item->rowId }}" class="delete"><i class="fa fa-times"></i></a></td>
                            <td class="li-product-thumbnail"><a href="#"><img src="images/product/small-size/5.jpg" alt="Li's Product Image"></a></td>
                            <td class="li-product-name"><a href="#">{{ $item->name }}</a></td>
                            <td class="li-product-price"><span class="amount">{{ $item->price }}</span></td>
                            <td class="quantity">
                                <label>Số lượng</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="{{ $item->qty }}" type="text">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </td>
                            <td class="product-subtotal"><span class="amount">{{ number_format($item->qty*$item->price) }} VND</span></td>
                        </tr>
                          </form>
                          @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Áp dụng mã giảm giá" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Cập nhật giỏ hàng" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng giỏ hảng</h2>
                                <ul>
                                    
                                    <li>Tổng <span class="total">{{ number_format($total) }} VND</span></li>
                                </ul>
                                <a href="/checkout">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $('.delete').on('click',function(){
            var url=$(this).data('url');
            var token=document.head.querySelector('[name=csrf-token]').content;
            let that=$(this);
            $.ajax({
                url:url,
                type:'get',
                data:{
                    _token:token
                },
                success:function(data){
                    
                    if(data.code==200){
                        
                        location.reload();
                    }
                }
            })
        })
    </script>
@endsection
