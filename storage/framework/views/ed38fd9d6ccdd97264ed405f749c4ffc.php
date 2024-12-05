

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<section class="main-container">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Đăng nhập hoặc tạo tài khoản mới</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-md-5 registered-users">
                    <div class="content text-center">
                        <strong>Bạn chưa có tài khoản</strong>
                        <ul style="font-size:medium;">
                            <li>Nhận quyền truy cập vào các giao dịch và sự kiện.</li>
                            <li>Lưu các mục yêu thích vào danh sách yêu thích của bạn.</li>
                            <li>Lưu các đơn đặt hàng và số theo dõi đơn hàng của bạn.</li>
                        </ul>
                        <div class="buttons-set">
                            <a href="<?php echo e(route("register")); ?>"><button class="button create-account" type="button"><span>Đăng ký tài khoản ngay</span></button></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 registered-users"><strong class="text-center">Đăng nhập</strong>
                    <div class="content">
                        <?php if(Session::get("messenges")): ?>
                            <p class=" text-muted " style="color:red;display: flex"> <strong style="width: 200px">Thông báo : </strong><?php echo e(Session::get("messenges")); ?></p>
                            <?php echo e(Session::put("messenges", null)); ?>

                        <?php else: ?> 
                            <p class="text-center">Chào mừng bạn quay trở lại với chúng tôi.</p>
                        <?php endif; ?> 
                        <form action="<?php echo e(route("login")); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <ul class="form-list">
                                <li>
                                    <label for="username">Tên tài khoản <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="username Address" class="input-text required-entry" id="username" name="username" value="<?php echo e(old("username" ?? "")); ?>">
                                </li>
                                <li>
                                    <label for="password">Mật khẩu <span class="required">*</span></label>
                                    <br>
                                    <input type="password" title="password" id="password" class="input-text required-entry validate-password" name="password" >
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="send2" name="LOGIN" type="submit" class="button login"><span>Đăng nhập</span></button>
                                <a class="forgot-word" href="<?php echo e(route('input_email')); ?>">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/FrontEnd/pages/login.blade.php ENDPATH**/ ?>