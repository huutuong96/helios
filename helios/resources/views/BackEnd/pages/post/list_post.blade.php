@extends('BackEnd.index');

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
                    <h1>Quản lý bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tất cả bài viết</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách bài viết</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="{{route("creat_post")}}">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                    <a class="btn btn-secondary" href="{{route("post_list",["act"=>"thùng rac"])}}">
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
                                        <th class="text-center" width="15%">Hình</th>
                                        <th class="text-center" width="">Thông tin bài viết</th>
                                        <th class="text-center" width="15%">Chủ đề</th>
                                        <th class="text-center" width="20%">Chức năng</th>
                                        <th class="text-center" width="5%">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_post as $row)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{asset("public/images/post/". $row['img'])}}" style="width: 100%;" class="img img-fuild img-thumbnail">
                                            </td>
                                            <td class="text-center">
                                                <b>Name:</b> {{ $row->title }} <br>
                                            </td>
                                            <td class="text-center">{{$row->nametopic}}</td>
                                            <td class="text-center">
                                                @if ($row->status == 1)
                                                    <a class="btn btn-sm btn-success" href="{{route("change_stutus_post",["id" => $row->id])}}"  style="width:60%; margin:5%"><i class="fa fa-toggle-on"></i>  hoạt động</a>
                                                @else
                                                    <a class="btn btn-sm btn-danger mx-3" href="{{route("change_stutus_post",["id" => $row->id])}}" style="width:60%; margin:5%"><i class="fa fa-toggle-off"></i> Tạm ngưng</a>
                                                @endif
                                                <a class="btn btn-sm btn-primary" href="{{route("comment",["id"=>$row->id])}}" style="width:60%; margin:5%"><i class="fa fa-comment"></i> Bình luận</a><br>
                                                <a class="btn btn-sm btn-info" href="{{route("edit_post", ["id" => $row->id])}}" style="width:60%; margin:5%"><i class="fa fa-edit"></i>Chỉnh sửa</a>
                                                <a class="btn btn-sm btn-danger" href="{{route("change_stutus_post",["id" => $row->id, "status" => 0 ])}}" style="width:60%; margin:5%"><i class="fa fa-trash" style=" margin-right:10%"></i>   xóa</a>
                                            </td>
                                            <td class="text-center">{{$row->id}}</td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            {{$list_post->links()}}
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