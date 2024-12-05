<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class BrandController extends Controller
{
    function index(Request $rqt){
        $number = 3;
        if(isset($rqt->act)){
            $list_brand = Brand::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_brand = Brand::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }
        if(isset($rqt->act)){
            return view("BackEnd.pages.brand.recycle_bin", compact("list_brand"));
        }else{
            return view("BackEnd.pages.brand.list_brand", compact("list_brand"));
        }
    }



    function change_stutus(Request $rqt){
        $brand = Brand::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $brand->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển nhãn hàng vào thùng rác thành công"]);
                $brand->save();
                return back();
            }
                $brand->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục nhãn hàng thành công"]);
                $brand->save();
                return back();
           
        }
        $brand->status = ($brand->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái nhãn hàng thành công"]);
        $brand->save();
        return back();
    }


    function creat(){
        return view("BackEnd.pages.brand.creat_brand");
    }


    function creat_brand(Request $rqt){
        $img =$rqt->img;
        $brand = new Brand;
        $brand->name = $rqt->name;
        $brand->slug = Str::slug($rqt->name);
        $brand->img = $img->getClientOriginalName();
        $brand->orders = 1;
        $brand->status = $rqt->status;
        $brand->save();
        $img->move("public/images/brand", $brand->img);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm nhãn hàng mới thành công"]);
        return redirect()->route("brand_list");
    }


    function edit(Request $rqt){
        $brand = Brand::where("id", $rqt->id)->first();
        return view("BackEnd.pages.brand.edit_brand", compact("brand"));
    }


    function edit_brand(Request $rqt){
        $img =$rqt->img;
        $brand = Brand::where("id", $rqt->id)->first();
        $brand->name = $rqt->name;
        $brand->slug = Str::slug($rqt->name);
        $brand->orders = $rqt->orders;
        $brand->status = $rqt->status;
        if($img){
            $link = public_path("images/brand/". $brand->img);
            File::delete($link);
            $brand->img = $img->getClientOriginalName();
            $img->move("public/images/brand", $brand->img);
        }
        $brand->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật danh mục thành công"]);
        return redirect()->route("brand_list");
    }



    function destroy(Request $rqt){
        $brand = Brand::where("id", $rqt->id)->first();
        $brand_all = Brand::all();
        $status = true;
        foreach ($brand_all as $key => $value) {
            if($value->id == $brand->id)  continue;
            if($value->img == $brand->img){
                $status = false;
            }
        }
        if($status){
            $link = public_path("images/brand/". $brand->img);
            File::delete($link);
        }
        $brand->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa danh mục thành công"]);
        return back();
    }
}
