

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
                    <h1>Quản lý banner quảng cáo (thùng rác)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang quản lý</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route("banner_list")); ?>">Danh sách banner</a></li>
                        <li class="breadcrumb-item active">thùng rác</li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý danh sách banner đã xóa</h3>
                                <div class="card-tools">
                                    <a class="btn btn-secondary" href="<?php echo e(route("banner_list")); ?>">
                                        <i class="fa fa-arrow-left"></i> Quay lại
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped table-compact table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">#</th>
                                        <th class="text-center" width="20%">Ảnh đại diện</th>
                                        <th class="text-center">Thông tin banner</th>
                                        <th class="text-center"width="15%">Đường dẫn</th>
                                        <th class="text-center" width="100px">Vị trí</th>
                                        <th class="text-center" width="200px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_banner as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($row->id); ?></td>
                                            <td class="text-center">
                                                <img src="<?php echo e(asset("public/images/banner/". $row->img )); ?>" style="width: 100%;" class="img img-fuild img-thumbnail">
                                            </td>
                                            <td class="text-left">
                                                <b>+ Tên banner:</b> <?php echo e($row->name); ?><br><br>
                                                <?php if(isset($row->info1)): ?>
                                                    <b>+ Thông tin 1:</b> <?php echo e($row->info1); ?><br><br>
                                                <?php endif; ?>
                                                <?php if(isset($row->info2)): ?>
                                                <b>+ Thông tin 2:</b> <?php echo e($row->info2); ?>;<br><br>
                                                <?php endif; ?>
                                                <?php if(isset($row->info3)): ?>
                                                <b>+ Thông tin 3:</b> <?php echo e($row->info3); ?><br><br>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $row['link']; ?></td>
                                            <td><?= $row['position']; ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" href="<?php echo e(route("change_stutus_banner",["id" => $row->id, "status" => 2])); ?>" style="width:80%; margin:5%"><i class="fa fa-undo"></i> Khôi phục</a>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal"  style="width:80%; margin:5%"><i class="fa fa-trash"></i> Xóa vĩnh viễn</button>

                                                <div class="modal fade" id="modal" style="width: 100%;background-color: rgba(255, 255, 255, 0.8);">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thông báo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa vĩnh viễn banner này không !!!
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <div style="display: flex"></div>
                                                                <a class="btn btn-sm btn-success" href="<?php echo e(route("destroy_banner",["id"=>$row->id])); ?>">Xóa vĩnh viễn</a>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php echo e($list_banner->links()); ?>

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
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/banner/recycle_bin.blade.php ENDPATH**/ ?>