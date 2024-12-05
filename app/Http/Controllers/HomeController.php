<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\Paginator;
use App\Models\Config;
use App\Models\User;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Category;
use App\Models\MemberCard;
use App\Models\Sizedetail;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\ProductComment;
use App\Models\BlogComment;

class HomeController extends Controller
{
    function index(){
        $config = Config::all()[0];

        //lấy banner và ảnh quảng cáo
        $left_banner = Banner::where("position", "slider")->where("status", 1)->where("orders", "left")->get();
        $right_banner = Banner::where("position", "slider")->where("status", 1)->where("orders", "right")->limit(2)->get();
        $collection_area_top = Banner::where("position","like" ,"collection area")->where("status", 1)->where("orders", "top")->limit(1)->get(); 
        $collection_area_buttom = Banner::where("position", "like" , "collection area")->where("status", 1)->where("orders", "bottom")->limit(1)->get();
        $collection_banner = Banner::where("position", "like" , "collection banner")->where("status", 1)->limit(5)->get();
        $banner_list = ["left_banner" => $left_banner, "right_banner" => $right_banner, "collection_area_top" => $collection_area_top, "collection_area_buttom" => $collection_area_buttom, "collection_banner" => $collection_banner];

        // lấy các session product
        $new_product = Product::where("status", ">=", "0")->limit(4)->orderby("id", "desc")->get();
        foreach ($new_product as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }

        $top_view = Product::where("status", "!=", "0")->limit(4)->orderby("view", "desc")->get();
        foreach ($top_view as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }

        $top_sale = Product::where("status", "!=", "0")->limit(4)->orderby("promotion", "desc")->skip(1)->get();
        foreach ($top_sale as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }

        $hot_deal = Product::where("status", "!=", "0")->limit(1)->orderby("promotion", "desc")->get();
        foreach ($hot_deal as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }
        $list_product=["new_product" => $new_product, "top_view" => $top_view, "top_sale" => $top_sale, "hot_deal" => $hot_deal];

        // lấy bài viết post
        $list_post = Post::where("status", 1)->limit(3)->get();
        $list_topic = Topic::all();
        foreach ($list_post as $key => $post) {
            foreach ($list_topic as $key => $topic) {
                if($post->topic_id == $topic->id){
                    $post["topic_name"] = $topic->name;
                }
            }
        }

        // lấy ảnh cho nhẫn hàng
        $list_brand = Brand::where("status", 1)->limit(5)->orderby("id", "desc")->get();
        
        return view("FrontEnd.pages.home", compact("config", "banner_list", "list_product", "list_post", "list_brand"));
    }

    function shop(Request $rqt){
        define('ALL_MATERIAL', ['Vàng 10K', 'Vàng 14K', 'Vàng 18K', 'Vàng 20K', 'Vàng 24K']);
        $config = Config::all()[0];
        $number = $rqt->number ?? 6;
        $list_product = Product::where("status", 1)->where($rqt->category_id ?? "status", $rqt->id ?? 1)->orderby($rqt->key ?? "id", $rqt->value ?? "desc")->paginate($number);
        if(isset($rqt->min) && isset($rqt->max)){
            $list_product = Product::where("status", 1)->whereBetween('price', [$rqt->min, $rqt->max])->orderby($rqt->key ?? "id", $rqt->value ?? "asc")->paginate($number);
        }
        foreach ($list_product as $key => $value) {
            $list_product_image = Product_image::where("product_id", $value->id)->get();
            $categori_name = Category::where("id", $value->category_id)->first() ;
            $brand_name = Brand::where("id", $value->brand_id)->first();
            
             $list_product[$key]["list_image"]=$list_product_image;
             $list_product[$key]["categori_name"]=$categori_name->name;
             $list_product[$key]["brand_name"]=$brand_name->name;
             
         } 
        $list_category = Category::all();
        $list_size = Size::all();
        return view("FrontEnd.pages.shop", compact("config", "list_product", "list_category", "list_size"));
    }

