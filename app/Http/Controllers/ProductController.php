<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Orderdetail;
use App\Models\Size;
use App\Models\Sizedetail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function __construct(){
        define('ALL_MATERIAL', ['Vàng 10K', 'Vàng 14K', 'Vàng 18K', 'Vàng 20K', 'Vàng 24K']);
    }
    function index(Request $rqt){
        $number = 2;
        if(isset($rqt->act)){
            $list_product = Product::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_product = Product::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }

        //add list image, brand, categori
        foreach ($list_product as $key => $value) {
           $list_product_image = Product_image::where("product_id", $value->id)->get();
           $categori_name = Category::where("id", $value->category_id)->first() ;
           $brand_name = Brand::where("id", $value->brand_id)->first();
           
            $list_product[$key]["list_image"]=$list_product_image;
            $list_product[$key]["categori_name"]=$categori_name->name;
            $list_product[$key]["brand_name"]=$brand_name->name;
        }  
        if(isset($rqt->act)){
            return view("BackEnd.pages.product.recycle_bin", compact("list_product"));
        }else{
            return view("BackEnd.pages.product.product_list", compact("list_product"));
        }
    }

    function change_stutus(Request $rqt){
        $product = product::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $product->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển sản phẩm vào thùng rác thành công"]);
                $product->save();
                return back();
            }
                $product->status = 2;
                $rqt->session()->put("messenge",["style"=>"success", "msg"=>"khôi phục sản phẩm thành công"]);
                $product->save();
                return back();
           
        }
        $product->status = ($product->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái sản phẩm thành công"]);
        $product->save();
        return back();
    }
    function creat(){
        $brand_list=brand::all();
        $categori_list= Category::all();
        $sizes = size::all();
        return view("BackEnd.pages.product.add_product", compact("brand_list","categori_list", "sizes"));
    }
    function creat_product(Request $rqt){
        $rules =[
            'name'=>"required",
            'smdetail'=>"required",
            'detail'=>"required",
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
        $messenges = [
            'name.required'=>"Chưa nhập tên sản phẩm ",
            'smdetail.required'=>"Chưa nhập chi tiết sản phẩm",
            'detail.required'=>"Chưa nhập mô tả sản phẩm "
        ];
        $validator = $rqt->validate($rules, $messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        // hedln product information
        $product = new Product;

        $product->category_id = $rqt->category_id;
        $product->brand_id = $rqt->brand_id;
        $product->name = $rqt->name;
        $product->smdetail = $rqt->smdetail;
        $product->detail = $rqt->detail;
        $product->material = $rqt->material;
        $product->quantity = $rqt->quantity;
        $product->price = $rqt->price;
        $product->promotion = $rqt->promotion;
        $product->trending = 0;
        $product->view = 0;
        $product->sold_count =  0;
        $product->status = $rqt->status;
        $product->slug = str::slug($rqt->name);
        $product->sku = str::slug($rqt->name);
        $product->save();

        foreach ($rqt->size as $key => $value) {
            $size_detail = new sizedetail;
            $size_detail->id_product = $product->id;
            $size_detail->id_size = $value;

            $size = size::where("id", $value)->first();
            
            $size_detail->change_price = $product->price * $size->change /100;
            $size_detail->save();
        }

        // hedln images
        $images = $rqt->file("img");
        foreach ($images as $key => $item) {
            $img = new Product_image;
            $img->product_id = $product->id;
            $img->image = $item->getClientOriginalName();
            $img->save();
            $item->move("public/images/product/",$img->image);
        }
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm sản phẩm thành công"]);
        return redirect()->route("product_list");
    }
    function edit(Request $rqt){
        $brand_list=brand::all();
        $categori_list= Category::all();
        $product = product::where("id", $rqt->id)->first();
        $list_img = Product_image::where("product_id", $rqt->id)->get();
        $sizes = size::all();
        return view("BackEnd.pages.product.edit_product", compact("product", "brand_list", "categori_list","list_img", "sizes"));
    }
    function edit_product(Request $rqt){
        // dd($rqt);
        $rules =[
            'name'=>"required",
            'smdetail'=>"required",
            'detail'=>"required",
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
        $messenges = [
            'name.required'=>"Chưa nhập tên sản phẩm ",
            'smdetail.required'=>"Chưa nhập chi tiết sản phẩm",
            'detail.required'=>"Chưa nhập mô tả sản phẩm "
        ];
        $validator = $rqt->validate($rules, $messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        // hedln product information
        $product = Product::where("id", $rqt->id)->first();

        $product->category_id = $rqt->category_id;
        $product->brand_id = $rqt->brand_id;
        $product->name = $rqt->name;
        $product->smdetail = $rqt->smdetail;
        $product->detail = $rqt->detail;
        $product->material = $rqt->material;
        $product->quantity = $rqt->quantity;
        $product->price = $rqt->price;
        $product->promotion = $rqt->promotion;
        $product->trending = $rqt->trending;
        $product->view = $rqt->view;
        $product->sold_count = $rqt->sold_count;
        $product->status = $rqt->status;
        $product->slug = str::slug($rqt->name);
        $product->sku =  $rqt->sku;
        $product->save();
        
        if($rqt->size){
            //hedln product size

            //xóa size cũ
            $size_list = sizedetail::where("id_product", $rqt->id)->get();
            foreach ($size_list as $key => $value) {
                $value->delete();
            }

            //thêm size mới
            foreach ($rqt->size as $key => $value) {
                $size_detail = new sizedetail;
                $size_detail->id_product = $product->id;
                $size_detail->id_size = $value;

                $size = size::where("id", $value)->first();
                
                $size_detail->change_price = $product->price * $size->change /100;
                $size_detail->save();
            }
        }else{
            $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"Bạn chưa chọn lại kích cỡ mới"]);
            return back();
        }
        
        // hedln images
        $images = $rqt->file("img");
        if($images){  
            $images_old = Product_image::where("product_id", $rqt->id)->get();
            foreach ($images_old as $key => $item) {
                $item->delete();
                $link = public_path("images/product/".$item->image);
                file::delete($link);
            }
            foreach ($images as $key => $item) {
                $img = new Product_image;
                $img->product_id = $rqt->id;
                $img->image = $item->getClientOriginalName();
                $img->save();
                $item->move("public/images/product/",$img->image);
            }
        }
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật sản phẩm thành công"]);
        return redirect()->route("product_list");
       
        
    }
    function destroy(Request $rqt){
        // lấy sp và ảnh
        $product = product::where("id", $rqt->id)->first();
        $list_img = Product_image::where("product_id", $rqt->id)->get();

        // check đk
        $check_order  = Orderdetail::where("product_id", "=", $rqt->id)->join("db_order", "db_order.id", "=", "db_orderdetail.order_id")->select("db_orderdetail.*", "db_order.status as status")->first();
        
        if( $check_order){
            dd("tồn tại trong order nên không xóa được");
            $rqt->session()->put("messenge",["style"=>"danger","msg"=>"Tạm thời không thể xóa vì đang tồn tại trong order"]);
            return back();
        }
        dd("không tồn tại trong order nên xóa được");


        // xóa file ảnh trong thư mục
        foreach ($list_img as $key => $item) {
            $link = public_path("images/product/".$item->image);
            file::delete($link);
        }
        $product->delete();
        $rqt->session()->put("messenge",["style"=>"success","msg"=>"Xóa sản phẩm thành công"]);
        return back();
    }
}
