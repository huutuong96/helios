

<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
<?php $__env->stopSection(); ?>

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
                    <h1>Quản lý thương hiệu (thùng rác)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tất cả thương hiệu (thùng rác)</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách thương hiệu đã xóa</h3>
                                <div class="card-tools">
                                    <a class="btn btn-secondary" href="<?php echo e(route("brand_list")); ?>">
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
                                        <th class="text-center" width="100px">Ảnh đại diện</th>
                                        <th class="text-center" width="33%">Thông tin thương hiệu</th>
                                        <th class="text-center" width="33%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-left" style="padding-left: 50px; ">
                                                <img src="<?php echo e(asset("public/images/brand/".$row->img)); ?>" style="width:100%; max-height:200px" alt="">
                                            </td>
                                            <td class="text-left" style="padding-left: 50px; ">
                                                <b>Name:</b> <?php echo e($row->name); ?>

                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info mx-3" href="<?php echo e(route("change_stutus_brand",["id"=>$row->id, "status"=>2])); ?>"><i class="fa fa-undo"></i> Khôi phục</a>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-trash"></i> Xóa vĩnh viễn</button>

                                                <div class="modal fade" id="modal" style="width: 100%;background-color: rgba(255, 255, 255, 0.8);">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thông báo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa vĩnh viễn thương hiệu này không !!!
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <div style="display: flex"></div>
                                                                <a class="btn btn-sm btn-success" href="<?php echo e(route("destroy_brand",["id"=>$row->id])); ?>">Xóa vĩnh viễn</a>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($list_brand->links()); ?>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
 </script>
<script>
    $(document).ready(function() {
        // Ẩn alert sau 3 giây
        setTimeout(function() {
            $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
        },3000);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/brand/recycle_bin.blade.php ENDPATH**/ ?>