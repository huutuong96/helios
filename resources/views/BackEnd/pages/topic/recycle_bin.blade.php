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
                    <h1>Quản lý Chủ đề (thùng rác)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=topic">Chủ đề</a></li>
                        <li class="breadcrumb-item active">Thùng rác Chủ đề</li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý Chủ đề đã xóa</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="{{route("topic_list")}}">
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
                                        <th class="text-center" width="5%">ID</th>
                                        <th class="text-center" width="35%">Thông tin Chủ đề</th>
                                        <th class="text-center" width="20%">Cấp cha</th>
                                        <th class="text-center">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_topic as $row) : ?>
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>
                                            <td class="text-left" style="padding-left:5% ">
                                             <b>Name:</b> {{$row->name}}<br>
                                             <b>Slug:</b> {{$row->slug}}
                                            </td>
                                            <td class="text-center">
                                                @if ($row['parent_id'] == '0') 
                                                    Không có cấp cha
                                                @else 
                                                    @foreach ($list_category as $parent_category) 
                                                        @if ($parent_category->id == $rowrow->parent_id) 
                                                            <b>Cấp cha:</b> {{$parent_category->name}}
                                                        @endif 
                                                    @endforeach 
                                                @endif 
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info mx-3" href="{{route("change_stutus_topic",["id"=>$row['id']])}}"><i class="fa fa-undo"></i> Khôi phục</a>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-trash"></i> Xóa vĩnh viễn</button>

                                                <div class="modal fade" id="modal" style="width: 100%;background-color: rgba(255, 255, 255, 0.8);">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thông báo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa vĩnh viễn chủ đề này không !!!
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <div style="display: flex"></div>
                                                                <a class="btn btn-sm btn-success" href="{{route("destroy_topic",["id"=>$row['id']])}}">Xóa vĩnh viễn</a>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script><script>
    $(document).ready(function() {
        // Ẩn alert sau 3 giây
        setTimeout(function() {
            $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
        },3000);
    });
</script>
@endsection