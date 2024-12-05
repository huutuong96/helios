

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
                    <h1>Quản lý Chủ đề</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách chủ đề</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách Chủ đề</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="<?php echo e(route("creat_topic")); ?>">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                    <a class="btn btn-secondary" href="<?php echo e(route("topic_list",["act"=>"thung rac"])); ?>">
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
                                        <th class="text-center" width="5%">ID</th>
                                        <th class="text-center" width="35%">Thông tin Chủ đề</th>
                                        <th class="text-center" width="20%">Cấp cha</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list_topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <tr>
                                            <td class="text-center"><?php echo e($row->id); ?></td>
                                            <td class="text-left" style="padding-left:5% ">
                                             <b>Name:</b> <?php echo e($row->name); ?><br>
                                             <b>Slug:</b> <?php echo e($row->slug); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php if($row['parent_id'] == 0): ?> 
                                                    Không có cấp cha
                                                <?php else: ?> 
                                                    <?php $__currentLoopData = $list_topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                        <?php if($parent_topic->id == $row->parent_id): ?> 
                                                            <b>Cấp cha:</b> <?php echo e($parent_topic->name); ?>

                                                        <?php endif; ?> 
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                <?php endif; ?> 
                                            </td>
                                            <td class="text-center">
                                                <?php if($row['status'] == 1): ?>
                                                <a class="btn btn-sm btn-success" href="<?php echo e(route("change_stutus_topic",["id"=>$row['id']])); ?>"><i class="fa fa-toggle-on"></i> Hoạt động</a>
                                            <?php else: ?>
                                                <a class="btn btn-sm btn-danger" href="<?php echo e(route("change_stutus_topic",["id"=>$row['id']])); ?>"><i class="fa fa-toggle-off"></i> Tạm ngưng</a>
                                            <?php endif; ?>
                                            <a class="btn btn-sm btn-info mx-3" href="<?php echo e(route("edit_topic",["id"=>$row['id']])); ?>"><i class="fa fa-edit"></i> Cập nhật</a>
                                            <a class="btn btn-sm btn-danger" href="<?php echo e(route("change_stutus_topic",["id"=>$row['id'], "status"=>0])); ?>"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($list_topic->links()); ?>

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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/topic/topic_list.blade.php ENDPATH**/ ?>