@extends('BackEnd.index')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý danh mục sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.php?option=category">Danh mục sản phẩm</a></li>
                            <li class="breadcrumb-item active">cập nhật</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route("edit_categori")}}" method="post" >
                @csrf 
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title font-weight-bold py-2">Cập nhật thông tin danh mục sản phẩm</h3>
                            <div class="card-tools">
                                <input type="hidden" name="id" value = "{{$categori->id}}">
                                <input type="hidden" name="orders" value = "{{$categori->orders}}">
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="{{route("categori_list")}}">
                                    <i class="fa fa-arrow-left"></i> Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="name">Tên danh mục (*)</label>
                                    <input type="text" id="name" name="name" class="form-control" required value="{{$categori->name}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">Cấp cha (*):</label>
                                    <select id="parent_id" name="parent_id" class="form-control custom-select">
                                        @foreach($categori_list as $item);
                                        @if($categori->parent_id ==  $item->id)
                                            <option value="{{$item->id}}">{{$item->name}}</option>';
                                        @endif
                                        @endforeach
                                        @foreach($categori_list as $item);
                                        <option value="{{$item->id}}">{{$item->name}}</option>';
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái (*): </label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option selected  value="{{$categori->status}}">{{$categori->status == 1 ? "Hoạt động" : "Ngưng hoạt động"}}</option>
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
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="{{route("categori_list")}}">
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