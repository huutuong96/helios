@extends('BackEnd.index')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous">
@endsection

@section('main')
@if(Session::has('messenge') && is_array(Session::get('messenge')))
    @php
        $messenge = Session::get('messenge');
    @endphp
    @if(isset($messenge['style']) && isset($messenge['msg']))
        <div class="alert alert-{{ $messenge['style'] }}" role="alert" style="position: fixed; top: 50px; right: 16px; width: auto; z-index: 9999" id="myAlert">
            <i class="icon fas fa-check"></i>{{ $messenge['msg'] }}
        </div>
        @php
            Session::forget('messenge');
        @endphp
    @endif
@endif
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
                                    <a class="btn btn-warning" href="{{route("list_order", ["act"=>"file lưu trữ"])}}">
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
                                    @foreach ($list_order as $row)
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>

                                            <td class="text-left">
                                                <b>+ Họ và tên:</b> {{$row->user->fullname}}
                                                <br>
                                                <b>+ Số điện thoại:</b> {{$row->user->phone}}
                                                <br>
                                                <b>+ Thành viên thẻ:</b>
                                                @foreach ($member_card as $card)
                                                    @if ($card->id == $row->user->rank_id)
                                                         {{$card->rank_type}} <img src="{{asset("images/member_card/".$card->img)}}" style="height:50px; margin-left:20px" height= "50px" alt="">
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-left">
                                                @php
                                                    $sum = 0
                                                @endphp
                                                @foreach ($row->list_product as $key => $product)
                                                <b>sản phẩm {{++$key}}</b>
                                                <br>
                                                <b>+</b> {{$product->name}} 
                                                <br>----   {{ number_format($product->price_detail)}} VND   ----
                                                <br>
                                                @php
                                                    $sum += $product->price_detail;
                                                @endphp
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ number_format($sum)}} VND</td>
                                            <td class="text-center">
                                                @switch($row->status)
                                                    @case(1)
                                                        <span style="color:blue"><b>Đặt hàng thành công</b></span>
                                                        @break
                                                    @case(2)
                                                        <span style="color:black"><b>Đang vận chuyển</b></span>
                                                        @break
                                                    @case(3)
                                                        <span style="color:red"><b>Bị hủy đơn</b></span>
                                                        @break
                                                    @case(4)
                                                        <span style="color:rgb(0, 238, 0)"><b>Đã tới tay khách hàng</b></span>
                                                        @break
                                                    @case(5)
                                                        <span style="color:rgb(61, 13, 11)"><b>Đang xử lý đơn hàng</b></span>
                                                        @break
                                                    @default
                                                        <span style="color:rgb(61, 13, 11)">Đang xử lý đơn hàng<b></b></span>
                                                @endswitch
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modal" href="#" style="width:80%; margin:2%"><i class="fa fa-edit"></i> Cập nhật</button>
                                                @if($row->status == 5)
                                                {{--  hủy đơn --}}
                                                    <a class="btn btn-sm btn-danger" href="" style="width:80%; margin:2%"><i class="fa fa-trash"></i> Hủy đơn</a>
                                                @endif
                                                {{-- @if($row->status == 4)
                                                    <a class="btn btn-sm btn-warning" href="{{route("change_stutus_order",["id"=>$row->id, "status" => 4])}}" style="width:80%; margin:2%"><i class="fa fa-trash"></i> Lưu giữ</a>
                                                @endif --}}

                                                <div class="modal fade" id="modal" style="width: 100%;">
                                                    <div class="modal-dialog" >
                                                        <div class="modal-content" style="margin:35% 0 0 20%; width: 628px;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">CẬP NHẬT TRẠNG THÁI ĐƠN HÀNG</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <ul style="display: flex; list-style: none; ">
                                                                    <li><a class="btn btn-sm " href="{{route("change_stutus_order",["id"=>$row->id, "status" => 1])}}" style="border: 1px solid ;color:blue">Đặt hàng thành công</a></li>
                                                                    <li class="mx-2"><a class="btn btn-sm " href="{{route("change_stutus_order",["id"=>$row->id, "status" => 2])}}" style="border: 1px solid ;color:#857979">Đang vận chuyển</a></li>
                                                                    <li><a class="btn btn-sm " href="{{route("change_stutus_order",["id"=>$row->id, "status" => 4])}}" style="border: 1px solid ;color:rgb(0, 255, 42)">Đã tới tay khách hàng</a></li>
                                                                    <li class="mx-2"><a class="btn btn-sm " href="{{route("change_stutus_order",["id"=>$row->id, "status" => 3])}}" style="border: 1px solid ;color:red">Bị hủy đơn</a></li>
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
                                    @endforeach
                                </tbody>
                            </table>
                           {{ $list_order->links()}}
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
@endsection

@section('script')
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
@endsection