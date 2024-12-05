<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;

class DashboardContronller extends Controller
{
    function index(){
        $user = user::where("status" , 1)->get();
        $category = category::where("status" , 1)->get();
        $order = order::where("status" , 5)->get();
        $sumProduct = product::where("status" , 1)->get();

        //thống kê sản phẩm theo danh mục
        $count_product_by_categori= [['Tên', 'Sản phẩm']];
        foreach ($category as $key => $value) {
            $count_product = product::where("status" , 1)->where("category_id" , $value->id)->get();
            $count_product_by_categori[]=[$value->name,count($count_product)];
            
        }
        //thống kê số lượng sản phẩm đã bán ra theo danh mục
        $count_product_by_order= [['Trạng thái', 'Sản phẩm']];
        foreach ($category as $key => $value) {
            $sum = 0;
            $Order = Order::where("status" ,4)->get();
            foreach ($Order as $ke => $va) {
                $products = Orderdetail::where("order_id" , $va->id)->get();
                foreach ($products as $k => $v) {
                    $product = product::where("id",$v->product_id)->first();
                    if($product->category_id == $value->id){
                        ++$sum;
                    }
                }
            }
            $count_product_by_order[]=[$value->name,$sum];
        }

        return view("BackEnd.pages.dashboard", compact("user", "category", "order", "sumProduct", "count_product_by_categori", "count_product_by_order"));
    }
}
