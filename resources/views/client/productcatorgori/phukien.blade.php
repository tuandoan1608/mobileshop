@extends('client.master')
@section('content')

    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li class="active">Điện thoại</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Begin Li's Banner Area -->
                    <div class="single-banner shop-page-banner">
                        <a href="#">
                            <img src="/theme/client/images/bg-banner/2.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                    <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                            data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i
                                                class="fa fa-th"></i></a></li>

                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>

                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sắp xếp:</p>
                                <select class="nice-select">
                                    <option value="trending">Relevance</option>
                                    <option value="sales">Name (A - Z)</option>
                                    <option value="sales">Name (Z - A)</option>
                                    <option value="rating">Price (Low &gt; High)</option>
                                    <option value="date">Rating (Lowest)</option>
                                    <option value="price-asc">Model (A - Z)</option>
                                    <option value="price-asc">Model (Z - A)</option>
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row" id="sp">
                                        @foreach ($product as $item)
                                            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="/san-pham/{{ $item->slug }}">
                                                            <img src="{{ Storage::url($item->image) }}"
                                                                alt="Li's Product Image">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">

                                                            <h4><a class="product_name"
                                                                    href="/san-pham/{{ $item->slug }}">{{ $item->name }}</a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span class="new-price">{{ number_format($item->price) }}
                                                                    .đ</span>
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

                            <div class="paginatoin-area">
                                <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        {{ $product->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">

                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Filter By</h2>
                        </div>
                        <!-- btn-clear-all start -->
                        <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                        <!-- btn-clear-all end -->
                        <!-- filter-sub-area start -->
                        <form action="/search" method="get">
                            @csrf
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Thương hiệu</h5>
                            <div class="categori-checkbox">

                                <ul>
                                 

                                </ul>

                            </div>
                        </div>
                        <button type="submit">asdd</button>
                    </form>
                    </div>
                    <!--sidebar-categores-box end  -->

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            var brand = [];

            // Listen for 'change' event, so this triggers when the user clicks on the checkboxes labels
            // $('input[name="brand[]"]').on('change', function(e) {

            //     e.preventDefault();
            //     brand = []; 

            //     $('input[name="brand[]"]:checked').each(function() {
            //         brand.push($(this).val());
            //     });

            //     $.ajax({
            //         url:'/search',
            //         type:'get',
            //         data:{
            //             producttype_id:brand
            //         },
            //         success:function(data){
            //             $('#sp').html(data);
            //         }
            //     })

            // });

            $('#search').on('click',function(){
                brand = []; 

                $('input[name="brand[]"]:checked').each(function() {
                    brand.push($(this).val());
                });
                $.ajax({
                    url:'/search',
                    type:'get',
                    data:{
                        producttype_id:brand
                    },
                    success:function(data){
                        $('#sp').html(data);
                    }
                })
            })

        });

    </script>
@endsection
