

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="blog_post">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="entry-detail">
                    <div class="entry-meta-data">

                        <div class="blog-top-desc">
                            <h1><?php echo e($blog->title); ?></h1>
                        </div>

                    </div>
                    <div class="entry-photo">
                        <figure><img src="<?php echo e(asset("public/public/images/post/".$blog->img)); ?>"></figure>
                    </div>
                    <div class="content-text clearfix">
                        <?php
                            echo $blog->detail;
                        ?>
                    </div>
                </div>

                <!-- Comment -->
                <div class="single-box">
                    <div class="best-title text-left">
                        <h2>Bình luận</h2>
                    </div> 
                    <div class="comment-list">
                        <ul class="comments-list">
                            <?php if($comments->isEmpty()): ?>
                                Chưa có bình luận nào cho bài viết này
                            <?php else: ?> 
                               <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li class="comment" style="display: flex; margin: 5px">
                                     <div class="user-img"><img src="<?php echo e(asset("images/user/".$comment->user_img ??user.jpg)); ?>" alt="" style="height: 60px; width: 60px;; border-radius: 100%"><br></div>
                                     <div class="comment-content" style="margin: 5px 20px">
                                       <b><?php echo e($comment->user_name); ?></b><br>
                                       <span><?php echo e($comment->detail); ?></span>
                                     </div>
                                   </li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                         </ul>
                    </div>
                </div>
                <form action="<?php echo e(route("create_post_comment")); ?>" method="post" >
                    <?php echo csrf_field(); ?> 
                    <div class="single-box comment-box">
                        <div class="best-title text-left">
                            <h2>Để lại bình luận của bạn</h2>
                        </div>
                        <div class="coment-form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="fullname">Họ tên:</label>
                                    <input id="fullname" name="fullname" type="text" value="<?php echo e(Auth::user()->fullname ?? ""); ?> " class="form-control">
                                    <input type="hidden" name="post_id" value="<?php echo e($blog->id); ?> ">
                                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id ?? ""); ?>  ">
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Email:</label>
                                    <input id="email" name="email" type="text" class="form-control" value="<?php echo e(Auth::user()->email ?? ""); ?> ">
                                </div>
                                <div class="col-sm-12">
                                    <label for="detail">Nội dung:</label>
                                    <textarea name="detail" id="detail" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                            <button class="button" type="submit"><span>Gửi bình luận</span></button>
                        </div>
                    </div>
                </form>
                <!-- ./Comment -->
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/FrontEnd/pages/blog_detail.blade.php ENDPATH**/ ?>