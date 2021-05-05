@extends('client.master')
@section('css')
    <style>
        .countdown {
            font-family: arial;
            text-transform: uppercase;
        }

        .countdown>div {
            display: inline-block;
        }

        .countdown>div>span {
            display: block;
            text-align: center;
        }

        .countdown-container {
            border: 2px solid #dbdbdb;
    margin: 20px 2px 0;
    padding: 5px;
        }

        .countdown-container .countdown-heading {
            font-size: 11px;
            margin: 3px;
            color: #666
        }

        .countdown-container .countdown-value {
            font-size: 20px;
            background: #6273c9;
      
            color: #fff;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4)
        }

    </style>
@endsection
@section('content')


    @include('client.layout.banner')

    <!-- product-area end -->
    <!-- Begin Li's Static Banner Area -->
    <div class="li-static-banner li-static-banner-4 text-center pt-20">
        <div class="container">
            <div class="row">
                <!-- Begin Single Banner Area -->
                <div class="col-lg-6">
                    <div class="single-banner pb-sm-30 pb-xs-30">
                        <a href="#">
                            <img src="/theme/client/images/banner/2_3.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-6">
                    <div class="single-banner">
                        <a href="#">
                            <img src="/theme/client/images/banner/2_4.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            </div>
        </div>
    </div>



    <section class="product-area li-laptop-product Special-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Hot sales</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="special-product-active owl-carousel">
                            @foreach ($productphone as $item)
                                @if ($item->startsale==1)
                                    
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="/san-pham/{{ $item->slug }}">
                                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}">
                                            </a>
                                            <span class="sticker">Hot</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                
                                                <h4><a class="product_name" href="/san-pham/{{ $item->slug }}">{{ $item->name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2 "> <?php  
                                                        $pr= $item->price;
                                                       $dc= $item->discount;
                                                       $dis=$pr*(100-$dc)/100;
                                                         echo number_format($dis);
                                                         
                                                         ?> VND</span>
                                                         <br>
                                                    <span class="old-price">{{ number_format($item->price) }}VND</span>
                                                    
                                                    <span class="discount-percentage">-{{ $item->discount }}%</span>
                                                </div>
                                                <div class="countersection">
                                                    <div class='countdown' data-date="{{ $item->enddate }}"></div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                
                                    
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>

    <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
        <div class="container">
            <div class="row">
                @foreach ($category as $cate)
                @if ($cate->categoryproduct->count()>0)
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>{{ $cate->categoryproduct->first()->category->name }} </span>
                        </h2>
                        
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                        
                          
                          @foreach ($cate->categoryproduct as $item)
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
                                              <span class="new-price">{{ number_format($item->price) }}.đ</span>
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
                @endif
                @endforeach
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
   
  
   


@endsection
@section('script')



@endsection
