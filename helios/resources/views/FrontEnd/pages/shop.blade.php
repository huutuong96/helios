@extends('FrontEnd.index')

@section('css')

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

@endsection

@section('main')
 <!-- Main Container -->
 <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-sm-push-3 main-inner">
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col1 owl-carousel owl-theme">
                  <div class="item"> <a href="#"><img alt="New Special Collection" src="{{asset("public/images/orther_x/new-special.jpg")}}"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      <h2 class="cat-heading">New Special<br>
                        Collection</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                  </div>
                  <div class="item"> <a href="#"><img alt="New Fashion" src="{{asset("public/images/orther_x/new-fashion.jpg")}}"></a>
                    <div class="cat-img-title cat-bg cat-box">
                      <h2 class="cat-heading">New Fashion</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <article class="col-main">
            <div class="page-title">
              <h2>Danh sách sản phẩm</h2>
            </div>
            <div class="toolbar">
              <div id="sort-by">
                <label class="left">Sắp xếp theo: </label>
                <ul>
                  <li><a href="#">...<span class="right-arrow"></span></a>
                    <ul>
                      <li style="width: 130px;"><a href="{{route("shop",["key"=> "name","value" => "desc"])}}">Tên sản phẩm</a></li>
                      <li style="width: 130px;"><a href="{{route("shop",["key"=> "price","value" => "desc"])}}">Giá sản phẩm</a></li>
                    </ul>
                  </li>
                </ul>
                <a class="button-asc left" href="#" title="Set Descending Direction"><span class="top_arrow"></span></a> </div>
              <div class="pager">
                <div id="limiter">
                  <label>Số lượng show: </label>
                  <ul>
                    <li><a href="{{route("shop",["number"=> count($list_product)])}}">{{count($list_product)}}<span class="right-arrow"></span></a>
                      <ul>
                        <li><a href="{{route("shop",["number"=> 6])}}">9</a></li>
                        <li><a href="{{route("shop",["number"=> 6])}}">15</a></li>
                        <li><a href="{{route("shop",["number"=> 6])}}">18</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="category-products">
              <ul class="products-grid">
                @foreach ($list_product as $item)
                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="item-inner">
                        <div class="item-img">
                            <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="{{asset("public/images/product/".$item->list_image[0]->image)}}"> </a>
                            <div class="new-label new-top-left">new</div>
                            <div class="sale-label sale-top-right">sale</div>
                            <div class="mask-shop-white"></div>
                            <div class="new-label new-top-left">new</div>
                            <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="wishlist.html">
                            <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                            </a> <a href="compare.html">
                            <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                            </a> </div>
                        </div>
                        <div class="item-info">
                            <div class="info-inner">
                            <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                            <div class="item-content">
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                <div class="price-box"> <span class="regular-price"> <span class="price">$11111111</span></span>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $119.00 </span> </p>
                                </div>
                                </div>
                                <div class="actions">
                                <div class="add_cart">
                                    <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </li>
                @endforeach
                
              </ul>
            </div>
            
            <div class="toolbar bottom">
              <div class="row">
                <div class="col-sm-2 text-left">
                    {{$list_product->links()}}
              </div>
            </div>
          </article>
        </div>
        <div class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <aside class="sidebar">
            <div class="block block-layered-nav">
              <div class="block-title">
                <h3>Cửa hàng</h3>
              </div>
              <div class="block-content">
                <dl id="narrow-by-list">
                  <dt class="even">Danh mục sản phẩm</dt>
                  <dd class="even">
                    <ol>
                        @foreach ($list_category as $item)
                            @if ($item->parent_id == 0)
                            <li  data-bs-toggle="dropdown" ><a href="#">{{$item->name}}</a> (20) 
                                <ol class="dropdown-menu">
                                    @foreach ($list_category as $item2)
                                        @if ($item2->parent_id == $item->id)
                                            <li class="dropdown-item" style="height: 25px;"><a href="#" style="height: 25px; display: unset;">{{$item2->name}}  (20)</a> </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </li>
                            @endif
                        @endforeach
                    </ol>
                  </dd>
                  <dt class="odd">Chất liệu sản phẩm</dt>
                  <dd class="odd">
                    <ol class="bag-material">
                        @php
                            $list_material = ALL_MATERIAL;
                        @endphp
                        @foreach ($list_material as $item)
                            <li>
                                <div class="pretty p-icon p-smooth">
                                <input type="checkbox" name="Material" value="Cotton" />
                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                    <label>{{$item}}</label>
                                </div>
                                </div>
                            </li>
                        @endforeach
                     
                    </ol>
                  </dd>
                  <dt class="odd">Size</dt>
                  <div class="size-area">
                    <div class="size">
                      <ul>
                        @foreach ($list_size as $item)
                            <li><a href="#">{{$item->size_number}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </dl>
              </div>
            </div>
            <div class="block product-price-range ">
              <div class="block-title">
                <h3>Giá Cả</h3>
              </div>
              <div class="block-content">
                <div class="slider-range">
                  <ul class="check-box-list">
                    <li>
                      <div class="pretty p-icon p-smooth">
                        <input type="checkbox" name="cc" value="p1" />
                        <div class="state p-success"> <i class="icon fa fa-check"></i>
                          <label for="p1"> 100,000 - 1,000,000 VND<span class="count">(5)</span> </label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="pretty p-icon p-smooth">
                        <input type="checkbox" name="cc" value="p2" />
                        <div class="state p-success"> <i class="icon fa fa-check"></i>
                          <label for="p1"> 1,000,000 - 3,000,000 VND<span class="count">(12)</span> </label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="pretty p-icon p-smooth">
                        <input type="checkbox" name="cc" value="p3" />
                        <div class="state p-success"> <i class="icon fa fa-check"></i>
                          <label for="p1"> 3,000,000 - 5,000,000 VND<span class="count">(15)</span> </label>
                        </div>
                      </div>
                    </li>
                    <li>
                        <div class="pretty p-icon p-smooth">
                          <input type="checkbox" name="cc" value="p3" />
                          <div class="state p-success"> <i class="icon fa fa-check"></i>
                            <label for="p1"> 5,000,000 - 15,000,000 VND<span class="count">(15)</span> </label>
                          </div>
                        </div>
                    </li>
                    <li>
                    <div class="pretty p-icon p-smooth">
                        <input type="checkbox" name="cc" value="p3" />
                        <div class="state p-success"> <i class="icon fa fa-check"></i>
                        <label for="p1"> 15,000,000 - 30,000,000 VND<span class="count">(15)</span> </label>
                        </div>
                    </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="custom-slider">
              <div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="item active"><img src="{{asset("public/images/orther_x/slide3.jpg")}}" alt="New Arrivals">
                      <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="#">New Arrivals</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                    <div class="item"><img src="{{asset("public/images/orther_x/slide1.jpg")}}" alt="Top Fashion">
                      <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="#">Top Fashion</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                    <div class="item"><img src="{{asset("public/images/orther_x/slide2.jpg")}}" alt="Mid Season">
                      <div class="carousel-caption">
                        <h3><a title=" Sample Product" href="#">Mid Season</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </div>
                  </div>
                  <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">Next</span></a></div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container End --> 
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection