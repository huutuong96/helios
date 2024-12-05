

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li><a href="index.php" title="Quay lại trang chủ">Trang chủ</a><span>/</span></li>
                    <li><a title="Sản phẩm" href="index.php?page=product">Sản phẩm</a><span>/</span></li>
                    <li><strong>Tìm kiếm</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Main Container -->
<div class="main-container col2-left-layout">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main-inner">
                <article class="col-main">
                    <div class="page-title">
                        <h2>Từ khóa tìm kiếm :  <?php echo e($keyword); ?> </h2>
                    </div>
                    <div class="category-products">
                        <ul class="products-grid">
                            <?php if( !$list_product->isEmpty()): ?>
                                <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                        <div class="item">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info">
                                                        <a class="product-image" title="" href="<?php echo e(route("product_detail", ["id"=> $item->id])); ?>">
                                                            <img alt="" src="<?php echo e(asset("public/public/images/product/".$item->list_img[0]->image)); ?>" height="250px">
                                                        </a>

                                                        <div class="new-label new-top-left">new</div>
                                                    
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
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <li><p style="text-align: center; color: red; font-size: 20px">Không có tên sản phẩm nào liên quan đến từ khóa</p></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="toolbar bottom">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <div class="pages">
                                    <?php echo e($list_product->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
<!-- Main Container End -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/FrontEnd/pages/product_search.blade.php ENDPATH**/ ?>