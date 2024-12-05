

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li><a href="index.html" title="Go to Home Page">Trang chủ</a><span>/</span></li>
            <li><strong>Bài viết</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="blog_post">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-9" id="center_column">
          <div class="center_column">
            <div class="page-title">
              <h2>Danh sách bài viết</h2>
            </div>
            <ul class="blog-posts">
                <?php if($blog_list->isEmpty()): ?>
                <span style="font-size: 20px; color: red; padding: 248px; height: auto;" >KHÔNG CÓ BÀI VIẾT NÀO</span>
                <?php else: ?>
                    <?php $__currentLoopData = $blog_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <li class="post-item">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="entry-thumb">
                                            <a href="<?php echo e(route("blog_detail", [ "id" => $item->id])); ?>">
                                                <figure><img src="<?php echo e(asset("/")); ?>public/public/images/post/<?php echo e($item->img); ?>" alt="Blog"></figure>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <h3 class="entry-title"><a href="<?php echo e(route("blog_detail", [ "id" => $item->id])); ?>"><?php echo e($item->title); ?></a></h3>
                                        <div class="entry-meta-data">
                                            <span class="author">
                                                <i class="fa fa-user"></i>&nbsp; by: <a href="#">Admin</a>
                                            </span>
                                            <span class="comment-count">
                                                <i class="fa fa-comment"></i>&nbsp; 3
                                            </span>
                                            <span class="date">
                                                <i class="fa fa-calendar"></i>&nbsp; 2018-08-05
                                            </span>
                                        </div>
                                        <div class="entry-excerpt">
                                            <?php
                                                $blog_content = $item->detail;
                                                $plainTextContent = strip_tags($blog_content);
                
                                                // Lấy 445 ký tự đầu tiên
                                                $first100Characters = substr($plainTextContent, 0, 445);
                                            ?>
                                            <?php echo e($first100Characters); ?>  ......
                                        </div>
                                        <a href="<?php echo e(route("blog_detail", [ "id" => $item->id])); ?>" class="read-more">Xem thêm&nbsp; <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                
            </ul>

            <?php echo e($blog_list->links()); ?>

          </div>
        </div>
        
        <!-- Right colunm -->
        <aside class="sidebar col-xs-12 col-sm-3">
          <div class="search">
            <form action="<?php echo e(route("search")); ?>" method="get">
                <input type="hidden" name="act" id="" value="blog">
                <input class="form-control" name="keyword" type="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- Blog category -->
          <div class="block blog-module">
            <div class="block-title">
              <h3>Blog Categories</h3>
            </div>
            <div class="block_content">
              <div class="layered layered-category">
                <div class="layered-content">
                  <ul class="tree-menu">
                    <li><a href="<?php echo e(route("blog")); ?>"><i class="fa fa-angle-right"></i>&nbsp; Tất cả bài viết</a></li>
                    <?php $__currentLoopData = $topic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route("blog", ["topic_id"=> $item->id])); ?>"><i class="fa fa-angle-right"></i>&nbsp; <?php echo e($item->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <!-- ./right colunm --> 
      </div>
      <!-- ./row--> 
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FrontEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/wqyksacj/public_html/helios.nguyenhuutuong.top/resources/views/FrontEnd/pages/blog.blade.php ENDPATH**/ ?>