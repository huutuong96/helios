
<?php $__env->startSection('main'); ?>

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
                        <li class="breadcrumb-item"><a href="index.php?option=product">Danh sách sản phẩm</a></li>
                        <li class="breadcrumb-item active">cập nhật</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo e(route("edit_product")); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Cập nhật thông tin sản phẩm</h3>
                        <div class="card-tools">
                            <input type="hidden" name="id" id="" value="<?php echo e($product->id); ?>">
                            <input type="hidden" name="trending" id="" value="<?php echo e($product->trending); ?>">
                            <input type="hidden" name="view" id="" value="<?php echo e($product->view); ?>">
                            <input type="hidden" name="sold_count" id="" value="<?php echo e($product->sold_count); ?>">
                            <input type="hidden" name="slug" id="" value="<?php echo e($product->slug); ?>">
                            <input type="hidden" name="sku" id="" value="<?php echo e($product->sku); ?>">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="<?php echo e(route("product_list")); ?>">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm (*)</label>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span style="color: red; margin-left: 10px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old("name") ?? $product->name); ?>">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="material">Chất liệu:</label>
                                    <select class="select2 form-control" id="material" name="material" data-placeholder="Chọn chất liệu" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <option value="<?php echo e($product->material); ?>"><?php echo e($product->material); ?></option>
                                        <?php
                                        $materials = ALL_MATERIAL;
                                        foreach ($materials as $material) {
                                            echo "<option value=\"$material\">$material</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="size">Kích cỡ:</label>
                                    <select class="select2 form-control" id="size" name="size[]" multiple="multiple" data-placeholder="Chọn size" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <?php
                                        foreach ($sizes as $size) {
                                            echo "<option value=\"$size->id\">Số: $size->size_number</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="smdetail">Mô tả sản phẩm</label>
                                <?php $__errorArgs = ['smdetail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span style="color: red; margin-left: 10px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <textarea id="smdetail" name="smdetail" class="form-control summernote" rows="3"><?php echo e(old("name") ?? $product->name); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="detail">Chi tiết sản phẩm</label>
                                <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span style="color: red; margin-left: 10px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <textarea id="detail" name="detail" class="form-control summernote" rows="3"><?php echo e(old("name") ?? $product->name); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <?php $__currentLoopData = $list_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col">
                                            <img src="<?php echo e(asset('public/public/images/product/'.$item->image)); ?>" alt="" style="height: 200px">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category_id">Loại sản phẩm (*):</label>
                                <select id="category_id" name="category_id" class="form-control custom-select">    
                                    <?php $__currentLoopData = $categori_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($product->categori_id == $item->id): ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $categori_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Thương hiệu (*):</label>
                                <select id="brand_id" name="brand_id" class="form-control custom-select">
                                    <?php $__currentLoopData = $brand_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->brand_id == $item->id): ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $brand_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm:</label>
                                <input type="number" id="price" name="price" min="1000000"  class="form-control" step="100000" value="<?php echo e(old("name") ?? $product->price); ?>">
                            </div>
                            <div class="form-group">
                                <label for="promotion">Phần trăm khuyến mãi:</label>
                                <input type="number" id="promotion" name="promotion" min="0"  max="90" class="form-control"  value="<?php echo e(old("name") ?? $product->promotion); ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng kho: </label>
                                <input type="number" id="quantity" name="quantity" min="1"  class="form-control"  value="<?php echo e(old("name") ?? $product->quantity); ?>">
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh sản phẩm (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img[]" multiple >
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="<?php echo e($product->status); ?>" selected>[--- Trạng thái sản phẩm ---]</option>
                                    <option value="1">Còn hàng</option>
                                    <option value="2">Hết hàng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=product">
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
<script>
     $(document).ready(function() {
         $('#detail').summernote();
         $('#smdetail').summernote();
         $('.select2').select2();
    });
</script>
<script>
   
   document.addEventListener("DOMContentLoaded", function() {
      // Your jQuery code here
      $("#img").on("input", function() {
         var message = "<div class=\"alert alert-success\" role=\"alert\" style=\"position: fixed; top: 50px; right: 16px; width: auto; z-index: 9999\" id=\"myAlert\"><i class='icon fas fa-check'></i> Bạn đã chọn ảnh thành công </div>";
         $("#messenge").html(message);
         setTimeout(function() {
            $("#messenge").fadeOut(500);
         }, 3000);
      });
   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/BackEnd/pages/product/edit_product.blade.php ENDPATH**/ ?>