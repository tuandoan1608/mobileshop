@extends('client.master')
@section('content')
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <form action="/thanh-toan" method="POST">
                @csrf
            <div class="row">
                <div class="col-lg-6 col-12">

                    <div class="checkbox-form">
                        <h3>Chi tiết hóa đơn</h3>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Họ tên lót<span class="required">*</span></label>
                                    <input name="fistname" value="{{ $custommer->firstname }}" readonly placeholder="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Tên<span class="required">*</span></label>
                                    <input name="lastname" value="{{ $custommer->lastname }}" readonly placeholder="" type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chĩ <span class="required">*</span></label>
                                    <input name="address" value="{{ $custommer->address }}" readonly placeholder="Street address"
                                        type="text">
                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại <span class="required">*</span></label>
                                    <input name="phone" value="{{ $custommer->phone }}" readonly type="number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalLong">
                                    Thay đổi thông tin
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">


                                <div class="modal-content">
                                   
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Thay đổi thông tin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                               
                                                <div class="col-md-6">
                                                    <div class="checkout-form-list">
                                                        <label>Họ tên lót<span class="required">*</span></label>
                                                        <input id="ho" name="firstname"
                                                            value="{{ $custommer->firstname }}" required placeholder=""
                                                            type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-form-list">
                                                        <label>Tên<span class="required">*</span></label>
                                                        <input id="ten" name="lastname" value="{{ $custommer->lastname }}"
                                                            required placeholder="" type="text">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <label>Địa chĩ <span class="required">*</span></label>
                                                        <input id="address" name="address"
                                                            value="{{ $custommer->address }}" required
                                                            placeholder="Street address" type="text">
                                                    </div>
                                                </div>




                                                <div class="col-md-6">
                                                    <div class="checkout-form-list">
                                                        <label>Số điện thoại <span class="required">*</span></label>
                                                        <input id="phone" name="phone" value="{{ $custommer->phone }}"
                                                            required type="number">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="updateuser" class="btn btn-primary">Save changes</button>
                                        </div>
                                  
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Đơn hàng của bạn</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="cart-product-name">Dung lượng</th>
                                        <th class="cart-product-name">Màu</th>
                                        <th class="cart-product-total">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="cart_item">
                                            <td class="cart-product-name"> {{ $item->name }}<strong
                                                    class="product-quantity"> × {{ $item->qty }}</strong></td>
                                            <td class="cart-product-total"><span
                                                    class="amount">{{ $item->options->size }}</span></td>
                                            <td class="cart-product-total"><span
                                                    class="amount">{{ $item->options->color }}</span></td>
                                            <td class="cart-product-total"><span class="amount">{{ $item->price }}</span>
                                            </td>



                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>

                                    <tr class="order-total">
                                        <th>Tổng đơn hàng</th>
                                        <th></th>
                                        <th></th>
                                        <td><strong><span class="amount">{{ $total }}</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">


                                <div class="order-button-payment">
                                    <button class="btn btn-success" type="submit">Thanh toán</button>
                                </div>
                            </div>
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
        $('#updateuser').on('click', function() {
            let ho = $('#ho').val();
            let ten = $('#ten').val();

            let address = $('#address').val();
            let phone = $('#phone').val();
            let token = document.head.querySelector('[name=csrf-token]').content;
            $.ajax({
                url: '/update-users',
                type: 'post',
                data: {
                    firstname: ho,
                    lastname: ten,
                    phone: phone,

                    address: address,
                    _token: token
                },
                success: function(result) {
                    location.reload();
                }
            })
        })

    </script>
@endsection
