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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý thương kích thước sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.php?option=category">Kích thước sản phẩm</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route("edit_size")}}" method="post"  enctype="multipart/form-data">
                @csrf 
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title font-weight-bold py-2">Chỉnh sửa kích thước sản phẩm </h3>
                            <div class="card-tools">
                                <input type="hidden" name="id" id="" value="{{$size->id}}">
                                <button type="submit" name="THEMDANHMUC" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                                <a class="btn btn-secondary" href="{{route("size_list")}}">
                                    <i class="fa fa-arrow-left"></i> Thoát
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 ">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="size_number">Nhập kích thước ( vd: 1,2,3...)</label>
                                        <input type="number" id="size_number" name="size_number" class="form-control" readonly  value="{{$size->size_number}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="change">Nhập phần trăm giá chênh lệch ( vd: 5 -> 5%)</label>
                                        <input type="number" id="change" name="change" class="form-control"  min="0" max="100" required value="{{$size->change}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Trạng thái (*): </label>
                                    <select id="status" name="status" class="form-control custom-select">
                                        <option selected value="{{$size->status}}">[--- Trạng thái danh mục ---]</option>
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
                                <a class="btn btn-secondary" href="{{route("size_list")}}">
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