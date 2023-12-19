@extends('BackEnd.index')

@section('css')
    
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
                    <h1>Quản lý thẻ thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li  class="breadcrumb-item">Danh sách thẻ thành viên</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách thẻ thành viên</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route("creat_membercard")}}">
                                        <i class="fa fa-plus"></i> Tạo mới
                                    </a>
                                    <a class="btn btn-secondary" href="{{route("membercard_list",["act"=>"thùng rác"])}}">
                                        <i class="fa fa-trash"></i> Thùng rác
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">#</th>
                                        <th class="text-center" width="15%">Ảnh tượng trưng</th></th>
                                        <th class="text-center" width="20%">Tên cấp bậc</th>
                                        <th class="text-center" width="20%">Mức giảm giá</th>
                                        <th class="text-center" width="20%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_membercard as $row) 
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>
                                            <td class="text-center">
                                                <img src="{{asset("public/images/member_card/".$row->img)}}" alt="" style="width: 100%">
                                            </td>
                                            <td class="text-center"><b>{{$row->rank_type}}</b></td>
                                            <td class="text-center">
                                                {{$row->promotion}}% <br>trên tổng giá trị đơn hàng
                                            </td>
                                            <td class="text-center">
                                                @if ($row->status == 1) 
                                                    <a class="btn btn-sm btn-success" href="{{route("change_stutus_membercard",["id" => $row->id])}}" style="width:60%; margin:5%"><i class="fa fa-toggle-on"></i> Hoạt động</a>
                                                @else 
                                                    <a class="btn btn-sm btn-danger" href="{{route("change_stutus_membercard",["id" => $row->id])}}" style="width:60%; margin:5%"><i class="fa fa-toggle-off"></i> Ngưng hoạt động</a>
                                                @endif 
                                                <a class="btn btn-sm btn-info" href="{{route("edit_membercard",["id" => $row->id])}}" style="width:60%; margin:5%"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                                <a class="btn btn-sm btn-danger" href="{{route("change_stutus_membercard",["id" => $row->id, "status" => 0 ])}}" style="width:60%; margin:5%"><i class="fa fa-trash"></i>  xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            {{$list_membercard->links()}}
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
<script>
    $(document).ready(function() {
        // Ẩn alert sau 3 giây
        setTimeout(function() {
            $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
        },3000);
    });
 </script> 
@endsection