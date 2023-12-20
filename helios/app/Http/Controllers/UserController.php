<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\MemberCard;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function Logon(Request $rqt){
        $user = user::where("username", $rqt->username)->first();
        if($user){
            if(Hash::check($rqt->password, $user->password)){
                Auth::login($user);
            }else{
                $rqt->session()->put("messenge", "Mật khẩu của bạn không đúng");
                return back()->withInput();
            }
        }
        $rqt->session()->put("messenge", "tài khoản của bạn không đúng");
        return back()->withInput();

    }
    
    function Login(Request $rqt){
        $user = user::where("username", $rqt->username)->first();
        if($user){
            if(Hash::check($rqt->password, $user->password)){
                Auth::login($user);
                $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Đăng nhập thành công"]); 
                return redirect()->route("index");
            }else{
                $rqt->session()->put("messenges", "Mật khẩu của bạn không đúng");
                return back()->withInput();
            }
        }else{
            $rqt->session()->put("messenges", "tài khoản của bạn không đúng");
            return back()->withInput();
        }
        

    }

    function index(Request $rqt){
        $membercard = membercard::all();
        $number = 3;
        
        if(isset($rqt->role) && $rqt->role == "user"){
            if(isset($rqt->act)){
                $list_user = user::where("status", 0)->where("role", "customerac" )->orderby("id", "desc")->paginate($number);
            }else{
                $list_user = user::where("status","!=",0)->where("role", "customerac")->orderby("id", "desc")->paginate($number);
            }
            $role = "khách hàng";
        }else{
            if(isset($rqt->act)){
                $list_user = user::where("status", 0)->where("role", "admin")->orderby("id", "desc")->paginate($number);
            }else{
                $list_user = user::where("status","!=",0)->where("role", "admin")->orderby("id", "desc")->paginate($number);
            }
            $role = "quản trị viên";
        }
        
        if(isset($rqt->act)){
            return view("BackEnd.pages.user.recycle_bin", compact("list_user", "membercard", "role"));
        }else{
            return view("BackEnd.pages.user.list_user", compact("list_user", "membercard", "role"));
        }
    }



    function change_stutus(Request $rqt){
        $user = user::where("id", $rqt->id)->first();
        if(isset( $rqt->status)){
            if($rqt->status == 0){
                $user->status = 0;
                $rqt->session()->put("messenge",["style"=>"secondary", "msg"=>"Chuyển tài khoản vào thùng rác thành công"]);
                $user->save();
                return back();
            }
                $user->status = 2;
                $rqt->session()->put("messenge",["style"=>"info", "msg"=>"khôi phục tài khoản thành công"]);
                $user->save();
                return back();
           
        }
        $user->status = ($user->status == 1 ? 2 : 1);
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái tài khoản thành công"]);
        $user->save();
        return back();
    }


    function creat(Request $rqt){
        $role = $rqt->role;
        return view("BackEnd.pages.user.creat_user", compact("role"));
    }


    function creat_user(Request $rqt){
        $rules = [
            "email" => 'unique:users| max:100',
            "username" => 'string| max:20',
            "password" => 'required| string| min:3| max:10| confirmed',
            "password_confirmation"=> 'required|min:3|max:20|'
        ];
        $messenges = [
            "email.unique:users" => 'Email của bạn đã tồn tại',
            "email.max:100" => 'Email của bạn dài quá 100 ký tự',
            "username.unique:users" => 'Tài khoản này đã tồn tại',
            "username.max:20" => 'Tên của bạn dài hơn 20 ký ',
            "password.min:3" => 'Mật khẩu phải lớn hơn 3 ký tự',
            "password.max:10" => 'Mật khẩu phải nhỏ hơn 10 ký tự',
            "password_confirmation"=> 'Mật khẩu nhập lại không đúng'
        ];
        $validator = $rqt->validate($rules, $messenges);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $role = $rqt->role == "khách hàng" ? "user" : "";
        $img =$rqt->img;
        $user = new user;
        $user->fullname = $rqt->fullname;
        $user->username = $rqt->username;
        $user->password = $rqt->password;
        $user->email = $rqt->email;
        $user->address = $rqt->address;
        $user->gender = $rqt->gender;
        $user->phone = $rqt->phone;
        $user->role = $rqt->role_user;
        $user->rank_id = 1;
        $user->status = $rqt->status;
        $user->img = $img->getClientOriginalName();
        $user->save();
        $img->move("public/images/user", $user->img);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm tài khoản mới thành công"]); 
        return redirect()->route("user_list", compact("role"));
    }

    function creat_user_guest(Request $rqt){
        $rules = [
            "email" => 'required|unique:users| max:100',
            "username" => 'required|string| max:20',
            "fullname" => "required| string| min:3| max:50",
            "address"=> "required| string| min:3| max:250",
            "phone"=> "required| string| min:10| max:10",
            "password" => 'required| string| min:3| max:10| confirmed',
            "password_confirmation"=> 'required|min:3|max:10'
        ];
        $messages = [
            "email.unique:users" => 'Email của bạn đã tồn tại',
            "email.max:100" => 'Email của bạn dài quá 100 ký tự',
            "username.unique:users" => 'Tài khoản này đã tồn tại',
            "username.max:20" => 'Tên của bạn dài hơn 20 ký ',
            "fullname.required" => "Bạn chưa nhập họ và tên",
            "fullname.string" => "Bạn phải nhập đúng tên của mình",
            "fullname.min:3" => "Tên của bạn phải dài hơn 3 ký ",
            "fullname.max:50" => "Tên của bạn phải nhỏ hơn 50 ký tự",
            "password.min:3" => 'Mật khẩu phải lớn hơn 3 ký tự',
            "password.max:10" => 'Mật khẩu phải nhỏ hơn 10 ký tự',
            "password_confirmation"=> 'Mật khẩu nhập lại không đúng'
        ];
        
        $validator = $rqt->validate($rules, $messages);
        if(!$validator){
            return back()->withErrors($validator)->withInput();
        }
        $user = new user;
        $user->fullname = $rqt->fullname;
        $user->username = $rqt->username;
        $user->password = $rqt->password;
        $user->email = $rqt->email;
        
        $user->address = $rqt->address;
        $user->gender = $rqt->gender;
        $user->phone = $rqt->phone;
        $user->role = "customerac";
        $user->rank_id = 1;
        $user->status = 1;
        $user->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm tài khoản mới thành công"]); 
        return redirect()->route("index");
    }


    function destroy(Request $rqt){
        $user = user::where("id", $rqt->id)->first();
        $user_all = user::all();
        $status = true;
        foreach ($user_all as $key => $value) {
            if($value->id == $user->id)  continue;
            if($value->img == $user->img){
                $status = false;
            }
        }
        if($status){
            $link = public_path("images/user/". $user->img);
            file::delete($link);
        }
        $user->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa tài khoản thành công"]);
        return back();
    }

    function edit_user(Request $rqt){
        
        $img =$rqt->img;
        $user = user::where("id", $rqt->user_id)->first();
        $user->fullname = $rqt->fullname;
        $user->username = $rqt->username;
        $user->email = $rqt->email;
        $user->address = $rqt->address;
        $user->gender = $rqt->gender;
        $user->phone = $rqt->phone;
        $user->role = auth::user()->role;
        $user->rank_id = auth::user()->rank_id;
        $user->status = auth::user()->status;
        if($rqt->cpassword){
            if( $rqt->cpassword == auth::user()->password){
                $user->password = $rqt->password;
            }else{
                $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"Mật khẩu không chính xác"]); 
                return back();
            }
        }
        if($img){
            $link = public_path("images/user/".  auth::user()->img);
            file::delete($link);
            $user->img = $img->getClientOriginalName();
            $img->move("public/images/user", $user->img);
        }
        $user->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật thông tin tài khoản thành công"]); 
        return back();
    }
}
