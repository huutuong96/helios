

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
                <form action="<?php echo e(route("edit_user")); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?> 
                    <div class="col-main">
                        <div class="my-account">
                            <div class="page-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Cập nhật thông tin tài khoản</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-xs-12">
                                    <img name="current_img" class="img img-fluid img-circle" style="margin-top: 20px;margin-left:40px" height="250px" width="250px" src="<?php echo e(asset("public/images/user/".(Auth::user()->img ?? user.jpg))); ?>

                                    ">
                                    <input type="file" name="img" class="form-control" style="width:250px; margin-top: 15px;margin-left:35px">
                                </div>
                                <div class="col-sm-12 col-md-7 col-xs-12">
                                    <div class="title-box">
                                        <h3>Thông tin tài khoản</h3>
                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Tên tài khoản <span class="required">*</span></label>
                                        <input type="text" name="username" id="username" class="form-control" value="<?php echo e(Auth::user()->username); ?>" required>
                                        <span class="error-message" id="username-error">
                                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Họ tên <span class="required">*</span></label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo e(Auth::user()->fullname); ?>" required>
                                        <span class="error-message" id="fullname-error">
                                            <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Địa chỉ email <span class="required">*</span></label>
                                        <input type="email" name="email" id="emailAddress" class="form-control" value="<?php echo e(Auth::user()->email); ?>" readonly>
                                        <span class="error-message" id="email-error">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Địa chỉ: <span class="required">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" value="<?php echo e(Auth::user()->address); ?>" required>
                                        <span class="error-message" id="phone-error">
                                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Số điện thoại: <span class="required">*</span></label>
                                        <input type="phone" name="phone" id="phone" class="form-control" value="<?php echo e(Auth::user()->phone); ?>" required>
                                        <span class="error-message" id="phone-error">
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="gender" class="control-label col-sm-2" style="font-size:14px;padding:11px 0px;text-align:left">Giới tính <span class="required">*</span></label>
                                        <div class="col-sm-10 radio">
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="1" <?php echo e(Auth::user()->gender == 1 ? "checked" : ""); ?> >
                                                Nam
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="0" <?php echo e(Auth::user()->gender == 0 ? "checked" : ""); ?>>
                                                Nữ
                                            </label>
                                        </div>
                                        <span class="error-message" id="phone-error">
                                            <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="ship-toggle">
                                        <input type="checkbox" id="ship-toggle" name="change_password">
                                        <label for="ship-toggle">Thay đổi mật khẩu?</label>
                                    </div>
                                    <div class="ship-acc-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="form-group">
                                                    <label for="cpassword">Mật khẩu hiện tại <span class="required">*</span></label>
                                                    <input type="password" name="cpassword" id="cpassword" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="npassword">Mật khẩu mới <span class="required">*</span></label>
                                                    <input type="password" name="password" id="npassword" class="form-control">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label for="cnewpassword">Xác nhận mật khẩu mới <span class="required">*</span></label>
                                                    <input type="password" name="password_confirmation" id="cnewpassword" class="form-control">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <button id="send2" name="BTN_UPDATE" type="submit" class="button submit"><span>Cập nhật</span></button>
                                <span class="required pull-right"><b>*</b> Thông tin bắt buộc</span>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <aside class="col-right sidebar col-sm-3 col-xs-12">
                <div class="block block-account">
                    <div class="block-title">Quản lý tài khoản</div>
                    <div class="block-content">
                        <ul>
                            <li><a href="<?php echo e(route("account")); ?>"><i class="fa fa-angle-right"></i> Tài khoản</a></li>
                            <li class="current"><a href="<?php echo e(route("account_detail")); ?>"><i class="fa fa-angle-right"></i> Thông tin tài khoản</a></li>
                            <li><a href="<?php echo e(route("account_orders")); ?>"><i class="fa fa-angle-right"></i> Lịch sử đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<!--End main-container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/FrontEnd/pages/account_detail.blade.php ENDPATH**/ ?>