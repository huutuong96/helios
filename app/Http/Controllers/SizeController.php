<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    function index(Request $rqt){
        $number = 7;
        if(isset($rqt->act)){
            $list_size = size::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_size = size::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }
        if(isset($rqt->act)){
            return view("BackEnd.pages.size.recycle_bin", compact("list_size"));
        }else{
            return view("BackEnd.pages.size.list_size", compact("list_size"));
        }
    }

    function change_stutus(Request $rqt){
        $size = size::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $size->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển vào thùng rác thành công"]);
                $size->save();
                return back();
            }
                $size->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục thành công"]);
                $size->save();
                return back();
           
        }
        $size->status = ($size->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái thành công"]);
        $size->save();
        return back();
    }
    function creat(){
        return view("BackEnd.pages.size.creat_size");
    }
    function creat_size(Request $rqt){
        $size_list = size::all();
        foreach ($size_list as $key => $row) {
            if($row->size_number == $rqt->size_number){
                $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"Kích thước này đã tồn tại"]);
                return back();
            }
        }
        $size = new size;

        $size->size_number = $rqt->size_number;
        $size->change = $rqt->change;
        $size->status = $rqt->status;
        $size->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm kích thước mới thành công"]);
        return redirect()->route("size_list");
    }
    function edit(Request $rqt){
        $size = size::where("id", $rqt->id)->first();
        return view("BackEnd.pages.size.edit_size", compact("size"));
    }
    function edit_size(Request $rqt){

        $size = size::where("id", $rqt->id)->first();
        $size->change = $rqt->change;
        $size->status = $rqt->status;
        $size->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật kích thước thành công"]);
        return redirect()->route("size_list");
    }

    function destroy(Request $rqt){
        $size = size::where("id", $rqt->id)->first();
        $size->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa danh mục thành công"]);
        return back();
    }

}
