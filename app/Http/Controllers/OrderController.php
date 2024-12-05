<?php

namespace App\Http\Controllers;

use App\Models\MemberCard;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
   

    function index(Request $rqt) {
        $number = 7;

        if (isset($rqt->act)) {
            $list_order = order::where("status", 4)->orderby("id", "desc")->paginate($number);
        } else {
            $list_order = order::where("status", "!=", 4)->orderby("id", "desc")->paginate($number);
        }

        $member_card = membercard::all();

        $modifiedListOrder = new Collection();

        foreach ($list_order as $key => $order) {
            $user = user::where("id", $order->user_id)->first();
            $order["user"] = $user;

            $order_detail = Orderdetail::where("order_id", $order->id)->get();
            $list_product = [];

            foreach ($order_detail as $detail) {
                $product = product::where("id", $detail->product_id)->first();
                $product["price_detail"] = $detail->price;
                $list_product[] = $product;
            }

            $order["list_product"] = $list_product;

            $modifiedListOrder->push($order);
        }

        
        $list_order = new \Illuminate\Pagination\LengthAwarePaginator(
            $modifiedListOrder,
            $list_order->total(),
            $list_order->perPage(),
            $list_order->currentPage(),
            ['path' => $list_order->url($list_order->currentPage())]
        );

        if (isset($rqt->act)) {
            return view("BackEnd/pages/order/file_save", compact("list_order", "member_card"));
        }

        return view("BackEnd/pages/order/list_order", compact("list_order", "member_card"));
    }


    function change_stutus(Request $rqt){
        $order = order::where("id", $rqt->id)->first();
        $order->status = $rqt->status;
        $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Cập nhật trạng thái đơn hàng thành công"]);
        if($rqt->status == 4){
            $rqt->session()->put("messenge",["style"=>"success", "msg"=>"Đơn hàng đã được lưu trữ vì đã đến tay người tiêu dùng"]);
        }
        $order->save();
        return back();
    }

    function destroy(Request $rqt){
        
        $order = Order::firt($rqt->id);
        dd($order);
    }
}
