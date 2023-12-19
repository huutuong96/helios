<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    
    <title>Helios E-Commerece Jewelry Website</title>

    <!-- Favicons Icon -->
    <link rel="icon" href="{{asset("public/images/favicon.ico")}}" type="image/x-icon" />

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{asset("public/css/styles.css")}}" media="all">
    @yield('css')
</head>

<body class="cms-index-index cms-home-page">
    @if(Session::has('messenge') && is_array(Session::get('messenge')))
        @php
            $messenge = Session::get('messenge');
        @endphp
        @if(isset($messenge['style']) && isset($messenge['msg']))
            <div class="alert alert-{{ $messenge['style'] }}" role="alert" style="position: fixed; top: 20px; right: 90px; width: auto; z-index: 9999; height: 50px; font-size: 15px;" id="myAlert">
                {{ $messenge['msg'] }}
            </div>
            @php
                Session::forget('messenge');
            @endphp
        @endif
    @endif

    <!-- Mobile Menu -->
   
    @include('FrontEnd.models.top_menu')
    <div id="page">
        <!-- Header -->
        <header>
            <div class="header-container" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="logo">
                                <a title="Helios E-Commerece" href="{{route("index")}}">
                                    <img alt="Helios E-Commerece" src="{{asset("public/images/config/".$config->logo)}}" style="position:absolute;top:10px;left:-5px">
                                </a>
                            </div>
                            <div class="nav-icon" style="margin-top:40px">
                               
                                @include('FrontEnd.models.mega_menu')
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                            <div class="jtv-mob-toggle-wrap">
                                <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
                            </div>
                            <div class="jtv-header-box">
                                <div class="search_cart_block">
                                    <div class="search-box hidden-xs">
                                        <form id="search_mini_form" action="{{route("search")}}" method="get">
                                            @csrf
                                            <input id="search" type="text" name="keyword" class="searchbox" placeholder="Nhập từ khoá tìm kiếm...." maxlength="128">
                                            <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Tìm kiếm</span>
                                                <i class="fa fa-search hidden-xs hidden-lg hidden-md"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="right_menu">
                                        <div class="menu_top">
                                            <div class="top-cart-contain pull-right">
                                                <div class="mini-cart">
                                                    @php
                                                    $cart = Session::get("cart"); 
                                                       if($cart  && isset($cart["products"])){
                                                            $number = count($cart["products"]);
                                                            $price_all = 0;
                                                            foreach ($cart["products"] as $key => $value) {
                                                                $price_all += $value->price;
                                                            }
                                                        } else {
                                                            $number = 0;
                                                            $price_all = 0;
                                                        }
                                                    @endphp
                                                    <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> Giỏ hàng <span>{{$number}}</span></a>
                                                      <div class="top-cart-content"  style="position: fixed; top: 8%; right: 9%; width: 343px">
                                                            @if($cart!=null  && isset($cart["products"]))
                                                                <div class="block-subtitle">
                                                                    <div class="top-subtotal">{{$number}} sản phẩm, <span class="price">{{number_format($price_all)}} VND</span></div>
                                                                </div>
                                                                <ul class="mini-products-list" id="cart-sidebar" style="">
                                                                    @foreach ($cart["products"] as $item)
                                                                        <li class="item">
                                                                            <div class="item-inner"><a class="product-image" title="Product tilte is here" href="product-detail.html"><img alt="Product tilte is here" src="{{asset("public/images/product/".$item->list_image[0]->image)}}"></a>
                                                                            <div class="product-details">
                                                                                <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Xem chi tiết</a> <a class="btn-edit" title="Edit item" href="{{route("destroy_product_in_cart", ["id"=>$item->id])}}"><i class="fa fa-trash"></i></a> </div>
                                                                                <p class="product-name"><a href="product-detail.html">{{$item->name}}</a></p>
                                                                                <strong>{{$item->number}}</strong> x <span class="price">{{number_format($item->price)}}--size:{{$item->size}}</span></div>
                                                                            </div>
                                                                        </li> 
                                                                    @endforeach 
                                                                </ul>
                                                                <div class="actions" style="display: flex; justify-content: space-between" > 
                                                                    <a href="{{route("cart")}}" class="view-cart"><span>giỏ hàng</span></a>
                                                                    <a href="{{route("checkout")}}" class="view-cart"><span>Thanh Toán</span></a>
                                                                </div>
                                                            @endif
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="top_section hidden-xs">
                                    <div class="toplinks">
                                        @include('FrontEnd.models.top_menu')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
        </header>
        <!-- end header -->
    <!-- Revslider -->


    {{-- main --}}

    @yield('main')

    {{-- end main --}}

 
    <!-- Footer -->
    <footer>
        <div class="footer-inner">
            <div style="padding-top:30px">
  
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <h4>Về chúng tôi</h4>
                        <div class="contacts-info">
                            <p>Công Ty Cổ Phần Vàng Bạc Đá Quý Helios </p>
                            <address>
                                <i class="fa fa-location-arrow"></i> <span>123 Tô Ký, Tân Thới Nhất, Quận 12<br>
                                    Tp Hồ Chí </span>
                            </address>
                            <div class="phone-footer"><i class="fa fa-phone"></i> +1 123 456 98765</div>
                            <div class="email-footer"><i class="fa fa-envelope"></i> <a href="mailto:helios@example.com">helios@example.com</a> </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
                        <h4>XEM THÊM</h4>
                        <ul class="links">
                            <li><a href="#">Sản Phẩm</a></li>
                            <li><a href="#">Tìm Cửa Hàng</a></li>
                            <li><a href="#">Đặc Trưng</a></li>
                            <li><a href="#">Chính Sách Bảo Mật</a></li>
                            <li><a href="blog.html">Bài Viết</a></li>
                            <li><a href="">Trang Khác</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-2 col-sm-6 col-xs-12">
                        <h4>CỬA HÀNG</h4>
                        <ul class="links">
                            <li><a href="about-us.html">Về Chúng Tôi</a></li>
                            <li><a href="">FAQs</a></li>
                            <li><a href="#">Phương Thức Vận Chuyển</a></li>
                            <li><img alt="Helios E-Commerece" src="{{asset("public/images/config/".$config->logo)}}"  style="position: absolute;bottom: -99px;left: -40px;"></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-lg-3 col-md-4 col-sm-6">
                        <div class="social">
                            <h4>Follow Us</h4>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <div class="payment-accept">
                            <h4>Secure Payment</h4>
                            <div class="payment-icon"><img src="{{asset("public/images/orther/paypal.png")}}" alt="paypal"> <img src="{{asset("public/images/orther/visa.png")}}" alt="visa"> <img src="{{asset("public/images/orther/american-exp.png")}}" alt="american express"> <img src="{{asset("public/images/orther/mastercard.png")}}" alt="mastercard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12 coppyright text-center">© 2018 Fabulous, All rights reserved.</div>
                </div>
            </div>
        </div>
    </footer>
    </div>
  
    <!-- JavaScript -->
    <script src="{{asset("public/js/jquery.min.js")}}"></script>
    <script src="{{asset("public/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("public/js/main.js")}}"></script>
    <script src="{{asset("public/js/revslider.js")}}"></script>
    <script src="{{asset("public/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("public/js/countdown.js")}}"></script>
    <script src="{{asset("public/js/mob-menu.js")}}"></script>
    <script src="{{asset("public/js/cloud-zoom.js")}}"></script>
  
    <script>
        jQuery(document).ready(function() {
            jQuery('#rev_slider_1').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 858,
                startheight: 500,
  
                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,
  
                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',
  
                touchenabled: 'on',
                onHoverStop: 'on',
  
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
  
                spinner: 'spinner0',
                keyboardNavigation: 'off',
  
                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,
  
                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,
  
                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,
  
                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'on',
  
                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,
  
                shuffle: 'off',
  
                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
  
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,
  
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
    </script>
    <!-- Hot Deals Timer -->
    <script>
        var dthen1 = new Date("12/25/17 11:59:00 PM");
        start = "08/04/15 03:02:11 AM";
        start_date = Date.parse(start);
        var dnow1 = new Date(start_date);
        if (CountStepper > 0)
            ddiff = new Date((dnow1) - (dthen1));
        else
            ddiff = new Date((dthen1) - (dnow1));
        gsecs1 = Math.floor(ddiff.valueOf() / 1000);
  
        var iid1 = "countbox_1";
        CountBack_slider(gsecs1, "countbox_1", 1);
    </script>
    <script>
        $(document).ready(function() {
            // Ẩn alert sau 3 giây
            setTimeout(function() {
                $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
            },2000);
        });
    </script>
    </body>
     @yield('js')
    </html>