<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function orders(){
        $orders_pending = Orders::with('orderDetails.product')
        ->where('user_id', Auth::user()->id)->where('status', 'Đang chờ')->orderBy('created_at', 'desc')->get();

        $orders_shipping = Orders::with('orderDetails.product')
        ->where('user_id', Auth::user()->id)->where('status', 'Đang giao hàng')->orderBy('updated_at', 'desc')->get();
        
        $orders_success = Orders::with('orderDetails.product')
        ->where('user_id', Auth::user()->id)->where('status', 'Giao hàng thành công')->orderBy('updated_at', 'desc')->get();
        
        $orders_cancle = Orders::with('orderDetails.product')
        ->where('user_id', Auth::user()->id)->where('status', 'Đã hủy')->orderBy('updated_at', 'desc')->get();
        
        return view("order", compact('orders_pending', 'orders_shipping', 'orders_success', 'orders_cancle'));
    }

    public function ordercancle(Request $request){
        $id = $request->order_id;
        $status = 'Đã hủy';

        $order = Orders::findOrFail($id);
        $order->status = $status;
        $order->save();
        
        return redirect()->back();
    }
}
