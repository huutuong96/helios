<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    function index(Request $rqt){
        $number = 3;
        if(isset($rqt->idDeleted)){
            $list_contact = contact::where("isDeleted", 0)->orderby("id", "desc")->paginate($number);
            return view("BackEnd.pages.contact.recycle_bin", compact("list_contact"));
        }else{
            $list_contact = contact::where("isDeleted","!=",0)->orderby("id", "desc")->paginate($number);
            return view("BackEnd.pages.contact.index", compact("list_contact"));
        }
    }
    function create(Request $rqt){
        $contact = new contact;
        $contact->fullname = $rqt->fullname;
        $contact->email = $rqt->email;
        $contact->phone = $rqt->phone;
        $contact->title = $rqt->title;
        $contact->detail = $rqt->detail;
        $contact->status = 1;
        $contact->isDeleted = 1;
        $contact->save();
        $rqt->session()->put("messenge",["style"=>"info", "msg"=>"Đã gửi email thành công"]);
        return redirect()->route("index");

    }

    function change_isDeleted(Request $rqt){
        $contact = contact::where("id", $rqt->id)->first();
            if($contact->isDeleted == 1){
                $contact->isDeleted = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển vào thùng rác thành công"]);
                $contact->save();
                return back();
            }else{
                $contact->isDeleted = 1;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục thành công"]);
                $contact->save();
                return back();
            } 
    }

    function destroy(Request $rqt){
        $contact = contact::where("id", $rqt->id)->first();
        $contact->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa danh mục thành công"]);
        return back();
    }
}