    function add_to_cart(Request $rqt){
        if(!Auth::check()){
            $rqt->session()->put("messenge",["style"=>"danger", "msg"=>"Bạn phải đăng nhập trước khi chọn sản phẩm"]);
            return redirect()->route("login");
        }
        if(isset($rqt->wishlist)){
            $this->destroy_product_in_wishlist($rqt);
        }

        $product = Product::where("id", $rqt->id)->first();
        $list_img = Product_image::where("product_id", $rqt->id)->get();
        $min_size = Sizedetail::where("id_product", "$rqt->id")->orderby("change_price","asc")->limit(1)->first();
        $size_id = $rqt->size_id ?? $min_size->id_size;
        $size_number = Size::where("id", $size_id)->first();
        $size_number = $size_number->size_number;
        $size_detail = Sizedetail::where("id_product", $rqt->id)->where("id_size","$size_id")->first();
        $change_price = $size_detail-> change_price;
        
        $price_detail = ($product->price + $change_price) - ( ($product->price + $change_price) * $product->promotion / 100);

        $product["list_image"]=$list_img;
        $product["size"]=$size_number;
        $product["price_detail"]=$price_detail;

        // dd($product);
        if (!$rqt->session()->has("cart")) {
            $product["number"]= $rqt->number ?? 1;
            $cart = ["products" => [$product]];
            $rqt->session()->put("cart", $cart);
        } else {
            $cart = $rqt->session()->get("cart");
            $check = false ;
            foreach ($cart["products"] as $key => $value) {
            // dd($value);   
                if($value->id == $product->id ){
                    if($value->size == $size_number){
                        $value["number"] += $rqt->number ?? 1;
                        $check = true;
                        break;
                    }
                } 
            } 
            if(!$check ){
                $product["number"]= $rqt->number ?? 1;
                $cart["products"][]=$product;
            }  
            $rqt->session()->put("cart", $cart);
        }
        $rqt->session()->put("messenge",["style"=>"info", "msg"=>"Thêm sản phẩm vào giỏ hàng thành công"]);
        return back();
    }

    function update_cart(Request $rqt){
        
        $cart =  $rqt->session()->get('cart');
        foreach ($cart ["products"] as $key => $sp) {
            $sp->number = $rqt[("number_".$key)];
        }
        $rqt->session()->put("cart", $cart);
        return redirect()->route("checkout");
    }

    function destroy_product_in_cart(Request $rqt){
        if(isset($rqt->act) && $rqt->act == "delete_all"){
            $rqt->session()->forget("cart");
            return back();
        }else{
            $cart = $rqt->session()->get("cart");
            foreach ($cart["products"] as $key => $product) {
                // dd($product);
                if($product->id == $rqt->id){
                    unset($cart["products"][$key]);
                    break;
                }
            }
            $rqt->session()->put("cart", $cart) ;
            return back();
        }
        
    }
    
    function product_detail(Request $rqt){
        $config = Config::all()[0];
        $product = Product::where("id", $rqt->id)->first();
        $list_size = Sizedetail::where("id_product", $product->id)->get();
        $list = Size::all();
        foreach ($list_size as $key => $value) {
            foreach ($list as  $size) {
                if($value->id_size == $size->id){
                    $value["size_number"]= $size->size_number;
                }
            }
        }
        //san phẩm liên quan cùng category
        // $list_product_related =  Product::where("category_id", $product->category_id)->paginate(4);
        $list_product_related =  Product::all();
        foreach ($list_product_related as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }

        $list_img = Product_image::where("product_id", $rqt->id)->get();
        $product["list_img"] = $list_img;

        //lay binh luan
        $limit_number = ProductComment::where("product_id", $rqt->id)->get();
        $limit_number = count($limit_number)-4;
        $comments = ProductComment::where("product_id", $rqt->id)->limit(4)->orderby("id", "desc")->get();
        foreach ($comments as $key => $comment) {
            $user = user::where("id", $comment->user_id)->first();
            $comment["user_img"] = $user->img;
            $comment["user_name"] = $user->username;
        }
        $comments = $comments->reverse();
        return view("FrontEnd.pages.product_detail",compact("product", "config", "list_product_related", "list_size", "comments"));
    }

    function checkout(Request $rqt){
        $config = Config::all()[0];
        $cart = $rqt->session()->get("cart");
        $cart = $cart["products"] ?? [];
       
        $top_view = Product::where("status", "!=", "0")->limit(4)->orderby("view", "desc")->get();
        foreach ($top_view as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }
        $rank = MemberCard::where("id", Auth::user()->rank_id)->first();

        return view("FrontEnd.pages.checkout", compact("config", "cart", "top_view", "rank"));
    }
    function cart(Request $rqt){
        $config = Config::all()[0];
        $cart = $rqt->session()->get("cart");
        $cart = $cart["products"] ?? [];
       
        $top_view = Product::where("status", "!=", "0")->limit(4)->orderby("view", "desc")->get();
        foreach ($top_view as $key => $value) {
            $list_img = Product_image::where("product_id", $value->id)->get();
            $value["list_img"] = $list_img;
        }

        return view("FrontEnd.pages.cart", compact("config", "cart", "top_view"));
    }

