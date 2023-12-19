@extends('FrontEnd.index')


@section('css')
    
@endsection

@section('main')
<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <section class="col-sm-12 col-xs-12">
                <div class="cart-page-area">
                    <h2>Sản phẩm yêu thích</h2>
                    @if ($wishlist != null)
                        <div class="table-responsive">
                            <table class="shop-cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Hình ảnh</th>
                                        <th class="product-name ">Tên sản phẩm</th>
                                        <th class="product-price ">Giá</th>
                                        <th class="product-subtotal ">Kho</th>
                                        <th class="product-quantity">Thêm giỏ hàng</th>
                                        <th class="product-remove">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlist as $row)
                                        <tr class="cart_item">
                                            <td class="item-img">
                                                <a href="">
                                                    <img alt="Product title is here" src="{{asset("public/images/product/".$row->list_image[0]->image)}}">
                                                </a>
                                            </td>
                                            <td class="item-title"><a href="#">{{ $row->name}} </a></td>
                                            <td class="item-price">
                                                <p class="regular-price">
                                                    <span class="price" id="displayedPrice">
                                                        {{number_format($row->price - ($row->price * $row->promotion / 100))}} VNĐ
                                                    </span>
                                                </p><br>
                                                <p class="old-price">
                                                        @if($row->promotion > 1)
                                                            <span class="price">
                                                                <span id="originalPrice">{{number_format($row->price)}} </span> VNĐ
                                                            </span>
                                                        @endif
                                                </p>
                                            </td>

                                            <td class="item-qty">
                                                {{ $row->quantity}}
                                            </td>
                                            <td class="total-price">
                                                <a class="btn-def btn2" href="{{route("add_to_cart",["id"=>$row->id, "wishlist" =>"wishlist"])}}" data-toggle="tooltip" title="Thêm giỏ hàng">
                                                    <div class="mask-right-shop">
                                                        <i class="fa fa-shopping-cart"> Thêm giỏ hàng</i>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="remove-item">
                                                <a href="{{route("destroy_product_in_wishlist", ["id"=>$row->id])}}">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else 
                        <h3>Bạn chưa có sản phẩm yêu thích nào</h3>
                        <p>Quay lại <a href="{{route("index")}]}">Trang chủ</a></p>
                    @endif 
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection