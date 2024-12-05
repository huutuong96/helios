;

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route("post_list")); ?>">Danh sách bài viết</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo e(route("creat_post")); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Thêm bài viết</h3>
                        <div class="card-tools">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="<?php echo e(route("post_list")); ?>">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="title">Tiêu đề (*)</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="detail">Nội dung Bài viết</label>
                                <textarea id="detail" name="detail" class="form-control summernote" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="topic_id">Loại Bài viết (*):</label>
                                <select id="topic_id" name="topic_id" class="form-control custom-select">
                                    <option value="<?php echo e($topic_list[0]->id); ?>">[--- Chọn loại Bài viết ---]</option>
                                    <?php $__currentLoopData = $topic_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh đại diện (*):</label>
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" id="img" name="img" required  onchange="updateFileNames()">
                                    <label class="custom-file-label" for="img" id="img-label">Chọn hình</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="2" selected>[--- Trạng thái Bài viết ---]</option>
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Không xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="THEM" class="btn btn-success">
                                <i class="fa fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-secondary" href="<?php echo e(route("post_list")); ?>">
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

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
             $('#detail').summernote();
             
        });
    </script>
   <script>
        function updateFileNames() {
            const input = document.getElementById('img');
            const label = document.querySelector('.custom-file-label');

            if (input.files && input.files.length > 0) {
                if (input.files.length === 1) {
                    // Nếu chỉ có một file được chọn, lấy tên của file đầu tiên
                    const fileName = input.files[0].name;

                    // Cập nhật label để hiển thị tên của file đã chọn
                    label.textContent = fileName;
                } else {
                    // Nếu có nhiều hình được chọn, hiển thị số lượng file đã chọn
                    label.textContent = input.files.length + ' files selected';
                }
            } else {
                // Nếu không có file nào được chọn, hiển thị lại "Choose file"
                label.textContent = "Choose file";
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/post/creat_post.blade.php ENDPATH**/ ?>