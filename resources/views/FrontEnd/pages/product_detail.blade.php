@extends('FrontEnd.index')

@section('main')
    <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="product-view">
          <div class="product-essential">
            <form action="{{route("add_to_cart")}}" method="get" id="product_addtocart_form">
                @csrf 
            <input type="hidden" name="id" id="" value="{{$product->id}}">  
              <div class="product-img-box col-lg-4 col-sm-5 col-xs-12" style="height: 20%">
                <div class="product-image" style="height: 400px;">
                  <div class="product-full">
                    <div class="new-label new-top-left"> New </div>
                    <img id="product-zoom" style="height: 400px;" src="{{ isset($product->list_img[0]->image) ? url('public/public/images/product/' . $product->list_img[0]->image) : url('public/public/images/default.jpg') }}" data-zoom-image="{{ isset($product->list_img[0]->image) ? url('public/public/images/product/' . $product->list_img[0]->image) : url('public/public/images/default.jpg') }}" alt="product-image"/> </div>
                    {{-- <img id="product-zoom" style="height: 400px;" src="{{ isset($item->list_img[0]->image) ? url('images/product/' . $item->list_img[0]->image) : url('images/default.jpg') }}" data-zoom-image="{{asset("images/product/".$product->list_img[0]->image)}}" alt="product-image"/> </div> --}}
                  <div class="more-views">
                    <div class="slider-items-products">
                      <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                        <div class="slider-items slider-width-col4 block-content">
                            @foreach ($product->list_img as $item)
                                <div class="more-views-items"> <a href="#" data-image="{{asset("public/public/images/product/".$item->image)}}" data-zoom-image="{{asset("public/public/images/product/".$item->image)}}"> <img id="product-zoom"  src="{{asset("public/public/images/product/".$item->image)}}" alt="product-image"/> </a></div>
                            @endforeach                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end: more-images --> 
              </div>
              <div class="product-shop col-lg-8 col-sm-7 col-xs-12" style="min-height: 511px;">
                <div class="product-name">
                  <h1>{{ $product->name}}</h1>
                </div>
                <div class="price-block">
                  <div class="price-box">
                    <p class="regular-price">
                        <input class="price" id="displayedPrice" style="border: unset; width: 140px;"
                         value="{{number_format($product->price + $list_size[0]->change_price - (($product->price + $list_size[0]->change_price) * $product->promotion / 100))}}"
                        ><span style="font-size: 25px "> VND</span>
                    </p>
                    <p class="old-price">
                        @if($product->promotion > 1)
                            <span class="price">
                                <span id="originalPrice">{{number_format($product->price)}} </span> VNĐ
                            </span>
                        @endif
                    </p>
                    <p class="availability in-stock">
                        @if ($product->status == 1 && $product->quantity >= 1)
                        <span>Còn hàng</span>
                        @else
                        <span style="background-color: red ">Hết hàng</span>
                        @endif
                    </p>
                  </div>
                </div>
                <div class="short-description">
                  <h2>Giới thiệu sản phẩm</h2>
                  <p>{{$product->smdetail}}.</p>
                </div>
                <div class="product-shop" data-toggle="buttons">
                    <h4 class="mt-3">Kích cỡ: <input name="size"  style="border: unset" class="text-xl" id="displayedSize" value = "{{$list_size[0]->size_number}}" ></h4>
                    <input type="hidden" name="size_id" id="size_id"  value = "{{$list_size[0]->id_size}}">
                    @foreach ($list_size as $item)
                        <!-- Thay thế class bằng id -->
                        <label class="btn btn-default text-center"  style="background-color: white;" onClick="change_size_price({{$product->price}},{{$item->change_price}},{{$product->promotion}},{{$item->size_number}}, {{$item->id_size}})">
                            <a class="size-label" >
                                <span class="text-xl">
                                    {{$item->size_number}}
                                </span>
                            </a>
                        </label>
                    @endforeach
                </div>
                <div class="add-to-box">
                  <div class="add-to-cart">
                    <div class="pull-left">
                      <div class="custom pull-left">
                        <label>Số lượng:</label>
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                        <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="number">
                        <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                      </div>
                    </div>
                    @if ($product->status == 1 && $product->quantity >= 1 )
                      <button class="button btn-cart" title="Add to Cart" type="submit"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                    @endif
                  </div>
                  <div class="email-addto-box">
                    <ul class="add-to-links">
                      <li><a class="link-wishlist" href="{{route("add_to_wishlist",["id"=>$product->id])}}"><i class="fa fa-heart"></i><span>Yêu thích</span></a></li>
                      <li><a class="email-friend" href="{{route('contact')}}"><i class="fa fa-envelope"></i><span>gủi mail liên hệ</span></a></li>
                    </ul>
                  </div>
                </div>
                <div class="social">
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
          <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
            <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Chi tiết sản phẩm</a></li>
            <li><a href="#product_tabs_tags" data-toggle="tab">Bình luận </a></li>
          </ul>
          <div id="productTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="product_tabs_description">
              <div class="std">
                <p>{{$product->detail}}.</p>
              </div>
            </div>
            <div class="tab-pane fade" id="product_tabs_tags">
              <ul class="comments-list">
                 @if ($comments->isEmpty())
                     Chưa có bình luận nào cho sản phẩm này
                 @else 
                    @foreach($comments as $comment)
                        <li class="comment" style="display: flex; margin: 5px">
                          <div class="user-img"><img src="{{asset("public/public/images/user/".$comment->user_img ??user.jpg)}}" alt="" style="height: 60px; width: 60px;; border-radius: 100%"><br></div>
                          <div class="comment-content" style="margin: 5px 20px">
                            <b>{{$comment->user_name}}</b><br>
                            <span>{{$comment->detail}}</span>
                          </div>
                        </li>
                    @endforeach
                 @endif
              </ul>
              <div class="box-collateral box-tags">
                <div class="tags">
                  <form id="" action="{{route("create_product_comment")}}" method="post">
                    @csrf
                    <div class="form-add-tags">
                      <label for="productTagName">Thêm bình luận:</label>
                      <div class="input-box">
                        <input type="hidden" name="product_id" id="" value="{{ $product->id}}">
                        <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id ?? ""}}">
                        <input class="input-text" name="detail" id="productTagName" type="text">
                        <button type="submit" title="Add Tags" class=" button btn-add"> <span>Gửi</span></button>
                      </div>
                      <!--input-box--> 
                    </div>
                  </form>
                </div>
                <!--tags-->
                <p class="note">Bạn cần đăng nhập trước khi bình luận !!!.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
  
  <!-- Related Products Slider -->
  
  <div class="container">
    <div class="jtv-related-products">
      <div class="slider-items-products">
        <div class="jtv-new-title">
          <h2>Các sản phẩm liên quan</h2>
        </div>
        <div class="related-block">
          <div id="jtv-related-products-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">
              @foreach ($list_product_related as $item)
                <div class="item">
                    <div class="item-inner">
                    <div class="item-img">
                        <div class="item-img-info">
                            <a class="product-image" title="Product tilte is here" href="{{route("product_detail", ["id"=> $item->id])}}">
                              <img alt="Product tilte is here" src="{{ isset($item->list_img[0]->image) ? url('public/public/images/product/' . $item->list_img[0]->image) : url('images/default.jpg') }}"> 
                            </a>
                            <a href="{{route("add_to_wishlist",["id"=>$item->id])}}">
                              <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                            </a>
                            @if ($item->status == 1 && $item->quantity >= 1)
                            <a href="{{route("add_to_cart",["id"=>$item->id])}}" data-toggle="tooltip" title="Thêm giỏ hàng">
                                <div class="mask-right-shop">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                            </a>
                        @endif
                        </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                        <div class="item-title"> <a title="Product tilte is here" href="{{route("product_detail", ["id"=> $item->id])}}"> {{$item->name}} </a> </div>
                        <div class="item-content">
                            <div class="item-price">
                            <div class="price-box">
                                <p class="regular-price">
                                    <span class="price" id="displayedPrice">
                                        {{number_format($item->price - ($item->price * $item->promotion / 100))}} VNĐ
                                    </span>
                                </p>
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
  </div>
  <!-- Related Products Slider End --> 
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        function change_size_price(price, change_price, promotion, size_number, size_id){
            
            var price_detail = price + change_price - ((price + change_price) * promotion /100)
            var price_location = document.getElementById("displayedPrice")
            var size_location = document.getElementById("displayedSize")
            var size_id_location = document.getElementById("size_id")
            price_location.value = formatCurrency(price_detail);
            size_location.value = size_number
            size_id_location.value = size_id
        }

        function formatCurrency(number) {
            return numeral(number).format('0,0 VNĐ');
        }
    </script>
@endsection