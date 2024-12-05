

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
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Danh sách đơn hàng</h2>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered datatable text-left my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Ngày đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th><span class="nobr">Tổng tiền</span></th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $list_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                <?php if($row->status != 3 && $row->status != 4): ?>
                                                <tr>
                                                    <td><?php echo e($row->id); ?></td>
                                                    <td><?php echo e($row->created_at); ?></td>
                                                    <td><?php echo e(Auth::user()->address); ?></td>
                                                    <td><span class="price"><?php echo e(number_format($row->sumprice)); ?></span></td>
                                                    <td class="text-primary">
                                                        <em>
                                                            <?php switch($row->status):
                                                                case (1): ?>
                                                                    <span style="color:blue"><b>Đặt hàng thành công</b></span>
                                                                    <?php break; ?>
                                                                <?php case (2): ?>
                                                                    <span style="color:black"><b>Đang vận chuyển</b></span>
                                                                    <?php break; ?>
                                                                <?php case (5): ?>
                                                                    <span style="color:rgb(61, 13, 11)"><b>Đang xử lý đơn hàng</b></span>
                                                                    <?php break; ?>
                                                                <?php default: ?>
                                                                    <span style="color:rgb(61, 13, 11)">Đang xử lý đơn hàng<b></b></span>
                                                            <?php endswitch; ?>
                                                        </em>
                                                    </td>
                                                    <td class="text-center last">
                                                        <div class="btn-group">
                                                            <a href="<?php echo e(route("view_orders", ["id" => $row->id])); ?>" class="btn btn-view-order">Xem đơn hàng</a>
                                                            <?php if($row->status == 5): ?>  
                                                                <a href="<?php echo e(route('destroy_order',["id" => $row->id])); ?>" class="btn btn-reorder">Huỷ đơn</a>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>Lịch sử đơn hàng</h2>
                        </div>
                        <div class="dasboard" style="margin-top: 10px;">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered text-left datatable my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Ngày đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th><span class="nobr">Tổng tiền</span></th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $list_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                <?php if($row->status == 3 || $row->status == 4 ): ?>  
                                                    <tr>
                                                        <td><?php echo e($row->id); ?></td>
                                                        <td><?php echo e($row->created_at); ?></td>
                                                        <td><?php echo e(Auth::user()->address); ?></td>
                                                        <td><span class="price"><?php echo e(number_format($row->sumprice)); ?></span></td>
                                                        <td class="text-primary">
                                                            <em>
                                                                <?php if($row->status == 4): ?>  
                                                                    Đã giao thành công
                                                                <?php elseif($row->status == 3): ?>  
                                                                    Đã huỷ đơn
                                                                <?php endif; ?>
                                                            </em>
                                                        </td>
                                                        <td class="text-center last">
                                                            <div class="btn-group">
                                                                <a href="<?php echo e(route("view_orders", ["id" => $row->id])); ?>" class="btn btn-view-order">Xem chi tiết</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
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
                    <div class="block-title">Quản lý tài khoản</div>
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

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/FrontEnd/pages/account_orders.blade.php ENDPATH**/ ?>