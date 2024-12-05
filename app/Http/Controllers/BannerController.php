<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    function index(Request $rqt){
        $number = 4;
        if(isset($rqt->act)){
            $list_banner = Banner::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_banner = Banner::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }
    
        // dd($list_banner);
        if(isset($rqt->act)){
            return view("BackEnd.pages.banner.recycle_bin", compact("list_banner"));
        }else{
            return view("BackEnd.pages.banner.list_banner", compact("list_banner"));
        }
    }
    
    
    
    function change_stutus(Request $rqt){
        $banner = Banner::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $banner->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển thẻ vào thùng rác thành công"]);
                $banner->save();
                return back();
            }
                $banner->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục thẻ thành công"]);
                $banner->save();
                return back();
           
        }
        $banner->status = ($banner->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái thẻ thành công"]);
        $banner->save();
        return back();
    }
    
    
    function creat(){
        return view("BackEnd.pages.banner.creat_banner");
    }
    
    
    function creat_banner(Request $rqt){
        $img =$rqt->img;
        $banner = new Banner;
        
        $banner->name = $rqt->name;
        $banner->info1 = $rqt->info1;
        $banner->info2 = $rqt->info2;
        $banner->info3 = $rqt->info3;
        $banner->link = $rqt->link;
        $banner->position = $rqt->position;
        $banner->orders = $rqt->orders;
        $banner->status = $rqt->status;
        $banner->img = $img->getClientOriginalName();
        $banner->save();
       
        $img->move("public/images/banner", $banner->img);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm banner mới thành công"]);
        return redirect()->route("banner_list");
    }
    
    
    function edit(Request $rqt){
        $banner = Banner::where("id", $rqt->id)->first();
        return view("BackEnd.pages.banner.edit_banner", compact("banner"));
    }
    
    
    function edit_banner(Request $rqt){
        $img =$rqt->img;
        $banner = Banner::where("id", $rqt->id)->first();
        $banner->name = $rqt->name;
        $banner->info1 = $rqt->info1;
        $banner->info2 = $rqt->info2;
        $banner->info3 = $rqt->info3;
        $banner->link = $rqt->link;
        $banner->position = $rqt->position;
        $banner->orders = $rqt->orders;
        $banner->status = $rqt->status;
        if($img){
            $banner_all = Banner::all();
            $status = true;
            foreach ($banner_all as $key => $value) {
                    if($value->id == $banner->id)  continue;
                    if($value->img == $banner->img){
                        $status = false;
                    }
                }
            if($status){
                $link = public_path("images/banner/". $banner->img);
                File::delete($link);
            }
            $banner->img = $img->getClientOriginalName();
            $img->move("public/images/banner", $banner->img);
        }
        $banner->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật thẻ thành công"]);
        return redirect()->route("banner_list");
    }
    
    
    
    function destroy(Request $rqt){
        $banner = Banner::where("id", $rqt->id)->first();
        $banner_all = Banner::all();
        $status = true;
        foreach ($banner_all as $key => $value) {
            if($value->id == $banner->id)  continue;
            if($value->img == $banner->img){
                $status = false;
            }
        }
        if($status){
            $link = public_path("images/banner/". $banner->img);
            File::delete($link);
        }
        $banner->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa thẻ thành công"]);
        return back();
    }
    }