    function register(){
        $config = Config::all()[0];

        //lấy banner và ảnh quảng cáo
        $left_banner = Banner::where("position", "slider")->where("status", 1)->where("orders", "left")->get();
        $right_banner = Banner::where("position", "slider")->where("status", 1)->where("orders", "right")->limit(2)->get();
        $collection_area_top = Banner::where("position","like" ,"collection area")->where("status", 1)->where("orders", "top")->limit(1)->get(); 
        $collection_area_buttom = Banner::where("position", "like" , "collection area")->where("status", 1)->where("orders", "bottom")->limit(1)->get();
        $collection_banner = Banner::where("position", "like" , "collection banner")->where("status", 1)->limit(5)->get();
        $banner_list = ["left_banner" => $left_banner, "right_banner" => $right_banner, "collection_area_top" => $collection_area_top, "collection_area_buttom" => $collection_area_buttom, "collection_banner" => $collection_banner];
  
        return view("FrontEnd.pages.register", compact("config", "banner_list"));
     }

    function login(){
        $config = Config::all()[0];

        //lấy banner và ảnh quảng cáo
        $left_banner = Banner::where("position", "slider")->where("status", 1)->where("orders", "left")->get();
        $right_banner = Banner::where("position", "slider")->where("status", 1)->where("orders", "right")->limit(2)->get();
        $collection_area_top = Banner::where("position","like" ,"collection area")->where("status", 1)->where("orders", "top")->limit(1)->get(); 
        $collection_area_buttom = Banner::where("position", "like" , "collection area")->where("status", 1)->where("orders", "bottom")->limit(1)->get();
        $collection_banner = Banner::where("position", "like" , "collection banner")->where("status", 1)->limit(5)->get();
        $banner_list = ["left_banner" => $left_banner, "right_banner" => $right_banner, "collection_area_top" => $collection_area_top, "collection_area_buttom" => $collection_area_buttom, "collection_banner" => $collection_banner];
  
        return view("FrontEnd.pages.login", compact("config", "banner_list"));
    }

    function logout(Request $rqt){
        Auth::logout();
        $rqt->session()->put("messenge",["style"=>"danger", "msg"=>"Đăng xuất thành công"]);
        return redirect()->route("index");
    }

    function save_order(Request $rqt){
        $order = new order;
        $order->user_id = Auth::user()->id;
        $order->status = 5;
        $order->save();
        $cart =  $rqt->session()->get('cart');
        foreach ($cart ["products"] as $key => $sp) {
           $order_detail = new Orderdetail;
           $order_detail->order_id =  $order->id;
           $order_detail->product_id = $sp->id;
           $order_detail->price = $sp->price ;
           $order_detail->quantity = $sp->number ;
           $order_detail->save();
        }
        $rqt->session()->forget("cart");
        $rqt->session()->put("messenge", ["style"=>"warning","msg"=>"Đặt đơn hàng thành "]);
        return redirect()->route("index");
    }

    function blog(Request $rqt){
        $config = Config::all()[0];
        $number = 10;
        if(isset($rqt->topic_id)){
            $blog_list = Post::where("status","!=",0)->where("topic_id",$rqt->topic_id)->orderby("id", "desc")->paginate($number);
        }else{
            $blog_list = Post::where("status","!=",0)->orderby("id", "desc")->paginate($number);
        }
        $topic = Topic::all();
        return view("FrontEnd.pages.blog", compact("config", "blog_list", "topic"));
    }
    function blog_detail(Request $rqt){
        $config = Config::all()[0];
        $blog = Post::where("id", $rqt->id)->first();
        $comments = BlogComment::where("post_id", $rqt->id)->limit(4)->get();
        foreach ($comments as $key => $comment) {
            $user = user::where("id", $comment->user_id)->first();
            $comment["user_img"] = $user->img;
            $comment["user_name"] = $user->username;
        }
        return view("FrontEnd.pages.blog_detail", compact("config", "blog","comments"));
    }

