<div class="container jtv-brand-logo-block">
      <div class="jtv-brand-logo">
          <div class="slider-items-products">
              <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col6">
                    <?php $__currentLoopData = $list_brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item"><a href="#"><img src="<?php echo e(asset("/")); ?>public/public/images/brand/<?php echo e($item->img); ?>" alt="Brand Logo"></a> </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              </div>
          </div>
      </div>
  </div><?php /**PATH E:\laragon\www\web_full\helios.nguyenhuutuong.top\resources\views/FrontEnd/models/brand_logo.blade.php ENDPATH**/ ?>