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
                    <h1>Quản lý danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=category">danh mục</a></li>
                        <li class="breadcrumb-item active">Thùng rác danh mục</li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý thùng rác danh mục</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="{{route("membercard_list")}}">
                                        <i class="fa fa-arrow-left"></i> Thoát
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped table-compact table-hover">
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
                                                <a class="btn btn-sm btn-info" href="{{route("change_stutus_membercard",["id" => $row->id])}}" style="width:60%; margin:5%"><i class="fa fa-undo"></i> Khôi phục</a>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal" style="width:60%; margin:5%"><i class="fa fa-trash"></i> Xóa vĩnh viễn</button>

                                                <div class="modal fade" id="modal" style="width: 100%;background-color: rgba(255, 255, 255, 0.8);">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thông báo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa vĩnh viễn thẻ thành viên này không !!!
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <div style="display: flex"></div>
                                                                <a class="btn btn-sm btn-success" href="{{route("destroy_membercard",["id"=>$row->id])}}">Xóa vĩnh viễn</a>
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