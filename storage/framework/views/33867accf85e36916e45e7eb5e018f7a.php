

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
                    <h1>Quản lý menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tất cả menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- /.content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title font-weight-bold py-2">Quản lý menu</h3>
                    <div class="card-tools">
                        <a class="btn btn-secondary" href="<?php echo e(route("dashboard")); ?>">
                            <i class="fa fa-arrow-left"></i> Quay lại 
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route("creat_menu")); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-secondary">
                                <!-- Loại sản phẩm -->
                                <div class="card-header">
                                    <h3 class="card-title">Vị trí menu</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-control custom-select" id="position" name="position" data-placeholder="Chọn vị trí menu" style="width: 100%;">
                                            <option value="headermenu">Menu Header</option>
                                            <option value="megamenu">Megamenu</option>
                                            <option value="footermenu">Menu Footer</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card card-secondary">
                                <!-- Loại sản phẩm -->
                                <div class="card-header">
                                    <h3 class="card-title">Loại sản phẩm</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="height: 300px; overflow-y: scroll;">
                                    <?php foreach ($category as $rcat) : ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" name="itemcat[]" type="checkbox" id="itemcategory-<?= $rcat['slug'] ?>" value="<?= $rcat['id'] ?>">
                                                <label for="itemcategory-<?= $rcat['slug'] ?>" class="custom-control-label"><?= $rcat['name'] ?></label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success form-control" name="ADD_CATEGORY">Thêm danh mục</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            
                            <div class="card card-secondary">
                                <!-- Chủ đề -->
                                <div class="card-header">
                                    <h3 class="card-title">Chủ đề</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="height: 300px; overflow-y: scroll;">
                                    <?php foreach ($topic as $rtopic) : ?>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" name="itemtopic[]" type="checkbox" id="itemtopic-<?= $rtopic['slug'] ?>" value="<?= $rtopic['id'] ?>">
                                                <label for="itemtopic-<?= $rtopic['slug'] ?>" class="custom-control-label"><?= $rtopic['name'] ?></label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success form-control" name="ADD_TOPIC">Thêm chủ đề</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            
                        </div>
                        <div class="col-md-9">
                            
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Header menu (*)</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="20px">#</th>
                                                <th class="text-center">Thông tin menu</th>
                                                <th class="text-center">Vị trí</th>
                                                <th class="text-center" width="100px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($menu["header_menu"] as $item) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $item['id']; ?></td>
                                                    <td>
                                                        <?= $item['name']; ?> <br>
                                                        <?= $item['link']; ?>
                                                    </td>
                                                    <td class="text-center"><?= $item['position']; ?></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-danger" href="index.php?option=menu&act=deltrash&id=<?= $item['id']; ?>"><i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->  

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Manga menu (*)</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="20px">#</th>
                                                <th class="text-center">Thông tin menu</th>
                                                <th class="text-center">Vị trí</th>
                                                <th class="text-center" width="100px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($menu["mega_menu"] as $item) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $item['id']; ?></td>
                                                    <td>
                                                        <?= $item['name']; ?> <br>
                                                        <?= $item['link']; ?>
                                                    </td>
                                                    <td class="text-center"><?= $item['position']; ?></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-danger" href="index.php?option=menu&act=deltrash&id=<?= $item['id']; ?>"><i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->  

                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Footer menu (*)</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="20px">#</th>
                                                <th class="text-center">Thông tin menu</th>
                                                <th class="text-center">Vị trí</th>
                                                <th class="text-center" width="100px">Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($menu["footer_menu"] as $item) : ?>
                                                <tr>
                                                    <td class="text-center"><?= $item['id']; ?></td>
                                                    <td>
                                                        <?= $item['name']; ?> <br>
                                                        <?= $item['link']; ?>
                                                    </td>
                                                    <td class="text-center"><?= $item['position']; ?></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-danger" href="<?php echo e(route("destroy_menu")); ?>"><i class="fa fa-trash"></i></a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->  
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/menu/show.blade.php ENDPATH**/ ?>