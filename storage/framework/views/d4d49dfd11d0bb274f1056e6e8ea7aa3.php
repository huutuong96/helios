

<?php $__env->startSection('css'); ?>
    
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
                    <h1>Quản lý thẻ thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li  class="breadcrumb-item">Danh sách thẻ thành viên</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách thẻ thành viên</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="<?php echo e(route("creat_membercard")); ?>">
                                        <i class="fa fa-plus"></i> Tạo mới
                                    </a>
                                    <a class="btn btn-secondary" href="<?php echo e(route("membercard_list",["act"=>"thùng rác"])); ?>">
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
                                        <th class="text-center" width="5%">#</th>
                                        <th class="text-center" width="15%">Ảnh tượng trưng</th></th>
                                        <th class="text-center" width="20%">Tên cấp bậc</th>
                                        <th class="text-center" width="20%">Mức giảm giá</th>
                                        <th class="text-center" width="20%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list_membercard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <tr>
                                            <td class="text-center"><?php echo e($row->id); ?></td>
                                            <td class="text-center">
                                                <img src="<?php echo e(asset("public/images/member_card/".$row->img)); ?>" alt="" style="width: 100%">
                                            </td>
                                            <td class="text-center"><b><?php echo e($row->rank_type); ?></b></td>
                                            <td class="text-center">
                                                <?php echo e($row->promotion); ?>% <br>trên tổng giá trị đơn hàng
                                            </td>
                                            <td class="text-center">
                                                <?php if($row->status == 1): ?> 
                                                    <a class="btn btn-sm btn-success" href="<?php echo e(route("change_stutus_membercard",["id" => $row->id])); ?>" style="width:60%; margin:5%"><i class="fa fa-toggle-on"></i> Hoạt động</a>
                                                <?php else: ?> 
                                                    <a class="btn btn-sm btn-danger" href="<?php echo e(route("change_stutus_membercard",["id" => $row->id])); ?>" style="width:60%; margin:5%"><i class="fa fa-toggle-off"></i> Ngưng hoạt động</a>
                                                <?php endif; ?> 
                                                <a class="btn btn-sm btn-info" href="<?php echo e(route("edit_membercard",["id" => $row->id])); ?>" style="width:60%; margin:5%"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                                <a class="btn btn-sm btn-danger" href="<?php echo e(route("change_stutus_membercard",["id" => $row->id, "status" => 0 ])); ?>" style="width:60%; margin:5%"><i class="fa fa-trash"></i>  xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </tbody>
                            </table>
                            <?php echo e($list_membercard->links()); ?>

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
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/member_card/list_membercard.blade.php ENDPATH**/ ?>