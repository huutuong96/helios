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
                    <h1>Quản lý {{$role}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=user">Danh sách {{$role}}</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("creat_user")}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Tạo mới {{$role}}</h3>
                        <div class="card-tools">
                            <input type="hidden" name="role" id="" value={{ $role == "khách hàng" ? "user" : "" }}>
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("user_list",["role"=> ($role == "khách hàng" ? "user" : "")])}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="fullname">Họ tên (*)</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" required value="{{old("fullname")}}">
                                @error('fullname')
                                    <div class="spam" style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Tên tài khoản (*)</label>
                                    <input type="text" id="username" name="username" class="form-control" required value="{{old("username")}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email (*)</label>
                                    <input type="email" id="email" name="email" class="form-control" required value="{{old("email")}}">
                                    @error('email')
                                        <div class="spam" style="color:red">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" id="address" name="address" class="form-control" value="{{old("address")}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone (*)</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{old("phone")}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Mật khẩu (*)</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    @error('password')
                                        <div class="spam" style="color:red">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Xác nhận Mật khẩu (*)</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                        <div class="spam" style="color:red">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role_user">Phân quyền:</label>
                                <select id="role_user" name="role_user" class="form-control custom-select">
                                    <option value="admin">Admin</option>
                                    <option value="seo_manager">SEO Manager</option>
                                    <option value="content">content</option>
                                    <option value="customerac">customerac</option>
                                </select>
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh đại diện (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" required>
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Giới tính:</label>
                                <select id="gender" name="gender" class="form-control custom-select">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="2" selected>[--- Trạng thái tài khoản ---]</option>
                                    <option value="1">Kích hoạt</option>
                                    <option value="2">Không kích hoạt</option>
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
                            <a class="btn btn-secondary" href="{{route("user_list",["role"=> ($role == "khách hàng" ? "user" : "")])}}">
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