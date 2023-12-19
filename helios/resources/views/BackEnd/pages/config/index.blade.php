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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cấu hình website</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang quản lý</a></li>
                        <li class="breadcrumb-item active">Thông tin cấu hình</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("edit_config")}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Chỉnh sửa cấu hình website</h3>
                        <div class="card-tools">
                            <button type="submit" name="CAPNHAT" class="btn btn-success">
                                <i class="fa fa-save"></i> Lưu[CẬP NHẬT]
                            </button>
                            <a class="btn btn-secondary" href="{{route("dashboard")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title">Tên Website (*)</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{$config->title}}" required>
                                <input type="hidden" name="id" value="<?= $config['id'] ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo-current">Logo hiện tại:</label>
                                        <img src="{{asset("public/images/config/".$config['logo'])}}" class="form-control img img-responsive img-thumbnail" style="height:100px;width:250px">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon-current">Icon hiện tại:</label>
                                        <img src="{{asset("public/images/config/".$config['icon'])}}" class="form-control img img-responsive img-thumbnail" style="height:100px;width:150px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7">
                                    <label for="email">Email: </label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{$config->email}}" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="phone">Hotline: </label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{$config->phone}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ công ty: </label>
                                <input type="text" id="address" name="address" class="form-control" value="{{$config->address}}" required>
                            </div>
                            <div class="form-group">
                                <label for="url">Địa chỉ trang web (url):</label>
                                <input type="text" id="url" name="url" class="form-control" value="{{$config->url}}" required>
                            </div>
                            <div class="form-group">
                                <label for="map">Đường dẫn iframe map:</label>
                                <input type="text" id="map" name="map" class="form-control" value="{{$config->map}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group align-items-center">
                                <label for="logo">Logo website (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo" onchange="updateFileNames('logo')">
                                    <label class="custom-file-label logo" for="logo">Chọn hình</label>
                                </div>
                            </div>
                            <div class="form-group align-items-center">
                                <label for="icon">Icon website (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="icon" name="icon" onchange="updateFileNames('icon');">
                                    <label class="custom-file-label icon" for="icon">Chọn hình</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="icon">Bản đồ (*):</label>
                                <iframe src="{{$config->map}}" class="form-control" style="border:0;height:250px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="CAPNHAT" class="btn btn-success"><i class="fa fa-save"></i> Lưu[CẬP NHẬT]</button>
                            <a class="btn btn-secondary" href="{{route("dashboard")}}">
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

@section("script")
<script>
     $(document).ready(function() {
        // Ẩn alert sau 3 giây
        setTimeout(function() {
            $("#myAlert").fadeOut(500); // 500 là thời gian mất của hiệu ứng (milliseconds)
        },3000);
    });
    function updateFileNames(id) {
        const input = document.getElementById(id);
        const label = document.querySelector('.'+id);

        if (input.files && input.files.length > 0) {
            if (input.files.length === 1) {
                // Nếu chỉ có một file được chọn, lấy tên của file đầu tiên
                const fileName = input.files[0].name;

                // Cập nhật label để hiển thị tên của file đã chọn
                label.textContent = fileName;
            } else {
                // Nếu có nhiều hình được chọn, hiển thị số lượng file đã chọn
                label.textContent = input.files.length + ' files selected';
            }
        } else {
            // Nếu không có file nào được chọn, hiển thị lại "Choose file"
            label.textContent = "Choose file";
        }
    }
</script>

@endsection