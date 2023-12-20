<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Topic;

class MenuController extends Controller
{
    function index(){
        $category = category::all();
        $topic = topic::all();
        $menu = [];

        $header_menu =  menu::where("type", "like", "headermenu")->orderby("orders", "ASC")->get() ; 
        $mega_menu =  menu::where("type", "like", "megamenu")->orderby("orders", "ASC")->get() ; 
        $footer_menu =  menu::where("type", "like", "footermenu")->orderby("orders", "ASC")->get() ; 
       
        $menu = ["header_menu" => $header_menu, "mega_menu"=> $mega_menu, "footer_menu"=> $footer_menu ];

        return view("BackEnd.pages.menu.show", compact("category", "topic", "menu"));
    }

    

    function creat_menu(Request $rqt){
        $category_all = category::all();
        $topic_all = topic::all();
        $topic = $rqt->itemtopic;
        $category = $rqt->itemcat;
        $type = $rqt->position;
       
        if(isset($topic)){
            
            foreach ($topic as $key => $value) { //lọc qua id các item đã chọn
                foreach ($topic_all as $k => $v) {// lọc qua all để lấy thông tin trùng vs id
                    if($value == $v->id){
                        $menu_chirend = menu::where("type","like", $type);
                        $check = true;
                        foreach ($menu_chirend as $item) {// kiểm tra xem đã tồn tại hay chưa
                            if($item->name == $v->name){
                                $check = false;
                                $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"danh mục này đã tồn tại"]);
                                return back();
                            }
                        }
                        $menu = new menu;

                        $menu->name = $v->name;
                        $menu->type = $type;
                        $menu->link = null;
                        $menu->table_id = null;
                        $menu->parent_id = 0;
                        $menu->orders = 0;
                        $menu->position = $type;
                        $menu->status = 1;

                        $menu->save();
                    }
                }
                
            }
        } 
        if(isset($category)){
            // dd("ok");
            foreach ($category as $key => $value) { //lọc qua id các item đã chọn
                foreach ($category_all as $k => $v) {// lọc qua all để lấy thông tin trùng vs id
                    if($value == $v->id){
                        $menu_chirend = menu::where("type","like", $type);
                        foreach ($menu_chirend as $item) {// kiểm tra xem đã tồn tại hay chưa
                            if($item->name == $v->name){ 
                                $rqt->session()->put("messenge", ["style"=>"danger","msg"=>"danh mục này đã tồn tại"]);
                                return back();
                            }
                        }
                        $menu = new menu;

                        $menu->name = $v->name;
                        $menu->type = $type;
                        $menu->link = null;
                        $menu->table_id = null;
                        $menu->parent_id = 0;
                        $menu->orders = 0;
                        $menu->position = $type;
                        $menu->status = 1;

                        $menu->save();
                    }
                }
                
            }
        }        
        $rqt->session()->put("messenge", ["style"=>"success","msg"=>"Thêm item vào menu thành công"]);
        return redirect()->route("show_menu");
    }

    function destroy(Request $rqt){
        $menu = menu::where("id", $rqt->id)->first();
        $menu->delete();
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Xóa danh mục thành công"]);
        return back();
    }
}