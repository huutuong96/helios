

<?php $__env->startSection("css"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
        <?php echo $__env->make('FrontEnd.models.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                            <?php $__currentLoopData = $list_product["new_product"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info">
                                                            <a class="product-image" title="" href="<?php echo e(route("product_detail", ["id"=> $item->id])); ?>">
                                                                
                                                                <img alt="" src="<?php echo e(isset($item->list_img[0]->image) ? url('public/images/product/' . $item->list_img[0]->image) : url('public/images/product/default.jpg')); ?>" height="250px">
                                                            </a>

                                                            <div class="new-label new-top-left">new</div>
                                                        
                                                            <a href="<?php echo e(route("add_to_wishlist",["id"=>$item->id])); ?>" data-toggle="tooltip" title="Yêu thích">
                                                                <div class="mask-left-shop">
                                                                    <i class="fa fa-heart"></i>
                                                                </div>
                                                            </a>
                                                            <?php if($item->status == 1 && $item->quantity >= 1): ?>
                                                                <a href="<?php echo e(route("add_to_cart",["id"=>$item->id])); ?>" data-toggle="tooltip" title="Thêm giỏ hàng">
                                                                    <div class="mask-right-shop">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </div>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a title="" href="<?php echo e(route("product_detail", ["id"=> $item->id])); ?>">
                                                                <?php echo e($item->name); ?>

                                                                </a>
                                                            </div>
                                                            <div class="item-content">
                                                                <div class="item-price">
                                                                    <div class="price-box">
                                                                            <p class="regular-price">
                                                                                <span class="price" id="displayedPrice">
                                                                                    <?php echo e(number_format($item->price - ($item->price * $item->promotion / 100))); ?> VNĐ
                                                                                </span>
                                                                            </p><br>
                                                                            <p class="old-price">
                                                                                    <?php if($item->promotion > 1): ?>
                                                                                        <span class="price">
                                                                                            <span id="originalPrice"><?php echo e(number_format($item->price)); ?> </span> VNĐ
                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                            </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php $__currentLoopData = $list_product["top_view"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <a class="product-image" title="" href="<?php echo e(route("product_detail", ["id"=> $item->id])); ?>">
                                                        
                                                        <img alt="" src="<?php echo e(isset($item->list_img[0]->image) ? url('public/images/product/' . $item->list_img[0]->image) : url('public/images/default.jpg')); ?>" height="250px">
                                                    </a>

                                                    <div class="new-label new-top-left">Hot</div>
                                                    
                                                    <a href="<?php echo e(route("add_to_wishlist",["id"=>$item->id])); ?>" data-toggle="tooltip" title="Yêu thích">
                                                        <div class="mask-left-shop">
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                    </a>
                                                    <a href="<?php echo e(route("add_to_cart",["id"=>$item->id])); ?>" data-toggle="tooltip" title="Thêm giỏ hàng">
                                                        <div class="mask-right-shop">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title">
                                                        <a title="" href="<?php echo e(route("product_detail", ["id"=> $item->id])); ?>">
                                                            <?php echo e($item->name); ?>

                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <p class="regular-price">
                                                                    <span class="price" id="displayedPrice">
                                                                        <?php echo e(number_format($item->price - ($item->price * $item->promotion / 100))); ?> VNĐ
                                                                    </span>
                                                                </p><br>
                                                                <p class="old-price">
                                                                    <?php if($item->promotion > 1): ?>
                                                                        <span class="price">
                                                                            <span id="originalPrice"><?php echo e(number_format($item->price)); ?> </span> VNĐ
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Trending Products Slider -->
                        
                        <?php echo $__env->make('FrontEnd.models.collection_area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Latest Blog -->
                        <div class="jtv-latest-blog">
                            <div class="jtv-new-title" >
                                <h2>Bản tin</h2>
                                <a href="<?php echo e(route("blog")); ?>"><h5 style="float: right;padding: 15px 0px 15px 0px;">Xem thêm >>></h5></a>
                            </div>
                            <div class="row">
                                <div class="blog-outer-container">
                                    <div class="blog-inner">
                                        <?php $__currentLoopData = $list_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xs-12 col-sm-4 blog-preview_item">
                                                    <div class="entry-thumb jtv-blog-img-hover"> <a href="<?php echo e(route("blog_detail", [ "id" => $item->id])); ?>"> <img alt="Blog" src="<?php echo e(asset('/')); ?>public/images/post/<?php echo e($item->img); ?>" height="256px"> </a> </div>
                                                    <h4 class="blog-preview_title"><a href="<?php echo e(route("blog_detail", [ "id" => $item->id])); ?>"><?php echo e($item->title); ?></a></h4>
                                                    <div class="blog-preview_info">
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                                            <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                                                            <li><i class="fa fa-clock-o"></i><span class="day">12</span><span class="month">Feb</span></li>
                                                        </ul>
                                                        <div class="blog-preview_desc">Danh mục: <?php echo e($item->topic_name); ?> <a class="read_btn" href="<?php echo e(route("blog_detail", [ "id" => $item->id])); ?>"></a></div>
                                                    </div>
                                                </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php echo $__env->make('FrontEnd.models.brand_logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- collection area end -->


        <!-- Collection Banner -->
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/FrontEnd/pages/home.blade.php ENDPATH**/ ?>