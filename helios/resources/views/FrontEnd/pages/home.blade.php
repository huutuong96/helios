@extends('FrontEnd.index')

@section('main')
        @include('FrontEnd.models.slider')
        <!-- Support Policy Box -->
        <div class="container">
            <div class="support-policy-box">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="support-policy"> <i class="fa fa-money"></i>
                            <div class="content">Tiết kiệm chi tiêu</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="support-policy"> <i class="fa fa-truck"></i>
                            <div class="content">Miễn phí vận chuyển</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="support-policy"> <i class="fa fa-phone"></i>
                            <div class="content">Hotline 24/7</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="support-policy"> <i class="fa fa-refresh"></i>
                            <div class="content">Hoàn trả sau 30 ngày</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Container -->
        <section class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="col-main">
                            <div class="jtv-featured-products">
                                <div class="slider-items-products">
                                    <div class="jtv-new-title">
                                        <h2>Sản phẩm mới</h2>
                                    </div>
                                    <div id="featured-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 products-grid">
                                            @foreach ($list_product["new_product"] as $item)
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info">
                                                            <a class="product-image" title="" href="{{route("product_detail", ["id"=> $item->id])}}">
                                                                <img alt="" src="{{asset("public/images/product/".$item->list_img[0]->image)}}" height="250px">
                                                            </a>

                                                            <div class="new-label new-top-left">new</div>
                                                        
                                                            <a href="{{route("add_to_wishlist",["id"=>$item->id])}}" data-toggle="tooltip" title="Yêu thích">
                                                                <div class="mask-left-shop">
                                                                    <i class="fa fa-heart"></i>
                                                                </div>
                                                            </a>
                                                            <a href="{{route("add_to_cart",["id"=>$item->id])}}" data-toggle="tooltip" title="Thêm giỏ hàng">
                                                                <div class="mask-right-shop">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a title="" href="{{route("product_detail", ["id"=> $item->id])}}">
                                                                {{$item->name}}
                                                                </a>
                                                            </div>
                                                            <div class="item-content">
                                                                <div class="item-price">
                                                                    <div class="price-box">
                                                                            <p class="regular-price">
                                                                                <span class="price" id="displayedPrice">
                                                                                    {{number_format($item->price - ($item->price * $item->promotion / 100))}} VNĐ
                                                                                </span>
                                                                            </p><br>
                                                                            <p class="old-price">
                                                                                    @if($item->promotion > 1)
                                                                                        <span class="price">
                                                                                            <span id="originalPrice">{{number_format($item->price)}} </span> VNĐ
                                                                                        </span>
                                                                                    @endif
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Products Slider -->
                        <div class="jtv-featured-products">
                            <div class="slider-items-products">
                                <div class="jtv-new-title">
                                    <h2>Sản phẩm thịnh hành</h2>
                                </div>
                                <div id="featured-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        @foreach ($list_product["top_view"] as $item)
                                        <div class="item">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <a class="product-image" title="" href="{{route("product_detail", ["id"=> $item->id])}}">
                                                        <img alt="" src="{{asset("public/images/product/".$item->list_img[0]->image)}}" height="250px">
                                                    </a>

                                                    <div class="new-label new-top-left">Hot</div>
                                                    
                                                    <a href="{{route("add_to_wishlist",["id"=>$item->id])}}" data-toggle="tooltip" title="Yêu thích">
                                                        <div class="mask-left-shop">
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                    </a>
                                                    <a href="{{route("add_to_cart",["id"=>$item->id])}}" data-toggle="tooltip" title="Thêm giỏ hàng">
                                                        <div class="mask-right-shop">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title">
                                                        <a title="" href="{{route("product_detail", ["id"=> $item->id])}}">
                                                            {{$item->name}}
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <p class="regular-price">
                                                                    <span class="price" id="displayedPrice">
                                                                        {{number_format($item->price - ($item->price * $item->promotion / 100))}} VNĐ
                                                                    </span>
                                                                </p><br>
                                                                <p class="old-price">
                                                                    @if($item->promotion > 1)
                                                                        <span class="price">
                                                                            <span id="originalPrice">{{number_format($item->price)}} </span> VNĐ
                                                                        </span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Trending Products Slider -->
                        
                        @include('FrontEnd.models.collection_area')
                        <!-- Latest Blog -->
                        <div class="jtv-latest-blog">
                            <div class="jtv-new-title" >
                                <h2>Tin tức mới nhất</h2>
                                <a href="{{route("blog")}}"><h5 style="float: right;padding: 15px 0px 15px 0px;">Xem thêm >>></h5></a>
                            </div>
                            <div class="row">
                                <div class="blog-outer-container">
                                    <div class="blog-inner">
                                        @foreach ($list_post as $item)
                                                <div class="col-xs-12 col-sm-4 blog-preview_item">
                                                    <div class="entry-thumb jtv-blog-img-hover"> <a href="{{route("blog_detail", [ "id" => $item->id])}}"> <img alt="Blog" src="{{asset("public/images/post/".$item->img)}}"> </a> </div>
                                                    <h4 class="blog-preview_title"><a href="{{route("blog_detail", [ "id" => $item->id])}}">{{$item->topic_name}}</a></h4>
                                                    <div class="blog-preview_info">
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                                            <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                                                            <li><i class="fa fa-clock-o"></i><span class="day">12</span><span class="month">Feb</span></li>
                                                        </ul>
                                                        <div class="blog-preview_desc">{{$item->title}} <a class="read_btn" href="{{route("blog_detail", [ "id" => $item->id])}}">Xem thêm >>></a></div>
                                                    </div>
                                                </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Latest Blog -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Brand Logo -->
        @include('FrontEnd.models.brand_logo')
        <!-- collection area end -->


        <!-- Collection Banner -->
        {{-- @include('FrontEnd.models.collection_banner') --}}
@endsection