<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriController extends Controller
{
    function index(Request $rqt){
        $number = 7;
        if(isset($rqt->act)){
            $list_category = category::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_category = category::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }
        $list_category_full = category::all();
        if(isset($rqt->act)){
            return view("BackEnd.pages.categori.recycle_bin", compact("list_category", "list_category_full"));
        }else{
            return view("BackEnd.pages.categori.list_categori", compact("list_category", "list_category_full"));
        }
    }

    function change_stutus(Request $rqt){
        $categori = category::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $categori->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển danh mục vào thùng rác thành công"]);
                $categori->save();
                return back();
            }
                $categori->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục danh mục thành công"]);
                $categori->save();
                return back();
           
        }
        $categori->status = ($categori->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái danh mục thành công"]);
        $categori->save();
        return back();
    }
    function creat(){
        $categori_list= Category::all();
        return view("BackEnd.pages.categori.creat_categori", compact("categori_list"));
    }
    function creat_categori(Request $rqt){
        $category = new Category;

        $category->name = $rqt->name;
        $category->slug = Str::slug($rqt->name);
        $category->parent_id = $rqt->parent_id;
        $category->orders = 1;
        $category->status = $rqt->status;
        $category->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm danh mục mới thành công"]);
        return redirect()->route("categori_list");
    }
    function edit(Request $rqt){
        $categori_list= Category::all();
        $categori = category::where("id", $rqt->id)->first();
        return view("BackEnd.pages.categori.edit_categori", compact("categori", "categori_list"));
    }
    function edit_categori(Request $rqt){

        $categori = category::where("id", $rqt->id)->first();
        $categori->name = $rqt->name;
        $categori->slug = Str::slug($rqt->name);
        $categori->parent_id = $rqt->parent_id;
        $categori->orders = $rqt->orders;
        $categori->status = $rqt->status;
        $categori->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật danh mục thành công"]);
        return redirect()->route("categori_list");
       
        
    }
    function destroy(Request $rqt){
        $categori = category::where("id", $rqt->id)->first();
        $categori->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa danh mục thành công"]);
        return back();
    }
}
