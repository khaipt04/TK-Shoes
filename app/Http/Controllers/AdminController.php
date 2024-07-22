<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;

class AdminController extends Controller
{
    function index(){
        return view("admin.index");
    }

    function products(){
        $all = Products::orderBy('id', 'desc')->get();
        return view("admin.products", compact("all"));
    }

    function productadd(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'color' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/product_img'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $product = Products::create($validatedData);

        return redirect()->route('admin_products');
    }

    function productdelete(Request $request){
        $id = $request->product_id;
        $product = Products::find($id);

        $imgpath="img/product_img/".$product->image;
        // echo $imgpath;
        if(file_exists($imgpath)){
            unlink($imgpath);
        }
        $product->delete();
        return redirect()->route('admin_products');
    }
    public function productupdateform($product_id) {
        $product = Products::findOrFail($product_id);
        $categories = Categories::AllCategories();
        $brands = Brands::AllBrands();
        return view('admin.productupdateform', compact('product', 'categories', 'brands'));
    }

    public function productupdate(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'color' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $id = $request->product_id;
        $product = Products::findOrFail($id);

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/product_img'), $imageName);
            $validatedData['image'] = $imageName;
            $oldImagePath = public_path('img/product_img/'.$product->image);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }
        }
       
        $product->update($validatedData);

        return redirect()->route('admin_products');
    }

    function order(){
        $orders_pending = Orders::with('orderDetails.product')
        ->where('status', 'Đang chờ')->orderBy('created_at', 'desc')->get();

        $orders_shipping = Orders::with('orderDetails.product')
        ->where('status', 'Đang giao hàng')->orderBy('updated_at', 'desc')->get();

        $orders_success = Orders::with('orderDetails.product')
        ->where('status', 'Giao hàng thành công')->orderBy('updated_at', 'desc')->get();

        $orders_cancle = Orders::with('orderDetails.product')
        ->where('status', 'Đã hủy')->orderBy('updated_at', 'desc')->get();
        
        return view("admin.order", compact('orders_pending', 'orders_shipping', 'orders_success', 'orders_cancle'));
    }

    public function orderdetail($order_id){
        $order = Orders::with('orderDetails.product')->findOrFail($order_id);
        return view('admin.orderdetail', compact('order'));
    }
    public function orderaccept(Request $request){
        $id = $request->order_id;
        $status = 'Đang giao hàng';

        $order = Orders::findOrFail($id);
        $order->status = $status;
        $order->save();
        
        return redirect()->back();
    }
    public function ordersuccess(Request $request){
        $id = $request->order_id;
        $status = 'Giao hàng thành công';

        $order = Orders::findOrFail($id);
        $order->status = $status;
        $order->save();
        
        return redirect()->back();
    }

    function category(){
        return view("admin.category");
    }

    function user(){
        $all = User::allUsers();
        return view("admin.user", compact("all"));
    }
    function useradd(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'password' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'condition' => 'required|numeric',
            'role' => 'required|numeric',
        ]);

        $user = User::create($validatedData);

        return redirect()->route('admin_user');
    }
    public function userupdateform($user_id) {
        $user = User::findOrFail($user_id);
        return view('admin.userupdateform', compact('user'));
    }
    public function userupdate(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'password' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'condition' => 'required|numeric',
            'role' => 'required|numeric',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $id = $request->user_id;
        $user = User::findOrFail($id);

        $user->update($validatedData);

        return redirect()->route('admin_user');
    }
}
