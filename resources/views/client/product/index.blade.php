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

                <div class="col-lg-4 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product->name }}</h2>
                            <span class="product-details-ref">Trạng thái: Còn hàng</span>




                            <div>
                                <form action="{{ route('addcard', ['id' => $product->id]) }}" method="POST">
                                    @csrf

                                    <div class="row justify-content-center pb-5">

                                        @foreach ($productattribute as $item)


                                            @if ($product->startsale == 1)
                                                <div>
                                                    <label for="">
                                                        <a> <input name="attributevaluesize_id" checked type="radio"
                                                                value="{{ $item->attributevaluesize_id }}"
                                                                checked>{{ $item->productsize->name }}GB</a>
                                                    </label>
                                                    <span class="new-price new-price-2 "> <?php
                                                        $pr = $item->export_price;
                                                        $dc = $product->discount;
                                                        $dis = ($pr * (100 - $dc)) / 100;
                                                        echo number_format($dis);
                                                        ?> VND</span>
                                                    <br>
                                                    <span
                                                        class="old-price">{{ number_format($item->export_price) }}VND</span>

                                                </div>
                                            @else
                                                {{-- <div>
                                                <input type="radio" id="control_01" name="attributevaluesize_id" value="{{ $item->attributevaluesize_id }}" checked>
                                                <label for="control_01">
                                                  <h2>{{ $item->productsize->name }}GB</h2>
                                                  <label for="">{{ number_format($item->export_price) }} VND</label>
                                                </label>
                                              </div> --}}


                                                <input class="checkbox-tools" type="radio" name="attributevaluesize_id" value="{{ $item->attributevaluesize_id }}"  
                                                    id="tool-{{ $item->attributevaluesize_id }}" checked>
                                                <label class="for-checkbox-tools"
                                                    for="tool-{{ $item->attributevaluesize_id }}">
                                                    <i class=''>{{ $item->productsize->name }}GB</i>
                                                    {{ number_format($item->export_price) }} VND
                                                </label>


                                            @endif

                                        @endforeach
                                    </div>

                            </div>








                            <div class="single-add-to-cart">

                                <label class="qtylable">Số lượng</label>
                                <div class="quantity">

                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" name="quantity" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button type="button" class="add-to-cart" data-toggle="modal"
                                    data-target="#exampleModalLong">
                                    Mua hàng
                                </button>

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
                                                <input class="checkbox-tools" type="radio" name="attributevalue_id" value="{{ $item->color_id }}"
                                                    id="tool-{{ $item->id }}" >
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
                                @foreach ($productspe->limit(2)->get() as $item)
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
                                <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a>
                                </li>
                                <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                                <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="description" class="tab-pane active show" role="tabpanel">
                        <div class="product-description">
                            <span>The best is yet to come! Give your walls a voice with a framed poster. This aesthethic,
                                optimistic poster will look great in your desk or in an open-space office. Painted wooden
                                frame
                                with passe-partout for more depth.</span>
                        </div>
                    </div>
                    <div id="product-details" class="tab-pane" role="tabpanel">
                        <div class="product-details-manufacturer">
                            <a href="#">
                                <img src="images/product-details/1.jpg" alt="Product Manufacturer Image">
                            </a>
                            <p><span>Reference</span> demo_7</p>
                            <p><span>Reference</span> demo_7</p>
                        </div>
                    </div>
                    <div id="reviews" class="tab-pane" role="tabpanel">
                        <div class="product-reviews">
                            <div class="product-details-comment-block">
                                <div class="comment-review">
                                    <span>Grade</span>
                                    <ul class="rating">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                                <div class="comment-author-infos pt-25">
                                    <span>HTML 5</span>
                                    <em>01-12-18</em>
                                </div>
                                <div class="comment-details">
                                    <h4 class="title-block">Demo</h4>
                                    <p>Plaza</p>
                                </div>
                                <div class="review-btn">
                                    <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your
                                        Review!</a>
                                </div>
                                <!-- Begin Quick View | Modal Area -->
                                <div class="modal fade modal-wrapper" id="mymodal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="review-page-title">Write Your Review</h3>
                                                <div class="modal-inner-area row">
                                                    <div class="col-lg-6">
                                                        <div class="li-review-product">
                                                            <img src="images/product/large-size/3.jpg" alt="Li's Product">
                                                            <div class="li-review-product-desc">
                                                                <p class="li-product-name">Today is a good day Framed poster
                                                                </p>
                                                                <p>
                                                                    <span>Beach Camera Exclusive Bundle - Includes Two
                                                                        Samsung
                                                                        Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The
                                                                        Entire
                                                                        Room With Exquisite Sound via Ring Radiator
                                                                        Technology.
                                                                        Stream And Control R3 Speakers Wirelessly With Your
                                                                        Smartphone. Sophisticated, Modern Design </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="li-review-content">
                                                            <!-- Begin Feedback Area -->
                                                            <div class="feedback-area">
                                                                <div class="feedback">
                                                                    <h3 class="feedback-title">Our Feedback</h3>
                                                                    <form action="#">
                                                                        <p class="your-opinion">
                                                                            <label>Your Rating</label>
                                                                            <span>
                                                                                <select class="star-rating">
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                </select>
                                                                            </span>
                                                                        </p>
                                                                        <p class="feedback-form">
                                                                            <label for="feedback">Your Review</label>
                                                                            <textarea id="feedback" name="comment" cols="45"
                                                                                rows="8" aria-required="true"></textarea>
                                                                        </p>
                                                                        <div class="feedback-input">
                                                                            <p class="feedback-form-author">
                                                                                <label for="author">Name<span
                                                                                        class="required">*</span>
                                                                                </label>
                                                                                <input id="author" name="author" value=""
                                                                                    size="30" aria-required="true"
                                                                                    type="text">
                                                                            </p>
                                                                            <p
                                                                                class="feedback-form-author feedback-form-email">
                                                                                <label for="email">Email<span
                                                                                        class="required">*</span>
                                                                                </label>
                                                                                <input id="email" name="email" value=""
                                                                                    size="30" aria-required="true"
                                                                                    type="text">
                                                                                <span class="required"><sub>*</sub> Required
                                                                                    fields</span>
                                                                            </p>
                                                                            <div class="feedback-btn pb-15">
                                                                                <a href="#" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">Close</a>
                                                                                <a href="#">Submit</a>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Feedback Area End Here -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Quick View | Modal Area End Here -->
                            </div>
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
                                                <a href="single-product.html">
                                                    <img src="{{ Storage::url($item->image) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
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
    @endsection
