<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\File;

class ConfigController extends Controller
{
    function index(){
        $config = config::where("id", 1)->first();
        return view("BackEnd/pages/config/index", compact("config"));
    }
    function edit(Request $rqt){
        $logo = $rqt->logo;
        $icon = $rqt->icon;
        $config = config::where("id", 1)->first();
        $config->title = $rqt->title;
        $config->url = $rqt->url;
        $config->address = $rqt->address;
        $config->map = $rqt->map;
        $config->phone = $rqt->phone;
        $config->email = $rqt->email;
        if($logo){
            $link = public_path("images/config/". $config->logo);
            file::delete($link);
            $config->logo = $logo->getClientOriginalName();
            $logo->move("public/images/config", $config->logo);
        }
        if($icon){
            $link = public_path("images/config/". $config->icon);
            file::delete($link);
            $config->icon = $icon->getClientOriginalName();
            $icon->move("public/images/config", $config->icon);
        }
        $config->save();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái website thành công"]);
        return back();
    }
}
