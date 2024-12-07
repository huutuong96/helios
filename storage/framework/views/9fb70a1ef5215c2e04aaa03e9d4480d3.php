<ul class="links pull-left">
    <li><a title="Trang chủ" href="<?php echo e(route("index")); ?>">Trang chủ</a></li>
    <li><a title="Sản phẩm" href="<?php echo e(route("shop")); ?>">Sản phẩm</a></li>
    <li><a title="Về chúng tôi" href="<?php echo e(route("wishlist")); ?>">DS yêu thích</a></li>
    <li><a title="Liên hệ" href="<?php echo e(route("contact")); ?>">Liên hệ</a></li>
</ul>
<ul class="links pull-right">
    <?php if(Auth::check()): ?>
        <li><a title="Tài khoản" href="<?php echo e(route("account")); ?>">Xin chào, <?php echo e(Auth::user()->username); ?></a></li>
        <li><a title="Đăng xuất" href="<?php echo e(route("logout")); ?>">Đăng xuất</a></li>
    <?php else: ?>
        <li><a title="Đăng nhập" href="<?php echo e(route("login")); ?>">Đăng nhập</a></li>
        <li><a title="Đăng ký" href="<?php echo e(route("register")); ?>">Đăng ký</a></li>
    <?php endif; ?>
</ul><?php /**PATH E:\laragon\www\web_full\helios.nguyenhuutuong.top\resources\views/FrontEnd/models/top_menu.blade.php ENDPATH**/ ?>