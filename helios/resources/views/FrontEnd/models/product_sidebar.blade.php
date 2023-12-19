<aside class="sidebar">
    <div class="block block-layered-nav">
        <div class="block-title">
            <h3>Danh mục</h3>
        </div>
        <div class="block-content">
            <dl id="narrow-by-list">
                <!-- <dt class="even">Category</dt> -->
                <dd class="even">
                    <ol>
                        <li><a href="?option=page&act=product">Tất cả sản phẩm</a></li>
                        <?php
                        // require_once '../system/myFunction.php';
                        // displayCategories($list_categories);
                        ?>
                    </ol>
                </dd>
                <!-- <dt class="odd">Clothing Material</dt>
                                <dd class="odd">
                                    <ol class="bag-material">
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Cotton" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Cotton</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Denim" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Denim</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Linen" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Linen</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Rayon" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Rayon</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Synthetic" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Synthetic</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Satin" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Satin</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="pretty p-icon p-smooth">
                                                <input type="checkbox" name="Material" value="Silk" />
                                                <div class="state p-success"> <i class="icon fa fa-check"></i>
                                                    <label>Silk</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </dd> -->
                <!-- <dt class="odd">Size</dt>
                <div class="size-area">
                    <div class="size">
                        <ul>
                            <li><a href="#">S</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">XXL</a></li>
                        </ul>
                    </div>
                </div>
                <dt class="odd">Color</dt>
                <dd class="odd">
                    <ol>
                        <li><a href="#">Green</a> (1) </li>
                        <li><a href="#">White</a> (5) </li>
                        <li><a href="#">Black</a> (5) </li>
                        <li><a href="#">Gray</a> (4) </li>
                        <li><a href="#">Dark Gray</a> (3) </li>
                        <li><a href="#">Blue</a> (1) </li>
                    </ol>
                </dd> -->
            </dl>
        </div>
    </div>
    <div class="block block-layered-nav">
        <div class="block-title">
            <h3>Thương hiệu</h3>
        </div>
        <div class="block-content">
            <dl id="narrow-by-list">
                <!-- <dt class="even">Category</dt> -->
                <dd class="even">
                    <ol>
                        <li><a href="?option=page&act=product">Tất cả sản phẩm</a></li>

                    </ol>
                </dd>
            </dl>
        </div>
    </div>
    <div class="block product-price-range ">
        <div class="block-title">
            <h3>Lọc theo giá</h3>
        </div>
        <div class="block-content">
            <div class="slider-range">
                <ul class="check-box-list">
                    <!-- Liên kết cho các lựa chọn lọc với thuộc tính data-* -->
                    <li><a href="?<?= http_build_query(array_merge($_GET, ['min_price' => 0, 'max_price' => 5000000, 'pages' => null])) ?>" class="price-filter">+ Dưới: 5,000,000 Vnđ</a></li>
                    <li><a href="?<?= http_build_query(array_merge($_GET, ['min_price' => 5000000, 'max_price' => 10000000, 'pages' => null])) ?>" class="price-filter">+ 5,000,000 - 10,000,000 Vnđ</a></li>
                    <li><a href="?<?= http_build_query(array_merge($_GET, ['min_price' => 10000000, 'max_price' => 20000000, 'pages' => null])) ?>" class="price-filter">+ 10,000,000 - 20,000,000 Vnđ</a></li>
                    <li><a href="?<?= http_build_query(array_merge($_GET, ['min_price' => 20000000, 'max_price' => 30000000, 'pages' => null])) ?>" class="price-filter">+ 20,000,000 - 30,000,000 Vnđ</a></li>
                    <li><a href="?<?= http_build_query(array_merge($_GET, ['min_price' => 30000000, 'max_price' => 999999999, 'pages' => null])) ?>" class="price-filter">+ Trên: 30,000,000 Vnđ</a></li>

                    <!-- <li>
                        <div class="pretty p-icon p-smooth">
                            <input type="checkbox" name="cc" value="p1" />
                            <div class="state p-success"> <i class="icon fa fa-check"></i>
                                <label for="p1"> 150,000 - 250,000 Vnđ
                                    <span class="count">(5)</span> 
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pretty p-icon p-smooth">
                            <input type="checkbox" name="cc" value="p2" />
                            <div class="state p-success"> <i class="icon fa fa-check"></i>
                                <label for="p2"> 250,000 - 350,000 Vnđ
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pretty p-icon p-smooth">
                            <input type="checkbox" name="cc" value="p3" />
                            <div class="state p-success"> <i class="icon fa fa-check"></i>
                                <label for="p3"> 350,000 - 500,000 Vnđ
                                </label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pretty p-icon p-smooth">
                            <input type="checkbox" name="cc" value="p4" />
                            <div class="state p-success"> <i class="icon fa fa-check"></i>
                                <label for="p4"> 500,000+ Vnđ
                                </label>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="block block-cart">
        <div class="block-title ">
            <h3>My Cart</h3>
        </div>
        <div class="block-content">
            <div class="summary">
                <p class="amount">There are <a href="shopping_cart.html">3 items</a> in your cart.</p>
                <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$227.99</span> </p>
            </div>
            <div class="ajax-checkout">
                <button class="button button-checkout" title="Submit" type="submit"><span>Checkout</span></button>
            </div>
            <p class="block-subtitle">Recently added item(s) </p>
            <ul>
                <li class="item"> <a href="shopping_cart.html" title="Product Title Here" class="product-image"><img src="images/products/product-fashion-1.jpg" alt="Product Title Here"></a>
                    <div class="product-details">
                        <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="jtv-btn-remove"> <span class="icon"></span> Remove </a> </div>
                        <p class="product-name"> <a href="shopping_cart.html">Product Title Here</a> </p>
                        <strong>1</strong> x <span class="price">$99.99</span>
                    </div>
                </li>
                <li class="item"> <a href="shopping_cart.html" title="Product Title Here" class="product-image"><img src="images/products/product-fashion-1.jpg" alt="Product Title Here"></a>
                    <div class="product-details">
                        <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="jtv-btn-remove"> <span class="icon"></span> Remove </a> </div>
                        <p class="product-name"> <a href="shopping_cart.html">Product Title Here</a> </p>
                        <strong>1</strong> x <span class="price">$88.00</span>
                    </div>
                </li>
                <li class="item"> <a href="shopping_cart.html" title="Product Title Here" class="product-image"><img src="images/products/product-fashion-1.jpg" alt="Product Title Here"></a>
                    <div class="product-details">
                        <div class="access"> <a href="shopping_cart.html" title="Remove This Item" class="jtv-btn-remove"> <span class="icon"></span> Remove </a> </div>
                        <p class="product-name"> <a href="shopping_cart.html">Product Title Here</a> </p>
                        <strong>1</strong> x <span class="price">$98.00</span>
                    </div>
                </li>
            </ul>
        </div>
    </div> -->
    <!-- <div class="block block-compare">
                        <div class="block-title ">Compare Products (2)</div>
                        <div class="block-content">
                            <ol id="compare-items">
                                <li class="item">
                                    <input type="hidden" value="2173" class="compare-item-id">
                                    <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a>
                                </li>
                                <li class="item">
                                    <input type="hidden" value="2174" class="compare-item-id">
                                    <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a>
                                </li>
                                <li class="item">
                                    <input type="hidden" value="2175" class="compare-item-id">
                                    <a class="jtv-btn-remove" title="Remove This Item" href="#"></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>Product Title Here</a>
                                </li>
                            </ol>
                            <div class="ajax-checkout">
                                <button type="submit" title="Submit" class="button button-compare"><span>Compare</span></button>
                                <button type="submit" title="Submit" class="button button-clear"><span>Clear</span></button>
                            </div>
                        </div>
                    </div> -->
    <!-- <div class="custom-slider">
                        <div>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active"><img src="images/slide3.jpg" alt="New Arrivals">
                                        <div class="carousel-caption">
                                            <h3><a title=" Sample Product" href="#">New Arrivals</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="item"><img src="images/slide1.jpg" alt="Top Fashion">
                                        <div class="carousel-caption">
                                            <h3><a title=" Sample Product" href="#">Top Fashion</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="item"><img src="images/slide2.jpg" alt="Mid Season">
                                        <div class="carousel-caption">
                                            <h3><a title=" Sample Product" href="#">Mid Season</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#" data-slide="next"> <span class="sr-only">Next</span></a>
                            </div>
                        </div>
                    </div> -->
    <!-- <div class="block block-list block-viewed">
                        <div class="block-title">
                            <h3>Recently Viewed</h3>
                        </div>
                        <div class="block-content">
                            <ol id="recently-viewed-items">
                                <li class="item odd">
                                    <p class="product-name"><a href="#"><i class="fa fa-angle-right"></i>Product Title Here</a></p>
                                </li>
                                <li class="item even">
                                    <p class="product-name"><a href="#"><i class="fa fa-angle-right"></i>Product Title Here</a></p>
                                </li>
                                <li class="item last odd">
                                    <p class="product-name"><a href="#"><i class="fa fa-angle-right"></i>Product Title Here</a></p>
                                </li>
                            </ol>
                        </div>
                    </div> -->
    <!-- <div class="block block-tags">
                        <div class="block-title">
                            <h3>Popular Tags</h3>
                        </div>
                        <div class="block-content">
                            <div class="tags-list"> <a href="#">Jwellery</a> <a href="#">Bag</a> <a href="#">Clothing</a> <a href="#">Shoes</a> <a href="#">Watches</a> <a href="#">Beauty</a> <a href="#">Accessories</a> </div>
                            <div class="actions"> <a href="#" class="view-all">View All Tags</a> </div>
                        </div>
                    </div> -->
</aside>
<script>
    // Lấy tất cả các phần tử có class "toggle-icon"
    var toggleIcons = document.querySelectorAll('.toggle-icon');

    // Lặp qua từng toggle-icon và thêm sự kiện click
    toggleIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            var sublist = this.nextElementSibling; // Lấy danh sách con (ol)
            if (sublist.style.display === 'none' || sublist.style.display === '') {
                sublist.style.display = 'block'; // Hiển thị danh sách con
                this.innerText = '▲'; // Đổi icon sang mũi tên lên
            } else {
                sublist.style.display = 'none'; // Ẩn danh sách con
                this.innerText = '▼'; // Đổi icon sang mũi tên xuống
            }
        });
    });
</script>