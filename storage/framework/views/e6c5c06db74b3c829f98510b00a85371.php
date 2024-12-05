


<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <section class="col-sm-12 col-xs-12">
                <div class="cart-page-area">
                    <h2>Sản phẩm yêu thích</h2>
                    <?php if($wishlist != null): ?>
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
                                    <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="cart_item">
                                            <td class="item-img">
                                                <a href="">
                                                    <img alt="Product title is here" src="<?php echo e(asset("public/public/images/product/".$row->list_image[0]->image)); ?>">
                                                </a>
                                            </td>
                                            <td class="item-title"><a href="#"><?php echo e($row->name); ?> </a></td>
                                            <td class="item-price">
                                                <p class="regular-price">
                                                    <span class="price" id="displayedPrice">
                                                        <?php echo e(number_format($row->price - ($row->price * $row->promotion / 100))); ?> VNĐ
                                                    </span>
                                                </p><br>
                                                <p class="old-price">
                                                        <?php if($row->promotion > 1): ?>
                                                            <span class="price">
                                                                <span id="originalPrice"><?php echo e(number_format($row->price)); ?> </span> VNĐ
                                                            </span>
                                                        <?php endif; ?>
                                                </p>
                                            </td>

                                            <td class="item-qty">
                                                <?php echo e($row->quantity); ?>

                                            </td>
                                            <td class="total-price">
                                                <a class="btn-def btn2" href="<?php echo e(route("add_to_cart",["id"=>$row->id, "wishlist" =>"wishlist"])); ?>" data-toggle="tooltip" title="Thêm giỏ hàng">
                                                    <div class="mask-right-shop">
                                                        <i class="fa fa-shopping-cart"> Thêm giỏ hàng</i>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="remove-item">
                                                <a href="<?php echo e(route("destroy_product_in_wishlist", ["id"=>$row->id])); ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>
                        </div>
                    <?php else: ?> 
                        <h3>Bạn chưa có sản phẩm yêu thích nào</h3>
                        <p>Quay lại <a href="{{route("index")}]}">Trang chủ</a></p>
                    <?php endif; ?> 
                </div>
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/FrontEnd/pages/wishlist.blade.php ENDPATH**/ ?>