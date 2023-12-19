<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    function index(Request $rqt){
        $number = 3;
        if(isset($rqt->act)){
            $list_post = post::where("status", 0)->orderby("id", "desc")->paginate($number);
        }else{
            $list_post = post::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }

        $list_topic = topic::all();
        foreach ($list_post as $key_post => $post) {
            foreach ($list_topic as $key => $topic) {
                if($post->topic_id == $topic->id){
                    $list_post[$key_post]["nametopic"] = $topic->name;
                }
            }
        }


        if(isset($rqt->act)){
            return view("BackEnd.pages.post.recycle_bin", compact("list_post"));
        }else{
            return view("BackEnd.pages.post.list_post", compact("list_post"));
        }
    }



    function change_stutus(Request $rqt){
        $post = post::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $post->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển nhãn hàng vào thùng rác thành công"]);
                $post->save();
                return back();
            }
                $post->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục nhãn hàng thành công"]);
                $post->save();
                return back();
           
        }
        $post->status = ($post->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái nhãn hàng thành công"]);
        $post->save();
        return back();
    }


    function creat(){
        $topic_list = topic::all();
        return view("BackEnd.pages.post.creat_post", compact("topic_list"));
    }


    function creat_post(Request $rqt){
        // dd($rqt);
        $img =$rqt->img;
        $post = new post;
        $post->topic_id = $rqt->topic_id;
        $post->title = $rqt->title;
        $post->slug = Str::slug($rqt->title);
        $post->img = $img->getClientOriginalName();
        $post->detail =$rqt->detail;
        $post->status = $rqt->status;
        $post->save();
        $img->move("public/images/post", $post->img);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm bài viết thành công"]);
        return redirect()->route("post_list");
    }


    function edit(Request $rqt){
        $topic_list = topic::all();
        $post = post::where("id", $rqt->id)->first();
        return view("BackEnd.pages.post.edit_post", compact("post", "topic_list"));
    }


    function edit_post(Request $rqt){
        // dd($rqt);
        $img =$rqt->img;
        $post = post::where("id", $rqt->id)->first();
        $post->topic_id = $rqt->topic_id;
        $post->title = $rqt->title;
        $post->slug = Str::slug($rqt->title);
        // $post->img = $img->getClientOriginalName();
        $post->detail =$rqt->detail;
        $post->status = $rqt->status;
        $post->save();
        if($img){
            $post->img = $img->getClientOriginalName();
            $img->move("public/images/post", $post->img);
        }
        $post->save();
        
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật bài viết thành công"]);
        return redirect()->route("post_list");
    }



    function destroy(Request $rqt){
        $post = post::where("id", $rqt->id)->first();
        $post_all = post::all();
        $status = true;
        foreach ($post_all as $key => $value) {
            if($value->id == $post->id)  continue;
            if($value->img == $post->img){
                $status = false;
            }
        }
        if($status){
            $link = public_path("images/post/". $post->img);
            file::delete($link);
        }
        $post->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa danh mục thành công"]);
        return back();
    }
}
