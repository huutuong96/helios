

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>My Account</h2>
                </div>
                <div class="my-account-page">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">
                                    <div class="col-md-5">
                                        <div class="text-center">
                                            <img class="img img-fluid img-circle" style="margin-top: 15px;" height="250px" width="250px" src="<?php echo e(asset("public/images/user/".(Auth::user()->img ?? user.jpg))); ?>">
                                            <div>
                                                <h3><?php echo e(Auth::user()->username); ?></h3>
                                            </div>
                                            <div class="service-desc text-center" style="margin: 15px 0 0 30px;display:flex;width:100%">
                                                <h4 style="margin-top: 30px; ">Cấp thành viên:</h4>
                                                <img class="img-responsive" style="margin-top: -10px;width:50%;height:50%" src="<?php echo e(asset("public/images/member_card/".$member_rank->img)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Họ tên:</strong><?php echo e(auth::user()->fullname); ?>

                                            </div>
                                        </div>
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Email:</strong><?php echo e(auth::user()->email); ?>

                                            </div>
                                        </div>
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Địa chỉ:</strong><?php echo e(auth::user()->address); ?>

                                            </div>
                                        </div>
                                        <div class="service-box">
                                            <div class="service-desc">
                                                <strong>Số điện thoại:</strong><?php echo e(auth::user()->phone); ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="border: unset">
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="<?php echo e(route("account_orders")); ?>">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-gift"></i> </div>
                                            <div class="service-desc">
                                                <h4>Lịch sử đơn hàng</h4>
                                                <p>Quản lý đơn hàng của bạn</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="<?php echo e(route("account_detail")); ?>">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-user"></i> </div>
                                            <div class="service-desc">
                                                <h4>Cập nhật thông tin</h4>
                                                <p>Quản lý thông tin của bạn</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="<?php echo e(route("wishlist")); ?>">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-heart"></i> </div>
                                            <div class="service-desc">
                                                <h4>Danh sách yêu thích</h4>
                                                <p>Quản lý danh sách yêu thích của bạn</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php if(auth::user()->role !== 'customer'): ?> 
                            <div class="col-sm-12 col-md-12 col-xs-12">
                                <a href="<?php echo e(route("dashboard")); ?>">
                                    <div class="account-box">
                                        <div class="service-box">
                                            <div class="service-icon"> <i class="fa fa-lock"></i> </div>
                                            <div class="service-desc">
                                                <h4>Trang quản lý</h4>
                                                <p>Đi tới trang quản lý</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/FrontEnd/pages/account.blade.php ENDPATH**/ ?>