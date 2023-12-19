<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="jtv-hot-deal-product">
            <div class="jtv-new-title">
                <h2>Deals Of The Day</h2>
            </div>
            <ul class="products-grid">
                <li class="right-space two-height item">
                    @foreach ($list_product["hot_deal"] as $item)
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="{{route("product_detail", ["id"=> $item->id])}}" title="Product tilte is here" class="product-image"><img src="{{asset("public/images/product/". $item->list_img[0]->image)}}" alt="Product tilte is here"> </a>
                                </div>
                                <div class="jtv-timer-box">
                                    <div class="countbox_1 timer-grid"></div>
                                </div>
                            </div>

                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"> <a title="Product tilte is here" href="{{route("product_detail", ["id"=> $item->id])}}">{{$item->name}} </a> </div>
                                    <div class="item-content">
                                        <div class="item-price">
                                            <div class="price-box"> <span class="regular-price"> <span class="price">{{number_format($item->price + ($item->price * $item->promotion / 100))}} VNĐ</span></span></div>
                                        </div>
                                        <div class="actions">
                                            <div class="add_cart">
                                                <form action="{{route("add_to_cart")}}" method="get">
                                                    @csrf
                                                    <input type="hidden" name="id" id="" value="{{$item->id}}">
                                                    <button class="button btn-cart" type="submit"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
        <div class="sidebar-banner">
            <div class="jtv-top-banner"> <a href="#"> <img src="{{asset("public/images/banner/".$banner_list["collection_area_top"][0]->img)}}" alt="banner"> </a> </div>
            <div class="jtv-top-banner"> <a href="#"> <img src="{{asset("public/images/banner/".$banner_list["collection_area_buttom"][0]->img)}}" alt="banner"> </a> </div>
        </div>
    </div>
    <!-- Top Seller Slider -->
    <div class="col-sm-4 col-xs-12">
        <div class="jtv-top-products">
            <div class="slider-items-products">
                <div class="jtv-new-title">
                    <h2>Top Seller</h2>
                </div>
                <div id="top-products-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        @foreach ($list_product["top_sale"] as $item)
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="Product tilte is here" href="{{route("product_detail", ["id"=> $item->id])}}">
                                                <img alt="Product tilte is here" src="{{asset("public/images/product/". $item->list_img[0]->image)}}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Product tilte is here" href="{{route("product_detail", ["id"=> $item->id])}}">{{$item->name}} </a> </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <p class="regular-price">
                                                        <span class="price" id="displayedPrice">
                                                            {{number_format($item->price + ($item->price * $item->promotion / 100))}} VNĐ
                                                        </span>
                                                    </p>
                                                    <p class="old-price">
                                                        <span class="price">
                                                            <span id="originalPrice">{{number_format($item->price)}} </span> VNĐ
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <form action="{{route("add_to_cart")}}" method="get">
                                                            @csrf
                                                            <input type="hidden" name="id" id="" value="{{$item->id}}">
                                                            <button class="button btn-cart" type="submit"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                       </form>
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
        <!-- End Top Seller Slider -->
    </div>
</div>