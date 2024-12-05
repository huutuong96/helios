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
                    <h1>Quản lý thẻ thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=category">Quản lý thẻ thành viên</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("edit_membercard")}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Chỉnh sửa thông tin thẻ thành viên</h3>
                        <div class="card-tools">
                            <input type="hidden" name="id" id="" value="{{$membercard->id}}">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("membercard_list")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="rank_type">Tên cấp bậc của thẻ (*)</label>
                                <input type="text" id="rank_type" name="rank_type" class="form-control" required value="{{$membercard->rank_type}}">
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-4">
                                    <label for="info1">infor 1 ( Có thể không cần nhập)</label>
                                    <input type="text" id="info1" name="info1" class="form-control" value="{{$membercard->info1}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="info2">infor 2 ( Có thể không cần nhập)</label>
                                    <input type="text" id="info2" name="info2" class="form-control" value="{{$membercard->info2}}">
                                </div>
                                <div class="form-group col-4">
                                    <label for="info3">infor 3 ( Có thể không cần nhập)</label>
                                    <input type="text" id="info3" name="info3" class="form-control" value="{{$membercard->info3}}">
                                </div>
                            </div>
                            <div class="form-group align-items-center">
                                <img src="{{asset("public/public/images/member_card/".$membercard->img)}}" alt="" style="height:250px">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="promotion">Mức giảm giá ( % ):</label><br>
                                <input type="number" id="promotion" name="promotion" value="{{$membercard->promotion}}" min="1" max="100" required class="form-control ">
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="{{$membercard->status}}" selected>[--- Trạng thái cấp bậc ---]</option>
                                    <option value="1">Kích hoạt</option>
                                    <option value="2">Không kích hoạt</option>
                                </select>
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh sản phẩm (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" >
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
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("membercard_list")}}">
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