@extends('BackEnd.index')

@section('css')

@endsection

@section('main')
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
                                    <a class="btn btn-secondary" href="{{route("list_order")}}">
                                        <i class="fa fa-arrow-left"></i> Quay lại
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
                                        <th class="text-center" width="30%">Thông tin khách hàng</th>
                                        <th class="text-center">Thông tin đơn hàng</th>
                                        <th class="text-center">Tổng giá trị</th>
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
                                                ------------------------------------------------------------------
                                                <br>
                                                @php
                                                    $sum += $product->price_detail;
                                                @endphp
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ number_format($sum)}} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
