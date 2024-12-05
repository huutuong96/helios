@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
    <!-- main-container -->
  <div class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <div class="col-sm-12">
          <div class="product-area">
            <div class="title-tab-product-category">
              <div class="text-center">
                <ul class="nav jtv-heading-style" role="tablist">
                  <li role="presentation" class="active" id="cart"  onClick="next('cart')"><a href="#cart" aria-controls="cart" role="tab" data-toggle="tab">Giỏ Hàng</a></li>              </div>
            </div>
            <div class="content-tab-product-category"> 
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="cart-conten"> 
                  <!-- cart are start-->
                  <div class="cart-page-area">
                    <form method="post" action="{{route("update_cart")}}">
                      @csrf 
                      <div class="table-responsive">
                        @if($cart == null)
                            <div style="background-color: #f2dede; color: #a94442; padding: 10px; border: 1px solid #ebccd1; height: 50px; width: 400px; font-size: 20px; border-radius: 20px; margin: 0 auto; padding: 14px 0 0 18px;">
                                Không có sản phẩm nào trong giỏ hàng
                            </div>
                        @else
                        <table class="shop-cart-table">
                          <thead>
                            <tr>
                              <th class="product-thumbnail ">Hình ảnh</th>
                              <th class="product-name ">Tên sản phảm</th>
                              <th class="product-price ">Giá sản phẩm</th>
                              <th class="product-quantity">Số lượng</th>
                              <th class="product-subtotal ">Thành giá</th></th>
                              <th class="product-remove">Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            @foreach ($cart as $key => $item)
                                <tr class="cart_item">
                                    <td class="item-img"><a href="#"><img src="{{asset("public/public/images/product/".$item->list_image[0]->image)}}" alt="Product tilte is here "> </a></td>
                                    <td class="item-title"><a href="#">{{$item->name}}</a></td>
                                    <td class="item-price-{{$key}}" > 
                                        <input type="text" name="" id="price-{{$key}}" value="{{number_format($item->price_detail)}}" style="border: unset; background-color: unset; width:80px;height: 100%;">
                                        <span style="font-size: 15px "> VND</span>
                                    </td>
                                    <td class="item-qty"><div class="cart-quantity">
                                        <div class="product-qty">
                                        <div class="cart-quantity">
                                            <div class="cart-plus-minus">
                                                <div class="dec qtybutton" onClick='change_size_price(this, "-", "{{$item->price_detail}}", "total-price-{{$key}}", "{{ count($cart) }}")'>-</div>
                                                <input value="{{$item->number}}" name="number_{{$key}}" class="cart-plus-minus-box" type="text">
                                                <div class="inc qtybutton" onClick='change_size_price(this, "+", "{{$item->price_detail}}", "total-price-{{$key}}", "{{ count($cart) }}")'>+</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div></td>
                                    <td class="total-price">
                                        <input type="text" name="" id="total-price-{{$key}}" value="{{number_format($item->price_detail * $item->number)}}" style="border: unset; background-color: unset; width:80px;height: 100%;">
                                        <span style="font-size: 15px "> VND</span>
                                    </td>
                                    <td class="remove-item"><a href="{{route("destroy_product_in_cart", ["id"=>$item->id])}}"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="cart-bottom-area">
                        <div class="row">
                          <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="update-coupne-area">
                              <div class="update-continue-btn text-right">
                                <button class="button btn-continue" title="Continue Shopping" type="button"><span>Tiếp tục mua hàng</span></button>   
                                <button class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="buttom"><a href="{{route("destroy_product_in_cart",["act"=>"delete_all"])}}">xóa hết</a></button>
                                <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span>Cập nhật giỏ hàng</span></button>
                              </div>
                              <div class="coupn-area">
                                <div class="discount">
                                  <h3>Mã giảm giá</h3>
                                  <label for="coupon_code">Nhập mã giảm giá nến bạn có  !!!</label>
                                  <input type="hidden" value="0" id="remove-coupone" name="remove">
                                  <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                  <button value="Apply Coupon" onclick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>áp dụng</span></button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart-total-area">
                              <div class="catagory-title cat-tit-5 text-center">
                                <h3 style="font-size: 25px"><b>Hóa đơn tạm thời</b></h3>
                              </div><br>
                              <div class="sub-shipping">
                                <p>Tổng tiền:<span>vnđ</span><span id="all_price">1.000.000</span></p>
                                <p>Phí vận chuyển: <span>Miễn phí</span></p>
                              </div>
                              <br>
                              <div class="process-cart-total">
                                <p style="font-size: 20px">Thành tiền: <span>vnđ</span><span  id="all_price_detail">1.000.000</span></p>
                              </div>
                              <div class="process-checkout-btn text-right">
                                <a href="{{route("checkout")}}"><button class="button btn-proceed-checkout" title="Proceed to Checkout" type="button" ><span>Thanh toán</span></button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- cart are end--> 
                </div>
    @endif
    <div class="container">
      <div class="jtv-crosssel-pro">
        <div class="jtv-new-title">
          <h2>Có thể bạn sẽ quan tâm</h2>
        </div>
        <div class="category-products">
          <ul class="products-grid">
            @foreach ($top_view as $item)
                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="#"> <img alt="Product tilte is here" src="{{asset("public/public/images/product/".$item["list_img"][0]->image)}}"> </a>
                        <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                        </a> <a href="{{route("add_to_cart",["id"=>$item->id])}}">
                        <div class="mask-right-shop"><i class="fa fa-shopping-cart"></i></div>
                        </a> </div>
                    </div>
                    <div class="item-info">
                        <div class="info-inner">
                        <div class="item-title"> <a title="Product tilte is here" href="#">{{$item->name}} </a> </div>
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
                            <div class="actions"><a href="#" class="link-wishlist" title="Add to Wishlist"></a>
                            <a href="#" class="link-compare" title="Add to Compare"></a> </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--End main-container --> 
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    <script>
        function change_size_price(element, operation, price, location, number) {
            var inputField = $(element).siblings('.cart-plus-minus-box');
            var currentValue = parseInt(inputField.val());
            var newValue = operation === '+' ? currentValue + 1 : currentValue - 1;
            var price_location = $("#" + location);
    
            newValue = Math.max(1, newValue);
            
            var newPrice = newValue * price;
            newPrice = formatCurrency(newPrice);
    
            price_location.val(newPrice);
            inputField.val(newValue);
            sum_price(number);
        }
    
        function formatCurrency(number) {
            return numeral(number).format('0,0 VNĐ');
        }

       function next(name_id){
         var list = $(".nav li");
         var list_conten = $(".tab-pane")
            list.removeClass('active')
            list_conten.removeClass('active')
            $('#' + name_id).addClass('active');
            $('#' + name_id + "-conten").addClass('active');

       }
       
       function sum_price(number) {
        
            var sum = 0;
            for (let i = 0; i < number; i++) {
                var valueString = $("#total-price-" + i).val();
                valueString = valueString.replace(/,/g, '');
                var value = parseInt(valueString);                           
                sum += value;
                
            }
            sum = formatCurrency(sum);
            $("#all_price").text(sum)
            $("#all_price_detail").text(sum)
            
          
        }
        sum_price({{ count($cart)}});
        
        
    </script>
@endsection