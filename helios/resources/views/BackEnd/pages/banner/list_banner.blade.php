@extends('BackEnd.index')

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
                    <h1>Quản lý banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tất cả banner</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách banner</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route("creat_banner")}}">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                    <a class="btn btn-secondary" href="{{route("banner_list", ["act" => "thùng rác"])}}">
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
                                        <th class="text-center" width="10px">#</th>
                                        <th class="text-center" width="20%">Ảnh đại diện</th>
                                        <th class="text-center">Thông tin banner</th>
                                        <th class="text-center"width="15%">Đường dẫn</th>
                                        <th class="text-center" width="100px">Vị trí</th>
                                        <th class="text-center" width="200px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_banner as $row)
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>
                                            <td class="text-center">
                                                <img src="{{asset("public/images/banner/". $row->img )}}" style="width: 100%;" class="img img-fuild img-thumbnail">
                                            </td>
                                            <td class="text-left">
                                                <b>+ Tên banner:</b> {{ $row->name}}<br><br>
                                                @if (isset($row->info1))
                                                    <b>+ Thông tin 1:</b> {{$row->info1}}<br><br>
                                                @endif
                                                @if (isset($row->info2))
                                                <b>+ Thông tin 2:</b> {{$row->info2}};<br><br>
                                                @endif
                                                @if (isset($row->info3))
                                                <b>+ Thông tin 3:</b> {{$row->info3}}<br><br>
                                                @endif
                                            </td>
                                            <td><?= $row['link']; ?></td>
                                            <td><?= $row['position']; ?></td>
                                            <td class="text-center">
                                                @if ($row['status'] == 1)
                                                    <a class="btn btn-sm btn-success" href="{{route("change_stutus_banner",["id" => $row->id])}}" style="width:80%; margin:5%"><i class="fa fa-toggle-on"></i> Kích hoạt</a>
                                                @else
                                                    <a class="btn btn-sm btn-danger" href="{{route("change_stutus_banner",["id" => $row->id])}}" style="width:80%; margin:5%"><i class="fa fa-toggle-off"></i> Tạm ngưng</a>
                                                @endif
                                                <a class="btn btn-sm btn-info" href="{{route("edit_banner",["id" => $row->id])}}" style="width:80%; margin:5%"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                                <a class="btn btn-sm btn-danger" href="{{route("change_stutus_banner",["id" => $row->id, "status" => 0])}}" style="width:80%; margin:5%"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$list_banner->links()}}
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