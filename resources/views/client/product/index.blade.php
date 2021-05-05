@extends('client.master')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Single Product</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-wraper">
        <div class="container">


            <div class="row single-product-area">
                @if ($productimg->count() > 1)
                    <div class="col-lg-4 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                @foreach ($productimg as $item)
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg"
                                            data-gall="myGallery">
                                            <img src="{{ Storage::url($item->image) }}" alt="product image">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                @foreach ($productimg as $item)
                                    <div class="sm-image"><img src="{{ Storage::url($item->image) }}"
                                            alt="product image thumb">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>
                @else
                    <div class="col-lg-4 col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">

                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="" data-gall="myGallery">
                                        <img src="{{ Storage::url($product->image) }}" alt="product image">
                                    </a>
                                </div>


                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">

                                <div class="sm-image"><img src="{{ Storage::url($product->image) }}"
                                        alt="product image thumb">
                                </div>

                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>
                @endif

                <div class="col-lg-4 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product->name }}</h2>
                            <span class="product-details-ref">Trạng thái: Còn hàng</span>
                            <div>
                                <form action="{{ route('addcard', ['id' => $product->id]) }}" method="POST">
                                    @csrf

                                    <div class="row justify-content-center pb-5">
                                        @if ($productattribute->count() == 1)
                                            @foreach ($productattribute as $item)
                                                @if ($item->attributevaluesize_id == null)
                                                    @foreach ($productattribute as $item)
                                                        @if ($product->startsale == 1)
                                                            <div>

                                                                <label class="for-checkbox-tools">

                                                                    <br>
                                                                    <span style="color: red" class="new-price new-price-2 ">
                                                                        <?php
                                                                        $pr = $item->export_price;
                                                                        $dc = $product->discount;
                                                                        $dis = ($pr * (100 - $dc)) / 100;
                                                                        echo number_format($dis);
                                                                        ?> VND</span>
                                                                    <br>
                                                                    <span style="text-decoration: line-through"
                                                                        class="old-price">{{ number_format($item->export_price) }}
                                                                        VND</span>
                                                                </label>
                                                            </div>
                                                        @else

                                                            <span style="color: red;font-size:25px"
                                                                class="new-price new-price-2">{{ number_format($item->export_price) }}
                                                                VND</span>


                                                        @endif

                                                    @endforeach
                                                @else
                                                    @foreach ($productattribute as $item)
                                                        @if ($product->startsale == 1)
                                                            <div>
                                                                <input class="checkbox-tools" type="radio"
                                                                    name="attributevaluesize_id"
                                                                    value="{{ $item->attributevaluesize_id }}"
                                                                    id="tool-{{ $item->attributevaluesize_id }}" checked>
                                                                <label class="for-checkbox-tools"
                                                                    for="tool-{{ $item->attributevaluesize_id }}">
                                                                    <i class=''>{{ $item->productsize->name }}GB</i>
                                                                    <br>
                                                                    <span style="color: red" class="new-price new-price-2 ">
                                                                        <?php
                                                                        $pr = $item->export_price;
                                                                        $dc = $product->discount;
                                                                        $dis = ($pr * (100 - $dc)) / 100;
                                                                        echo number_format($dis);
                                                                        ?> VND</span>
                                                                    <br>
                                                                    <span style="text-decoration: line-through"
                                                                        class="old-price">{{ number_format($item->export_price) }}
                                                                        VND</span>
                                                                </label>
                                                            </div>
                                                        @else

                                                            <span style="color: red;font-size:25px"
                                                                class="new-price new-price-2">{{ number_format($item->export_price) }}
                                                                VND</span>


                                                        @endif

                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @else


                                            @foreach ($productattribute as $item)
                                                @if ($product->startsale == 1)
                                                    <div>
                                                        <input class="checkbox-tools" type="radio"
                                                            name="attributevaluesize_id"
                                                            value="{{ $item->attributevaluesize_id }}"
                                                            id="tool-{{ $item->attributevaluesize_id }}" checked>
                                                        <label class="for-checkbox-tools"
                                                            for="tool-{{ $item->attributevaluesize_id }}">
                                                            <i class=''>{{ $item->productsize->name }}GB</i>
                                                            <span style="color: red" class="new-price new-price-2 "> <?php
                                                                $pr = $item->export_price;
                                                                $dc = $product->discount;
                                                                $dis = ($pr * (100 - $dc)) / 100;
                                                                echo number_format($dis);
                                                                ?> VND</span>
                                                            <br>
                                                            <span style="text-decoration: line-through"
                                                                class="old-price">{{ number_format($item->export_price) }}VND</span>
                                                        </label>
                                                    </div>
                                                @else
                                                    <input class="checkbox-tools" type="radio" name="attributevaluesize_id"
                                                        value="{{ $item->attributevaluesize_id }}"
                                                        id="tool-{{ $item->attributevaluesize_id }}" checked>
                                                    <label class="for-checkbox-tools"
                                                        for="tool-{{ $item->attributevaluesize_id }}">
                                                        <i class=''>{{ $item->productsize->name }}GB</i>
                                                        {{ number_format($item->export_price) }} VND
                                                    </label>


                                                @endif
                                            @endforeach
                                        @endif

                                    </div>

                            </div>

                            <div class="single-add-to-cart">

                                <label class="qtylable">Số lượng</label>
                                <div class="quantity">

                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" id="qty" name="quantity" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                @if ($productattribute->count() == 1)
                                    @if ($item->attributevaluesize_id == null)
                                    <button id="checkout" type="button" value="{{ $product->id }}" class="add-to-cart">
                                        Mua hàng
                                    </button>
                                    @else
                                        <button type="button" class="add-to-cart" data-toggle="modal"
                                            data-target="#exampleModalLong">
                                            Mua hàng
                                        </button>
                                    @endif
                                @else
                                <button type="button" class="add-to-cart" data-toggle="modal"
                                data-target="#exampleModalLong">
                                Mua hàng
                            </button>
                                @endif

                            </div>
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">{{ $product->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach ($productimg as $key => $item)
                                                <input class="checkbox-tools" type="radio" name="attributevalue_id"
                                                    value="{{ $item->color_id }}" id="tool-{{ $item->id }}">
                                                <label class="for-checkbox-tools" for="tool-{{ $item->id }}">
                                                    <i class=''> <img width="100px" height="50px"
                                                            src="{{ Storage::url($item->image) }}" alt=""></i>
                                                    {{ $item->getcolorimg->name }}
                                                </label>



                                            @endforeach
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
                    </div>
                </div>
                <div class="col-lg-4">
                    <table class="table">
                        <thead>
                            <th>Thông số kĩ thuật</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if ($productspe->count())
                                @foreach ($productspe->limit(6)->get() as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->content }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    @if ($productspe->count() > 5)
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#data">
                                                Xem chi tiết
                                            </button></td>
                                    @endif
                                </tr>
                            @else
                                <tr>
                                    <td>Đang cập nhật</td>
                                    <td></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <th>Thông số kĩ thuật</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if ($productspe->count())
                                    @foreach ($productspe->limit(50)->get() as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->content }}</td>
                                        </tr>
                                    @endforeach

                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="product-area pt-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#description"><span>Thông tin</span></a>
                                </li>

                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            {!! $product->content !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Product Area End Here -->
        <!-- Begin Li's Laptop Product Area -->
        <section class="product-area li-laptop-product pt-30 pb-50">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Các sản phẩm tương tự</span>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($productalike as $item)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="/san-pham/{{ $item->slug }}">
                                                    <img src="{{ Storage::url($item->image) }}" alt="Li's Product Image">
                                                </a>
                                           
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">

                                                    <h4><a class="product_name"
                                                            href="/san-pham/{{ $item->slug }}">{{ $item->name }}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        @if ($item->startsale == 1)

                                                            <span class="new-price new-price-2 "> <?php
                                                                $pr = $item->price;
                                                                $dc = $product->discount;
                                                                $dis = ($pr * (100 - $dc)) / 100;
                                                                echo number_format($dis);
                                                                ?> VND</span>
                                                            <br>
                                                            <span class="old-price">{{ number_format($item->price) }}
                                                                VND</span>

                                                        @else
                                                            <div>
                                                                <label for="">{{ number_format($item->price) }}
                                                                    VND</label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>

    @endsection
    @section('sr')
        <script src="/theme/client/js/jquery.countdown.min.js"></script>
        <script>
            $("#checkout").on('click', function() {
                let qty = $('#qty').val();
                let token = document.head.querySelector('[name=csrf-token]').content;
                let id = $('#checkout').val();
                $.ajax({
                    url: '/carts/' + id,
                    type: 'post',
                    data: {
                        id: id,
                        qty: qty,
                        _token: token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            // window.location.href('http://127.0.0.1:8000/checkout');
                            window.location.replace('/checkout');
                        }
                    }
                })

            })

        </script>
    @endsection
