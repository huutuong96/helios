

<?php $__env->startSection('main'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý thương hiệu sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.php?option=category">Thương hiệu sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="<?php echo e(route("creat_brand")); ?>" method="post"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?> 
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title font-weight-bold py-2">Thêm thương hiệu sản phẩm </h3>
                            <div class="card-tools">
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="<?php echo e(route("brand_list")); ?>">
                                    <i class="fa fa-arrow-left"></i> Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="name">Tên thương hiệu (*)</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Trạng thái (*): </label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option selected  value="2">[--- Trạng thái danh mục ---]</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngưng hoạt động</option>
                                    </select>
                                </div>
                                <div class="form-group align-items-center">
                                    <label for="img">Hình ảnh sản phẩm (*):</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img" required  >
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title font-weight-bold py-2"></h3>
                            <div class="card-tools">
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="<?php echo e(route("brand_list")); ?>">
                                    <i class="fa fa-arrow-left"></i> Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
            <div id="messenge"></div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
    <?php echo $__env->make('BackEnd.models.handle_chosse_img', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/brand/creat_brand.blade.php ENDPATH**/ ?>