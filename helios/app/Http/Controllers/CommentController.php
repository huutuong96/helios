<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductComment;
use App\Models\BlogComment;
use App\Models\User;

class CommentController extends Controller
{
    // function index(Request $rqt){
    //     $number = 8;
    //     if(isset($rqt->product)){
    //         $comments = ProductComment::where("product_id", $rqt->id)->orderby("id", "desc")->paginate($number);
    //     }else{
    //         $comments = BlogComment::where("post_id", $rqt->id)->orderby("id", "desc")->paginate($number);
    //     }
        
    //     foreach ($comments as $key => $comment) {
    //         $user = user::where("id", $comment->user_id)->first();
    //         $comment["user"] = $user;
    //     }
    //     return view("BackEnd.pages.comment.list_comment",  compact("comments"));
    // }

    function index(Request $rqt){
        $number = 8;
        if(isset($rqt->product)){
            $comments = ProductComment::where("product_id", $rqt->id)->orderby("id", "desc")->paginate($number);
            $link = "product_list";
        } else {
            $comments = BlogComment::where("post_id", $rqt->id)->orderby("id", "desc")->paginate($number);
            $link = "post_list";
        }
        
        foreach ($comments as $key => $comment) {
            $user = User::where("id", $comment->user_id)->first();
            $comments[$key]["user"] = $user;
        }
        return view("BackEnd.pages.comment.list_comment",  compact("comments", "link"));
    }
    

    function create_product_comment(Request $rqt){
        if(!Auth::check()){
         $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"Cần phải đăng nhập trước khi bình luận"]); 
             return redirect()->route("login");
        }
        $comment = new ProductComment ;
        $comment->product_id = $rqt->product_id;
        $comment->user_id = $rqt->user_id;
        $comment->detail = $rqt->detail;
        $comment->status = 1;
        $comment->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Bạn đã thành công để lại bình luận"]); 
        return back();
     }

     function create_post_comment(Request $rqt){
        if(!Auth::check()){
         $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"Cần phải đăng nhập trước khi bình luận"]); 
             return redirect()->route("login");
        }
        $comment = new BlogComment ;
        $comment->post_id = $rqt->post_id;
        $comment->user_id = $rqt->user_id;
        $comment->detail = $rqt->detail;
        $comment->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Bạn đã thành công để lại bình luận"]); 
        return back();
     }
     
     
     function destroy(Request $rqt){
        
     }
}
