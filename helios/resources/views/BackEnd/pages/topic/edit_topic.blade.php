@extends('BackEnd.index')

@section('css')
    
@endsection

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý chủ đề bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang quản lý</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=topic">Chủ đề bài viết</a></li>
                        <li class="breadcrumb-item active">Cập nhật thông tin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("edit_topic")}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Cập nhật thông tin chủ đề</h3>
                        <div class="card-tools">
                            <button type="submit" name="CAPNHAT" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Cập nhật]</button>
                            <a class="btn btn-secondary" href="{{route("topic_list")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên Chủ đề (*)</label>
                                <input type="text" id="name" name="name" value="{{$topic->name}}" class="form-control" required>
                                <input type="hidden" name="id" value="{{$topic->id}}">
                                <input type="hidden" name="orders" value="{{$topic->orders}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">Cấp cha (*):</label>
                                <select id="parent_id" name="parent_id" class="form-control custom-select">
                                    @if($topic->parent_id != 0)
                                        @foreach ($topic_list as $row)    
                                            @if($row->id == $topic->parent_id)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endif 
                                        @endforeach
                                    @else
                                        <option value="0">[--- Không có cấp cha ---]</option>
                                        @foreach ($topic_list as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    @endif 
                                    
                                    
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option  value="{{$topic->status}}" selected>{{ $topic->status == 1 ? "Hoạt động" : "Ngưng hoạt động"}}</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Ngưng hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="CAPNHAT" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Cập nhật]</button>
                            <a class="btn btn-secondary" href="{{route("topic_list")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
    
@endsection