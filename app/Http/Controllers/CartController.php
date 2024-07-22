<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart(){
        $products = [];
        if(is_null(Session::get('cart'))){
            Session::put('cart', []);
        }else{
            $cart = Session::get('cart');
            $product_id = array_keys($cart);
            $products = Products::whereIn('id', $product_id)->get();
        }
        // Session::forget("cart");
        return view('cart', compact('products'));
    }

    public function addtocart(Request $request)
    {   
        // Session::forget("cart");
        $product_id = $request->product_id;
        $product_quantity = $request->input('quantity', 1);

        //kiem tra gio hang da ton tai chua?
        if(is_null(Session::get('cart'))){
            Session::put('cart', [
                $product_id => $product_quantity
            ]);
        }else{
            $cart = Session::get('cart');
            if(Arr::exists($cart, $product_id)){ //da ton tai sp trong gio hang
                $cart[$product_id] += $product_quantity;
                Session::put('cart', $cart);
                return redirect()->back()->with('message', 'Đã thêm sản phẩm vào giỏ hàng!');
            }else{
                $cart[$product_id] = $product_quantity;
                Session::put('cart', $cart);
                return redirect()->back()->with('message', 'Đã thêm sản phẩm vào giỏ hàng!');
            }
        }
    }

    public function deletecart(Request $request){
        $cart = Session::get('cart');
        $product_id = $request->id;
        unset($cart[$product_id]);
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }

    public function checkout(Request $request){
        $order = new Orders();
        $order->user_id = (Auth::check()) ? Auth::user()->id : null; 
        $order->user_name = $request->user_name;
        $order->user_email = $request->user_email;
        $order->user_phone = $request->user_phone;
        $order->user_address = $request->user_address;
        $order->total_money = 0;
        $order->total_quantity = 0;
        $order->save();

        $cart = Session::get('cart');
        $product_id = array_keys($cart);
        $products = Products::whereIn('id', $product_id)->get();

        foreach($products as $product){
            $order_detail = new OrderDetails();

            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product->id;
            $order_detail->quantity = $cart[$product->id];
            $order_detail->price = is_null($product->price_sale) ? $product->price : $product->price_sale;
            $order_detail->save();

            $order->total_money += $order_detail->quantity * $order_detail->price;
            $order->total_quantity += $order_detail->quantity;
        }
        $order->save();

        Session::forget("cart");
        return redirect()->route('checkoutdone');
    }

    public function checkoutdone(){
        return view('thanks');
    }
}
