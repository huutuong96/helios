

<?php $__env->startSection('main'); ?>

<?php if(Session::has('messenge') && is_array(Session::get('messenge'))): ?>
    <?php
        $messenge = Session::get('messenge');
    ?>
    <?php if(isset($messenge['style']) && isset($messenge['msg'])): ?>
        <div class="alert alert-<?php echo e($messenge['style']); ?>" role="alert" style="position: fixed; top: 50px; right: 16px; width: auto; z-index: 9999" id="myAlert">
            <i class="icon fas fa-check"></i><?php echo e($messenge['msg']); ?>

        </div>
        <?php
            Session::forget('messenge');
        ?>
    <?php endif; ?>
<?php endif; ?>
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách sản phẩm</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="<?php echo e(route("creat_product")); ?>">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                    <a class="btn btn-secondary" href="<?php echo e(route("product_list",["act" =>"thùng rác"])); ?>">
                                        <i class="fa fa-trash"></i> Thùng rác
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-left" width="10px">#</th>
                                        <th class="text-left" width="100px">Hình</th>
                                        <th class="text-left" width="200px">Thông tin chung</th>
                                        <th class="text-left" width="100px">Giá sản phẩm</th>
                                        <th class="text-left" width="100px">Thống kê</th>
                                        <th class="text-left" width="100px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"> <?php echo e($row['id']); ?></td>
                                            <td class="text-center">
                                                <div id="imageSlider<?php echo e($row['id']); ?>" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php $__currentLoopData = $row['list_image']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                                                <img src="<?php echo e(asset("public/images/product/". $img['image'])); ?>" class="d-block w-100" alt="Image">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#imageSlider<?php echo e($row['id']); ?>" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#imageSlider<?php echo e($row['id']); ?>" data-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <b>Tên</b>: <?php echo e($row['name']); ?> <br><br>
                                                <b>Nhãn hàng</b>: <?php echo e($row['brand_name']); ?><br><br>
                                                <b>Loại</b>: <?php echo e($row['categori_name']); ?> <br><br>
                                               
                                                
                                            </td>
                                            <td class="text-left">
                                                <b>Giá</b>: <?php echo e(number_format($row['price'])); ?> VND<br><br>
                                                <b>Khuyến mãi</b> : <?php echo e($row['promotion']); ?>(%) <br><br>
                                            </td>
                                            <td class="text-left">
                                                - <b>Lượt xem</b>: <?php echo e($row['view']); ?><br><br>
                                                - <b>Lượng tồn kho</b>:<?php if($row['quantity'] > 0): ?>
                                                                    <?php echo e($row['quantity']); ?>

                                                                    <?php else: ?>
                                                                        Hết hàng
                                                                    <?php endif; ?>
                                                <br><br>- <b>Số lượng bán</b>:<?php echo e($row['sold_count']); ?><br><br>
                                            </td>
                                            <td class="text-center">
                                                <?php if($row->quantity > 0): ?>
                                                    <?php if($row->status == 1): ?>
                                                        <a class="btn btn-sm btn-success" href="<?php echo e(route("change_stutus_product",["id"=>$row->id])); ?>" style="width:80%; margin:5%"><i class="fa fa-toggle-on"></i> Còn hàng</a>
                                                    <?php else: ?>
                                                        <a class="btn btn-sm btn-danger"  href="<?php echo e(route("change_stutus_product",["id"=>$row->id])); ?>" style="width:80%; margin:5%"><i class="fa fa-toggle-off"></i> Hết hàng</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a class="btn btn-sm btn-danger" style="width:80%; margin:5%"><i class="fa fa-toggle-off"></i> Hết hàng</a>
                                                <?php endif; ?>
                                                <br>
                                                <a class="btn btn-sm btn-primary" href="<?php echo e(route("comment",["id"=>$row->id, "product" =>"product"])); ?>" style="width:80%; margin:5%"><i class="fa fa-comment"></i> Bình luận</a><br>
                                                <a class="btn btn-sm btn-info" href="<?php echo e(route("edit_product",["id"=>$row->id, "product" =>"product"])); ?>" style="width:80%; margin:5%"><i class="fa fa-edit"></i> Cập nhật</a><br>
                                                <a class="btn btn-sm btn-danger" href="<?php echo e(route("change_stutus_product",["id"=>$row->id, "status"=>0])); ?>" style="width:80%; margin:5%"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div style="margin: 10px 0">
                                <?php echo e($list_product->links()); ?>

                            </div>
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
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        // Ẩn alert sau 3 giây
        setTimeout(function() {
            $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
        },3000);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/product/product_list.blade.php ENDPATH**/ ?>