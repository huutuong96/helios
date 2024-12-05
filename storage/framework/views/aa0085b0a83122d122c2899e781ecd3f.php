

<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<?php if(Session::has('messenge') && is_array(Session::get('messenge'))): ?>
    <?php
        $messenge = Session::get('messenge');
    ?>
    <?php if(isset($messenge['style']) && isset($messenge['msg'])): ?>
        <div class="alert alert-<?php echo e($messenge['style']); ?>" role="alert" style="position: fixed; top: 50px; right: 16px; width: auto; z-index: 9999" id="myAlert">
            <i class="icon fas fa-check"></i><?php echo e($messenge['msg']); ?>

        </div>
        <?php
            Session::forget('messenge');
        ?>
    <?php endif; ?>
<?php endif; ?>
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý liên hệ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title font-weight-bold py-2">Danh sách liên hệ</h3>
                                <div class="card-tools">
                                    <a class="btn btn-warning" href="<?php echo e(route("list_order", ["act"=>"file lưu trữ"])); ?>">
                                        <i class="fa fa-file"></i> File lưu trữ
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">ID</th>
                                        <th class="text-center" width="28%">Thông tin khách hàng</th>
                                        <th class="text-center">Thông tin đơn hàng</th>
                                        <th class="text-center">Tổng giá trị</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center" width="150px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $list_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><?php echo e($row->id); ?></td>

                                            <td class="text-left">
                                                <b>+ Họ và tên:</b> <?php echo e($row->user->fullname); ?>

                                                <br>
                                                <b>+ Số điện thoại:</b> <?php echo e($row->user->phone); ?>

                                                <br>
                                                <b>+ Thành viên thẻ:</b>
                                                <?php $__currentLoopData = $member_card; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($card->id == $row->user->rank_id): ?>
                                                         <?php echo e($card->rank_type); ?> <img src="<?php echo e(asset("images/member_card/".$card->img)); ?>" style="height:50px; margin-left:20px" height= "50px" alt="">
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="text-left">
                                                <?php
                                                    $sum = 0
                                                ?>
                                                <?php $__currentLoopData = $row->list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <b>sản phẩm <?php echo e(++$key); ?></b>
                                                <br>
                                                <b>+</b> <?php echo e($product->name); ?> 
                                                <br>----   <?php echo e(number_format($product->price_detail)); ?> VND   ----
                                                <br>
                                                <?php
                                                    $sum += $product->price_detail;
                                                ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="text-center"><?php echo e(number_format($sum)); ?> VND</td>
                                            <td class="text-center">
                                                <?php switch($row->status):
                                                    case (1): ?>
                                                        <span style="color:blue"><b>Đặt hàng thành công</b></span>
                                                        <?php break; ?>
                                                    <?php case (2): ?>
                                                        <span style="color:black"><b>Đang vận chuyển</b></span>
                                                        <?php break; ?>
                                                    <?php case (3): ?>
                                                        <span style="color:red"><b>Bị hủy đơn</b></span>
                                                        <?php break; ?>
                                                    <?php case (4): ?>
                                                        <span style="color:rgb(0, 238, 0)"><b>Đã tới tay khách hàng</b></span>
                                                        <?php break; ?>
                                                    <?php case (5): ?>
                                                        <span style="color:rgb(61, 13, 11)"><b>Đang xử lý đơn hàng</b></span>
                                                        <?php break; ?>
                                                    <?php default: ?>
                                                        <span style="color:rgb(61, 13, 11)">Đang xử lý đơn hàng<b></b></span>
                                                <?php endswitch; ?>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal" href="#" style="width:80%; margin:2%"><i class="fa fa-edit"></i> Cập nhật</button>
                                                <?php if($row->status == 5): ?>
                                                
                                                    <a class="btn btn-sm btn-danger" href="" style="width:80%; margin:2%"><i class="fa fa-trash"></i> Hủy đơn</a>
                                                <?php endif; ?>
                                                

                                                <div class="modal fade" id="modal" style="width: 100%;">
                                                    <div class="modal-dialog" >
                                                        <div class="modal-content" style="margin:35% 0 0 20%; width: 628px;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul style="display: flex; list-style: none; ">
                                                                    <li><a class="btn btn-sm " href="<?php echo e(route("change_stutus_order",["id"=>$row->id, "status" => 1])); ?>" style="border: 1px solid ;color:blue">Đặt hàng thành công</a></li>
                                                                    <li class="mx-2"><a class="btn btn-sm " href="<?php echo e(route("change_stutus_order",["id"=>$row->id, "status" => 2])); ?>" style="border: 1px solid ;color:#857979">Đang vận chuyển</a></li>
                                                                    <li><a class="btn btn-sm " href="<?php echo e(route("change_stutus_order",["id"=>$row->id, "status" => 4])); ?>" style="border: 1px solid ;color:rgb(0, 255, 42)">Đã tới tay khách hàng</a></li>
                                                                    <li class="mx-2"><a class="btn btn-sm " href="<?php echo e(route("change_stutus_order",["id"=>$row->id, "status" => 3])); ?>" style="border: 1px solid ;color:red">Bị hủy đơn</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <div style="display: flex"></div>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                           <?php echo e($list_order->links()); ?>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
<script>
    $(document).ready(function() {
        // Ẩn alert sau 3 giây
        setTimeout(function() {
            $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
        },3000);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('BackEnd.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\du_an\laravel_web\php_3\asm\example-app\resources\views/BackEnd/pages/order/list_order.blade.php ENDPATH**/ ?>