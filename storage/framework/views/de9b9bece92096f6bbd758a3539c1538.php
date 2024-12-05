

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>Danh sách đơn hàng</h2>
                            <a href="<?php echo e(route("account_orders")); ?>" class="btn btn-reorder" style="margin-left: 20px;">Quay lại</a>
                        </div>
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered text-left my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th width="150px">Hình ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th><span class="nobr">Đơn giá</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(++$key); ?></td>
                                                    <td><a href="<?php echo e(route("product_detail", ["id"=> $item->id])); ?>"><img src="<?php echo e(asset("public/public/images/product/". $item->img->image)); ?>" alt="<?php echo e($item->name); ?>" class="img-thumbnail"></a></td>
                                                    <td><?php echo e($item->name); ?></td>
                                                    <td><?php echo e($item->quantity); ?></td>
                                                    <td><span class="price"><?php echo e(number_format($item->price)); ?> </span></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="col-right sidebar col-sm-3 col-xs-12">
                <div class="block block-account">
                    <div class="block-title">Tài khoản</div>
                    <div class="block-content">
                        <ul>
                            <li><a href="<?php echo e(route("account")); ?>"><i class="fa fa-angle-right"></i> Tài khoản</a></li>
                            <li class="current"><a href="<?php echo e(route("account_detail")); ?>"><i class="fa fa-angle-right"></i> Thông tin tài khoản</a></li>
                            <li><a href="<?php echo e(route("account_orders")); ?>"><i class="fa fa-angle-right"></i> Lịch sử đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<!--End main-container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection(''); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/FrontEnd/pages/view_orders.blade.php ENDPATH**/ ?>