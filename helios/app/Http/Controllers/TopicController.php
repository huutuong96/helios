<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;
class TopicController extends Controller
{
    function index(Request $rqt){
        $number = 7;
        if(isset($rqt->act)){
            $list_topic = topic::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_topic = topic::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }
        if(isset($rqt->act)){
            return view("BackEnd.pages.topic.recycle_bin", compact("list_topic"));
        }else{
            return view("BackEnd.pages.topic.topic_list", compact("list_topic"));
        }
    }



    function change_stutus(Request $rqt){
        $topic = topic::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $topic->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển chủ đề vào thùng rác thành công"]);
                $topic->save();
                return back();
            }
                $topic->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục chủ đề thành công"]);
                $topic->save();
                return back();
           
        }
        $topic->status = ($topic->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái chủ đề thành công"]);
        $topic->save();
        return back();
    }


    function creat(){
        $topic_list = topic::all();
        return view("BackEnd.pages.topic.creat_topic", compact("topic_list"));
    }


    function creat_topic(Request $rqt){
        $topic = new topic;
        $topic->name = $rqt->name;
        $topic->slug = Str::slug($rqt->name);
        $topic->parent_id = $rqt->parent_id;
        $topic->orders = 1;
        $topic->status = $rqt->status;
        $topic->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm chủ đề mới thành công"]);
        return redirect()->route("topic_list");
    }


    function edit(Request $rqt){
        $topic = topic::where("id", $rqt->id)->first();
        $topic_list = topic::all();
        return view("BackEnd.pages.topic.edit_topic", compact("topic","topic_list"));
    }


    function edit_topic(Request $rqt){
        $topic = topic::where("id", $rqt->id)->first();
        $topic->name = $rqt->name;
        $topic->slug = Str::slug($rqt->name);
        $topic->parent_id = $rqt->parent_id;
        $topic->orders = $rqt->orders;
        $topic->status = $rqt->status;
        $topic->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật chủ đề thành công"]);
        return redirect()->route("topic_list");
    }



    function destroy(Request $rqt){
        $topic = topic::where("id", $rqt->id)->first();
        $topic->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa chủ đề thành công"]);
        return back();
    }
}

