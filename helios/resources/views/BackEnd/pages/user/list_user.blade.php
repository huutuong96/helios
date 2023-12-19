@extends('BackEnd.index')

@section('css')
    <style>
        b{
            margin-right: 10px
        }
    </style>
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
                    <h1>Quản lý {{$role}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang quản lý</a></li>
                        <li class="breadcrumb-item active">Danh sách {{$role}}</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách {{$role}}</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route("creat_user",["role"=>$role])}}">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                    <a class="btn btn-secondary" href="{{route("user_list",["act"=>"thùng rác", "role" => ($role == "khách hàng" ? "user" : "")])}}">
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
                                        <th class="text-center" width="13%">Ảnh đại diện</th>
                                        <th class="text-center">Thông tin chung</th>
                                        <th class="text-center" width="30%">Thông tin chi tiết</th>
                                        <th class="text-center" width="20%">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_user as $row) 
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>
                                            <td>
                                                <img src="{{asset("public/images/user/". $row->img)}}" style="width: 100%;" class="img img-fuild img-thumbnail">
                                            </td>
                                            <td>
                                                <b>+ Tên tài khoản:</b> {{$row->username}}
                                                <br>
                                                <b>+ Loại tài khoản:</b> {{$row->role == "admin" ? "admin" : "khách hàng" }}
                                                <br>
                                                <b>+ Thành viên thẻ:</b> {{$row->phone}} 
                                               
                                            </td>
                                            <td><b>+ Họ tên:</b> {{$row->fullname}}
                                                <br>
                                                <b>+ Email:</b> {{$row->email}}
                                                <br>
                                                <b>+ Điện thoại:</b> {{$row->phone}}
                                                <br>
                                                <b>+ Giới tính:</b> {{ $row->gender == 1 ? 'Nam' : 'Nữ' }}
                                            </td>
                                            <td>
                                                @if ($row['status'] == 1) 
                                                    <a class="btn btn-sm btn-success" href="{{route("change_stutus_user",["id" => $row->id])}}" style="width:80%; margin:5%"><i class="fa fa-toggle-on"></i> Hoạt động</a>
                                                @else 
                                                    <a class="btn btn-sm btn-danger" href="{{route("change_stutus_user",["id" => $row->id])}}" style="width:80%; margin:5%"><i class="fa fa-toggle-off"></i> Ngưng hoạt động</a>
                                                @endif 
                                                <a class="btn btn-sm btn-danger" href="{{route("change_stutus_user",["id" => $row->id, "status" => 0])}}" style="width:80%; margin:5%"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>

                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            {{$list_user->links()}}
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