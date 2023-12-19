@extends('BackEnd.index')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=product">Danh sách sản phẩm</a></li>
                        <li class="breadcrumb-item active">cập nhật</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{route("edit_product")}}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Cập nhật thông tin sản phẩm</h3>
                        <div class="card-tools">
                            <input type="hidden" name="id" id="" value="{{$product->id}}">
                            <input type="hidden" name="trending" id="" value="{{$product->trending}}">
                            <input type="hidden" name="view" id="" value="{{$product->view}}">
                            <input type="hidden" name="sold_count" id="" value="{{$product->sold_count}}">
                            <input type="hidden" name="slug" id="" value="{{$product->slug}}">
                            <input type="hidden" name="sku" id="" value="{{$product->sku}}">
                            <button type="submit" name="THEM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="{{route("product_list")}}">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm (*)</label>
                                @error('name')
                                    <span style="color: red; margin-left: 10px">{{$message}}</span>
                                @enderror
                                <input type="text" id="name" name="name" class="form-control" value="{{old("name") ?? $product->name}}">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="material">Chất liệu:</label>
                                    <select class="select2 form-control" id="material" name="material" data-placeholder="Chọn chất liệu" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <option value="{{$product->material}}">{{$product->material}}</option>
                                        <?php
                                        $materials = ALL_MATERIAL;
                                        foreach ($materials as $material) {
                                            echo "<option value=\"$material\">$material</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="size">Kích cỡ:</label>
                                    <select class="select2 form-control" id="size" name="size[]" multiple="multiple" data-placeholder="Chọn size" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <?php
                                        foreach ($sizes as $size) {
                                            echo "<option value=\"$size->id\">Số: $size->size_number</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="smdetail">Mô tả sản phẩm</label>
                                @error('smdetail')
                                    <span style="color: red; margin-left: 10px">{{$message}}</span>
                                @enderror
                                <textarea id="smdetail" name="smdetail" class="form-control summernote" rows="3">{{old("name") ?? $product->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="detail">Chi tiết sản phẩm</label>
                                @error('detail')
                                    <span style="color: red; margin-left: 10px">{{$message}}</span>
                                @enderror
                                <textarea id="detail" name="detail" class="form-control summernote" rows="3">{{old("name") ?? $product->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach($list_img as $item)
                                        <div class="col">
                                            <img src="{{asset('public/images/product/'.$item->image)}}" alt="" style="height: 200px">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category_id">Loại sản phẩm (*):</label>
                                <select id="category_id" name="category_id" class="form-control custom-select">    
                                    @foreach ($categori_list as $key => $item)
                                        @if ($product->categori_id == $item->id)
                                            <option value="{{ $item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                    @foreach ($categori_list as $key => $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Thương hiệu (*):</label>
                                <select id="brand_id" name="brand_id" class="form-control custom-select">
                                    @foreach ($brand_list as $key => $item)
                                    @if ($product->brand_id == $item->id)
                                        <option value="{{ $item->id}}">{{$item->name}}</option>
                                    @endif
                                    @endforeach
                                    @foreach ($brand_list as $key => $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm:</label>
                                <input type="number" id="price" name="price" min="1000000"  class="form-control" step="100000" value="{{old("name") ?? $product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="promotion">Phần trăm khuyến mãi:</label>
                                <input type="number" id="promotion" name="promotion" min="0"  max="90" class="form-control"  value="{{old("name") ?? $product->promotion}}">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng kho: </label>
                                <input type="number" id="quantity" name="quantity" min="1"  class="form-control"  value="{{old("name") ?? $product->quantity}}">
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh sản phẩm (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img[]" multiple >
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option value="{{$product->status}}" selected>[--- Trạng thái sản phẩm ---]</option>
                                    <option value="1">Còn hàng</option>
                                    <option value="2">Hết hàng</option>
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
                            <a class="btn btn-secondary" href="index.php?option=product">
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
<script>
     $(document).ready(function() {
         $('#detail').summernote();
         $('#smdetail').summernote();
         $('.select2').select2();
    });
</script>
<script>
   
   document.addEventListener("DOMContentLoaded", function() {
      // Your jQuery code here
      $("#img").on("input", function() {
         var message = "<div class=\"alert alert-success\" role=\"alert\" style=\"position: fixed; top: 50px; right: 16px; width: auto; z-index: 9999\" id=\"myAlert\"><i class='icon fas fa-check'></i> Bạn đã chọn ảnh thành công </div>";
         $("#messenge").html(message);
         setTimeout(function() {
            $("#messenge").fadeOut(500);
         }, 3000);
      });
   });
</script>

@endsection