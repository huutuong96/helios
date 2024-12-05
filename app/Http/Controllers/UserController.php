<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\MemberCard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;
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
                // Auth::loginUsingId($user->id, true);
                $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Đăng nhập thành công "]); 
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
        
        $img =$rqt->file("img");
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
            if( Hash::check($rqt->cpassword, auth::user()->password)){
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
            $img->move("public/images/user", $img->getClientOriginalName());
        }
        $user->save();
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Cập nhật thông tin tài khoản thành công"]); 
        return back();
    }
    public function inputEmail(){
        $config = Config::all()[0];
        return view('FrontEnd.pages.input_email', compact('config'));
    }
    public function newPassword(Request $rqt){
        $config = Config::all()[0];
        $validator = Validator::make($rqt->all(),[
            'email' => 'email|exists:users,email',
        ],[
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($rqt->input());
        };
        $user = User::where('email', $rqt->email ?? $rqt->session()->get('email'))->first();
        $rqt->session()->put('email', $user->email);
        // dd($rqt);
        $token = strtoupper(Str::random(10));
        $user->update(["token" => $token]);
        Mail::to($user->email)->send(new GuiEmail($user));
        return view('FrontEnd.pages.new_password', compact('config'));
    }
    public function handleNewPassword(Request $rqt){
        $validator = Validator::make($rqt->all(), [
            'token' =>'exists:users,token',
            'password' => 'confirmed',
        ],[
            'token.exists' =>'Vui lòng nhập lại token mới vì có người đang thử dò token của bạn',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
        if ($validator->fails()) {
            return redirect()->route("new_password")
                             ->withErrors($validator)
                             ->withInput();
        } 
        $rqt->session()->forget('email');
        // Update the user's password
        $user = user::where("token", "=", $rqt->token)->first();
        if($user && now()->diffInHours($user->updated_at) >= 1){
            return redirect()->route('input_email');
        }
 
        $password = Hash::make($rqt->password);

        $user->update(["password" => $password]);
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Tạo mật khẩu mới thành công"]);
        return redirect()->route('login');
    }
}
