<header class="li-header-4">
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Số điện thoại:</span><a href="#">(+84) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->

                            @if (Auth::guard('custommer')->check())

                                <li>
                                    <span class="currency-selector-wrapper"><a style="color: #fff"
                                            href="/dang-xuat">Đăng xuất</a></span>


                                </li>
                                @else
                                <li>
                                    <span class="currency-selector-wrapper"><a style="color: #fff"
                                            href="/dang-nhap">Đăng nhập</a></span>


                                </li>

                            @endif
                            <!-- Currency Area End Here -->
                            <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg"
                                                    alt="">English</a></li>
                                        <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="/theme/client/images/menu/logo/2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="/tim-kiem" method="get" class="hm-searchbox ">

                        <input type="search" name="search" placeholder="Nhập từ khóa sản phẩm bạn muốn tìm..">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>

                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count"></span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">Giỏ hàng
                                        <span class="cart-item-count">{{ Cart::instance('shopping')->count() }}</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        @foreach ($cart as $item)
                                            <li>

                                                <div class="minicart-product-details">
                                                    <h6><a href="">{{ $item->name }}</a></h6>
                                                    <span> {{ $item->price }} * {{ $item->qty }}</span>
                                                </div>
                                                <button class="close">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <p class="minicart-total">Tổng: <span>{{ $total }}</span></p>
                                    <div class="minicart-button">
                                        <a href="/gio-hang"
                                            class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                            <span>Xem giỏ hàng</span>
                                        </a>
                                        <a href="/checkout" class="li-button li-button-fullwidth li-button-sm">
                                            <span>Thanh toán</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li><a href="/">Trang chủ</a>

                                </li>
                                @foreach ($menu as $menuparent)
                                    @if ($menuparent->categorychildrent->count())
                                        <li class="megamenu-holder"><a>{{ $menuparent->name }}</a>

                                            @include('client.layout.child')
                                        </li>
                                    @else
                                        <li class=""><a
                                                href="/dtdd/{{ $menuparent->slug }}">{{ $menuparent->name }}</a>

                                            @include('client.layout.child')
                                        </li>
                                    @endif
                                @endforeach


                                <li style="padding-left: 20px;"><a href="index.html"> Liên hệ</a>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
