

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý liên hệ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title font-weight-bold py-2">Danh sách liên hệ</h3>
                                <div class="card-tools">
                                    <a class="btn btn-secondary" href="<?php echo e(route("list_order")); ?>">
                                        <i class="fa fa-arrow-left"></i> Quay lại
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">ID</th>
                                        <th class="text-center" width="30%">Thông tin khách hàng</th>
                                        <th class="text-center">Thông tin đơn hàng</th>
                                        <th class="text-center">Tổng giá trị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($row->id); ?></td>

                                            <td class="text-left">
                                                <b>+ Họ và tên:</b> <?php echo e($row->user->fullname); ?>

                                                <br>
                                                <b>+ Số điện thoại:</b> <?php echo e($row->user->phone); ?>

                                                <br>
                                                <b>+ Thành viên thẻ:</b>
                                                <?php $__currentLoopData = $member_card; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($card->id == $row->user->rank_id): ?>
                                                         <?php echo e($card->rank_type); ?> <img src="<?php echo e(asset("images/member_card/".$card->img)); ?>" style="height:50px; margin-left:20px" height= "50px" alt="">
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="text-left">
                                                <?php
                                                    $sum = 0
                                                ?>
                                                <?php $__currentLoopData = $row->list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <b>sản phẩm <?php echo e(++$key); ?></b>
                                                <br>
                                                <b>+</b> <?php echo e($product->name); ?> 
                                                <br>----   <?php echo e(number_format($product->price_detail)); ?> VND   ----
                                                <br>
                                                ------------------------------------------------------------------
                                                <br>
                                                <?php
                                                    $sum += $product->price_detail;
                                                ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="text-center"><?php echo e(number_format($sum)); ?> VND</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/order/file_save.blade.php ENDPATH**/ ?>