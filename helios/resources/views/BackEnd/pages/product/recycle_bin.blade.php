@extends('BackEnd.index')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                    <h1>Quản lý sản phẩm (thùng rác)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm đã xóa</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách sản phẩm đã xóa</h3>
                                <div class="card-tools">
                                    <a class="btn btn-secondary" href="{{route("product_list")}}">
                                        <i class="fa fa-arrow-left"></i> Quay lại
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-left" width="10px">#</th>
                                        <th class="text-left" width="100px">Hình</th>
                                        <th class="text-left" width="200px">Thông tin chung</th>
                                        <th class="text-left" width="100px">Thống kê</th>
                                        <th class="text-left" width="120px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list_product as $key => $row)
                                        <tr>
                                            <td class="text-center"> {{ $row['id'] }}</td>
                                            <td class="text-center">
                                                <div id="imageSlider{{$row['id']}}" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach ($row['list_image'] as $key => $img)
                                                            <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                                                <img src="{{asset("public/images/product/". $img['image'])}}" class="d-block w-100" alt="Image">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#imageSlider{{ $row['id'] }}" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#imageSlider{{ $row['id'] }}" data-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-left">
                                                <b>Tên</b>: {{$row['name']}} <br><br>
                                                <b>Nhãn hàng</b>: {{ $row['brand_name']}}<br><br>
                                                <b>Loại</b>: {{$row['categori_name']}} <br><br>
                                               
                                                
                                            </td>
                                            <td class="text-left">
                                                - <b>Lượt xem</b>: {{$row['view']}}<br><br>
                                                - <b>Lượng tồn kho</b>:@if ($row['quantity'] > 0)
                                                                    {{$row['quantity']}}
                                                                    @else
                                                                        Hết hàng
                                                                    @endif
                                                <br><br>- <b>Số lượng bán</b>:{{$row['sold_count']}}<br><br>
                                            </td>
                                            <td class="text-center">
                                                @if ($row['quantity'] > 0)
                                                    <a class="btn btn-sm btn-success" style="width:80%; margin:5%"> Còn hàng</a>
                                                @else
                                                    <a class="btn btn-sm btn-danger" style="width:80%; margin:5%"> Hết hàng</a>
                                                @endif
                                                <br>
                                                <a class="btn btn-sm btn-info" href="{{route("change_stutus_product",["id"=>$row['id'], "status"=>2])}}" style="width:80%; margin:5%"><i class="fa fa-undo"></i> Khôi phục</a><br>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal"style="width:80%; margin:5%"><i class="fa fa-trash"></i> Xóa vĩnh viễn</button>

                                                <div class="modal fade" id="modal" style="width: 100%;background-color: rgba(255, 255, 255, 0.8);">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thông báo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa vĩnh viễn sản phẩm này không !!!
                                                            </div>
                                                            <div class="modal-footer" >
                                                                <div style="display: flex"></div>
                                                                <a class="btn btn-sm btn-success" href="{{route("destroy_product",["id"=>$row['id']])}}">Xóa vĩnh viễn</a>
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin: 10px 0">
                                {{$list_product->links()}}
                            </div>
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