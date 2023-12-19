@extends('BackEnd.index')

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý banner quảng cáo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=banner">Danh sách banner</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("edit_banner")}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Chỉnh sửa thông  banner</h3>
                        <div class="card-tools">
                            <input type="hidden" name="id" id="" value="{{$banner->id}}">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("banner_list")}}">
                                <i class="fa fa-arrow-left"></i> Quay lại
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên banner (*)</label>
                                <input type="text" id="name" name="name" class="form-control" required value="{{$banner->name}}">
                            </div>
                            <div class="form-group">
                                <label for="link">Đường dẫn (*)</label>
                                <input type="text" id="link" name="link" class="form-control" required value="{{$banner->link}}">
                            </div>
                            <div class="form-group">
                                <label for="info1">Thông tin 1: </label>
                                <input type="text" id="info1" name="info1" class="form-control" value="{{$banner->info1}}">
                            </div>
                            <div class="form-group">
                                <label for="info2">Thông tin 2: </label>
                                <input type="text" id="info2" name="info2" class="form-control" value="{{$banner->info2}}">
                            </div>
                            <div class="form-group">
                                <label for="info3">Thông tin 3: </label>
                                <input type="text" id="info3" name="info3" class="form-control" value="{{$banner->info3}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <img src="{{asset("public/images/banner/".$banner->img)}}" style="width:100%" alt="">
                            </div>
                            <div class="form-group">
                                <label for="img">Hình ảnh đại diện ( chọn khi muốn đổi ảnh):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="orders">Sắp xếp (*):</label>
                                <select id="orders" name="orders" class="form-control custom-select">
                                    <option value="{{$banner->orders}}">[--- Mặc định ---]</option>
                                    <option value="left">left</option>
                                    <option value="right">right</option>
                                    <option value="top">top</option>
                                    <option value="buttom">buttom</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">Vị trí (*):</label>
                                <select id="position" name="position" class="form-control custom-select">
                                    <option value="slider">{{$banner->position}}</option>
                                    <option value="slider">Slider</option>
                                    <option value="collection banner">Collection banner</option>
                                    <option value="collection area">Collection Area</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option  value="2" selected>[--- Trạng thái ---]</option>
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Không xuất bản</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("banner_list")}}">
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