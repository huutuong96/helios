@extends('BackEnd.index')

@section('main')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý thương hiệu sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.php?option=category">Thương hiệu sản phẩm</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route("edit_brand")}}" method="post"  enctype="multipart/form-data">
                @csrf 
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title font-weight-bold py-2">Cập nhật thông tin thương hiệu </h3>
                            <div class="card-tools">
                                <input type="hidden" name="id" id="" value="{{$brand->id}}">
                                <input type="hidden" name="orders" id="" value="{{$brand->orders}}">
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="{{route("brand_list")}}">
                                    <i class="fa fa-arrow-left"></i> Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="name">Tên thương hiệu (*)</label>
                                    <input type="text" id="name" name="name" class="form-control" required value="{{$brand->name}}">
                                </div>
                                <div class="form-group row justify-content-center">
                                            <div class="col-5">
                                                <img src="{{asset('public/images/brand/'.$brand->img)}}" alt="" style="height: 200px">
                                            </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Trạng thái (*): </label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option selected  value="{{$brand->status}}">{{$brand->status == 1 ? "Hoạt động" : "Ngưng hoạt động"}}</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Ngưng hoạt động</option>
                                    </select>
                                </div>
                                <div class="form-group align-items-center">
                                    <label for="img">Hình ảnh sản phẩm (*):</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img"  >
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title font-weight-bold py-2"></h3>
                            <div class="card-tools">
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="{{route("brand_list")}}">
                                    <i class="fa fa-arrow-left"></i> Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
            <div id="messenge"></div>
            
        </section>
        <!-- /.content -->
    </div>
@endsection
@section("script")
    @include('BackEnd.models.handle_chosse_img')
@endsection