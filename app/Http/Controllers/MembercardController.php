<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberCard;
use Illuminate\Support\Facades\File;
class MembercardController extends Controller
{
    function index(Request $rqt){
    $number = 4;
    if(isset($rqt->act)){
        $list_membercard = membercard::where("status", 0)->orderby("id", "desc")->paginate($number);
    }else{
        $list_membercard = membercard::where("status","!=",0)->orderby("id", "desc")->paginate($number);
    }

    // dd($list_membercard);
    if(isset($rqt->act)){
        return view("BackEnd.pages.member_card.recycle_bin", compact("list_membercard"));
    }else{
        return view("BackEnd.pages.member_card.list_membercard", compact("list_membercard"));
    }
}



function change_stutus(Request $rqt){
    $membercard = membercard::where("id", $rqt->id)->first();
    if(isset( $rqt->status)){
        if($rqt->status == 0){
            $membercard->status = 0;
            $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển thẻ vào thùng rác thành công"]);
            $membercard->save();
            return back();
        }
            $membercard->status = 2;
            $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục thẻ thành công"]);
            $membercard->save();
            return back();
       
    }
    $membercard->status = ($membercard->status == 1 ? 2 : 1);
    $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái thẻ thành công"]);
    $membercard->save();
    return back();
}


function creat(){
    return view("BackEnd.pages.member_card.creat_membercard");
}


function creat_membercard(Request $rqt){
    $img =$rqt->img;
    $membercard = new membercard;
    $membercard->rank_type = $rqt->rank_type;
    $membercard->info1 = $rqt->info1;
    $membercard->img = $img->getClientOriginalName();
    $membercard->info2 = $rqt->info2;
    $membercard->info3 = $rqt->info3;
    $membercard->promotion = $rqt->promotion;
    $membercard->status = $rqt->status;
    $membercard->save();
    $img->move("public/images/member_card", $membercard->img);
    $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm nhãn thẻ mới thành công"]);
    return redirect()->route("membercard_list");
}


function edit(Request $rqt){
    $membercard = membercard::where("id", $rqt->id)->first();
    return view("BackEnd.pages.member_card.edit_membercard", compact("membercard"));
}


function edit_membercard(Request $rqt){
    $img =$rqt->img;
    $membercard = membercard::where("id", $rqt->id)->first();
    $membercard->rank_type = $rqt->rank_type;
    $membercard->info1 = $rqt->info1;
    $membercard->info2 = $rqt->info2;
    $membercard->info3 = $rqt->info3;
    $membercard->promotion = $rqt->promotion;
    $membercard->status = $rqt->status;
    if($img){
        $membercard_all = membercard::all();
        $status = true;
        foreach ($membercard_all as $key => $value) {
                if($value->id == $membercard->id)  continue;
                if($value->img == $membercard->img){
                    $status = false;
                }
            }
        if($status){
            $link = public_path("images/member_card/". $membercard->img);
            file::delete($link);
        }
        $membercard->img = $img->getClientOriginalName();
        $img->move("public/images/member_card", $membercard->img);
    }
    $membercard->save();
    $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật thẻ thành công"]);
    return redirect()->route("membercard_list");
}



function destroy(Request $rqt){
    $membercard = membercard::where("id", $rqt->id)->first();
    $membercard_all = membercard::all();
    $status = true;
    foreach ($membercard_all as $key => $value) {
        if($value->id == $membercard->id)  continue;
        if($value->img == $membercard->img){
            $status = false;
        }
    }
    if($status){
        $link = public_path("images/member_card/". $membercard->img);
        file::delete($link);
    }
    $membercard->delete();
    $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa thẻ thành công"]);
    return back();
}
}
