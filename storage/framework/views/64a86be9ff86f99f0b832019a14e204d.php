

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<section class="main-container">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Lấy lại mật khẩu</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-md-5 registered-users">
                    <div class="content text-center">
                        <strong>Bạn bị quên mật khẩu</strong>
                        <ul style="font-size:medium;">
                            <li>Vui lòng nhập email của bạn vào mẫu bên cạnh.</li>
                            <li>Xong đó kiểm tra email của mình.</li>
                            <li>Lấy mã trong email và nhập vào trang hỗ trợ của web nhé.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 registered-users"><strong class="text-center"></strong>
                    <div class="content">
                        <?php if(Session::get("messenges")): ?>
                            <p class=" text-muted " style="color:red;display: flex"> <strong style="width: 200px">Thông báo : </strong><?php echo e(Session::get("messenges")); ?></p>
                            <?php echo e(Session::put("messenges", null)); ?>

                        <?php else: ?> 
                            <p class="text-center">Vui lòng nhập mail của bạn vào bên dưới.</p>
                        <?php endif; ?> 
                        <form action="<?php echo e(route("new_password")); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email <span class="required">*</span></label>
                                    <?php $__errorArgs = ["email"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div style="color:red"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <br>
                                    <input type="text" title="username Address" class="input-text required-entry" id="email" name="email" value="<?php echo e(old("email" ?? "")); ?>">
                                </li>
                            </ul>
                            <div class="buttons-set">
                                <button id="send2" name="LOGIN" type="submit" class="button login"><span>Đăng nhập</span></button>
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
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/FrontEnd/pages/input_email.blade.php ENDPATH**/ ?>