    function account(Request $rqt){
        $config = Config::all()[0];
        $member_rank = MemberCard::where("id", Auth::user()->rank_id)->first();
        return view("FrontEnd.pages.account", compact("config", "member_rank"));
    }

    function account_detail(Request $rqt){
        $config = Config::all()[0];
        return view("FrontEnd.pages.account_detail", compact("config"));
    }

    function account_orders(Request $rqt){
       $config = Config::all()[0];
       $list_order = Order::where("user_id", Auth::user()->id)->get();
       
       foreach ($list_order as $key => $order) {
            $order_detail = Orderdetail::where("order_id", $order->id)->get();
            $price = 0 ;
            foreach ($order_detail as $detail) {
                $price += $detail->price;
            }
            $order["sumprice"] = $price;
        }
       return view("FrontEnd.pages.account_orders", compact("config", "list_order"));
    }

    function view_orders(Request $rqt){
        $config = Config::all()[0];
        $list_id_product = Orderdetail::where("order_id", $rqt->id)->get();
        $list_product = [];
        foreach ($list_id_product as $key => $value) {
            $product = Product::where("id", $value->product_id)->first();
            $img = Product_image::where("product_id", $product->id)->first();
            $product["img"]= $img;
            $quantity = Orderdetail::where("product_id",$product->id)->where("order_id", $rqt->id)->first();
            $product->quantity = $quantity->quantity;
            $list_product[]=$product;
        }
        // dd($list_product);
        
        return view("FrontEnd.pages.view_orders", compact("config", "list_product"));
     }

     function wishlist(Request $rqt){
        $config = Config::all()[0];
        $wishlist = $rqt->session()->get("wishlist");
        if($wishlist){
            $wishlist = $wishlist["products"];
        }
        return view("FrontEnd.pages.wishlist", compact("config", "wishlist"));
    }

     function add_to_wishlist(Request $rqt){
        $product = Product::where("id", $rqt->id)->first();
        $list_img = Product_image::where("product_id", $rqt->id)->get();        
        $product["list_image"]=$list_img;
        if (!$rqt->session()->has("wishlist")) {
            $wishlist = ["products" => [$product]];
            $rqt->session()->put("wishlist", $wishlist);
        } else {
            $wishlist = $rqt->session()->get("wishlist");
            $check = false ;
            foreach ($wishlist["products"] as $key => $value) {  
                if($value->id == $product->id ){
                        $check = true;
                } 
            } 
            if(!$check ){
                $wishlist["products"][]=$product;
            }  
            $rqt->session()->put("wishlist", $wishlist);
        }
        $rqt->session()->put("messenge",["style"=>"info", "msg"=>"Thêm vào danh sách yêu thích thành công"]);
        return back();
    }


     function destroy_product_in_wishlist(Request $rqt){
        if(isset($rqt->act) && $rqt->act == "delete_all"){
            $rqt->session()->forget("wishlist");
            return back();
        }else{
            $wishlist = $rqt->session()->get("wishlist");
            foreach ($wishlist["products"] as $key => $product) {
                // dd($product);
                if($product->id == $rqt->id){
                    unset($wishlist["products"][$key]);
                    break;
                }
            }
            $rqt->session()->put("wishlist", $wishlist) ;
            return back();
        }
        
    }

    function search(Request $rqt){
        $keyword = $rqt->keyword;
        $config = Config::all()[0];
        $number = 9;
        if(isset($rqt->act) && $rqt->act == "blog"){
            $topic = Topic::all();
            $blog_list = Post::where("status","!=",0)->where("title","like", '%' . $keyword . '%')->orderby("id", "desc")->paginate($number);
            return view("FrontEnd.pages.blog", compact("config", "blog_list", "topic"));
        }else{
            $list_product = Product::where("status", "!=", "0")->where("name", "like", '%' . $keyword . '%')->orderby("id", "desc")->paginate($number);
            foreach ($list_product as $key => $value) {
                $list_img = Product_image::where("product_id", $value->id)->get();
                $value["list_img"] = $list_img;
            }
            return view("FrontEnd.pages.product_search", compact("config", "list_product", "keyword"));
        }

    }

    function contact(Request $rqt){
        $config = Config::all()[0];
        return view("FrontEnd.pages.contact", compact("config"));
    }
}
