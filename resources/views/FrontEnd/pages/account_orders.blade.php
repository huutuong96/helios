@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')
    <!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Danh sách đơn hàng</h2>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered datatable text-left my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Ngày đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th><span class="nobr">Tổng tiền</span></th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_order as $row) 
                                                @if ($row->status != 3 && $row->status != 4)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->created_at}}</td>
                                                    <td>{{Auth::user()->address}}</td>
                                                    <td><span class="price">{{number_format($row->sumprice)}}</span></td>
                                                    <td class="text-primary">
                                                        <em>
                                                            @switch($row->status)
                                                                @case(1)
                                                                    <span style="color:blue"><b>Đặt hàng thành công</b></span>
                                                                    @break
                                                                @case(2)
                                                                    <span style="color:black"><b>Đang vận chuyển</b></span>
                                                                    @break
                                                                @case(5)
                                                                    <span style="color:rgb(61, 13, 11)"><b>Đang xử lý đơn hàng</b></span>
                                                                    @break
                                                                @default
                                                                    <span style="color:rgb(61, 13, 11)">Đang xử lý đơn hàng<b></b></span>
                                                            @endswitch
                                                        </em>
                                                    </td>
                                                    <td class="text-center last">
                                                        <div class="btn-group">
                                                            <a href="{{route("view_orders", ["id" => $row->id])}}" class="btn btn-view-order">Xem đơn hàng</a>
                                                            @if ($row->status == 5)  
                                                                <a href="{{route('destroy_order',["id" => $row->id])}}" class="btn btn-reorder">Huỷ đơn</a>
                                                            @endif 
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>Lịch sử đơn hàng</h2>
                        </div>
                        <div class="dasboard" style="margin-top: 10px;">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered text-left datatable my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Ngày đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th><span class="nobr">Tổng tiền</span></th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_order as $row)  
                                                @if ($row->status == 3 || $row->status == 4 )  
                                                    <tr>
                                                        <td>{{$row->id}}</td>
                                                        <td>{{$row->created_at}}</td>
                                                        <td>{{Auth::user()->address}}</td>
                                                        <td><span class="price">{{number_format($row->sumprice)}}</span></td>
                                                        <td class="text-primary">
                                                            <em>
                                                                @if ($row->status == 4)  
                                                                    Đã giao thành công
                                                                @elseif ($row->status == 3)  
                                                                    Đã huỷ đơn
                                                                @endif
                                                            </em>
                                                        </td>
                                                        <td class="text-center last">
                                                            <div class="btn-group">
                                                                <a href="{{route("view_orders", ["id" => $row->id])}}" class="btn btn-view-order">Xem chi tiết</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <aside class="col-right sidebar col-sm-3 col-xs-12">
                <div class="block block-account">
                    <div class="block-title">Quản lý tài khoản</div>
                    <div class="block-content">
                        <ul>
                            <li><a href="{{route("account")}}"><i class="fa fa-angle-right"></i> Tài khoản</a></li>
                            <li class="current"><a href="{{route("account_detail")}}"><i class="fa fa-angle-right"></i> Thông tin tài khoản</a></li>
                            <li><a href="{{route("account_orders")}}"><i class="fa fa-angle-right"></i> Lịch sử đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<!--End main-container -->
@endsection

@section('js')
    
@endsection