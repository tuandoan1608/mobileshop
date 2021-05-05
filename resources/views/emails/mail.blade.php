<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-431:41-->

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Version Four || limupa - Digital Products Store ECommerce Bootstrap 4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="/theme/client/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/theme/client/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="/theme/client/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="/theme/client/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="/theme/client/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="/theme/client/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/theme/client/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="/theme/client/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="/theme/client/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="/theme/client/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/theme/client/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="/theme/client/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="/theme/client/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/theme/client/style.css">
    <link rel="stylesheet" href="/theme/client/css.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/theme/client/css/responsive.css">
    <!-- Modernizr js -->

    <script src="/theme/client/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/theme/client/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="/theme/client/js/countdown.js"></script>




</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <div class="row">
            <div class="col-md-6">
                <p>Xin chào shop,</p>

                <p>Khách hàng đã gửi một yêu cầu đặt hàng mới đến cửa hàng của Anh/Chị.</p>

                <p>Xem chi tiết đơn hàng xem tại: <a
                        href="{{ $url }}">{{ $order->order_code }}</a></p>
            </div>
            <div class="col-md-6">
                <label for="">Người mua hàng: </label>
                <p>{{ $order->firstname }} {{ $order->lastname }} </p>
                <label for="">Địa chỉ giao hàng: </label>
                <p>{{ $order->address }}, </p>

                <label for=""> Số điện thoại: </label>
                <p> {{ $order->phone }}</p>
                <p> Số điện thoại: {{ $order->phone }}</p>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <h4>Thông tin đơn hàng</h4>
                            <p>Mã đơn hàng: {{ $order->order_code }}</p>
                        </td>
                        <td>
                            <p>Ngày đặt hàng: {{ $order->created_at }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="card card-default">
               <table class="table">
                   <tbody>
                    @foreach ($orderdetail as $item)
                        <tr>
                            <td>{{ $item->productname }} 
                        </td>
                        <td>{{ $item->export_price }}</td>
                        <td>{{ $item->color }}</td>
                        <td>{{ $item->size }}</td>
                        <td>{{ $item->soluong }}
                        </td>
                        <td>{{ $item->total_price }}</td>
                        </tr>
                    @endforeach
                   </tbody>
               </table>
            </div>
        </div>

    </div>




    <!-- Popper js -->
    <script src="/theme/client/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="/theme/client/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="/theme/client/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="/theme/client/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="/theme/client/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="/theme/client/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="/theme/client/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="/theme/client/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="/theme/client/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="/theme/client/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="/theme/client/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->

    <!-- Counterup -->
    <script src="/theme/client/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="/theme/client/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="/theme/client/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="/theme/client/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="/theme/client/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="/theme/client/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="/theme/client/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="/theme/client/js/main.js"></script>
    <script>
        $('#errors').delay(2000).slideUp();

    </script>


</body>

<!-- index-431:47-->

</html>
