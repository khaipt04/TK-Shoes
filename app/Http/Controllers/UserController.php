<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(){
        return view("login");
    }
    public function postlogin(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");
        $remember = $request->input("remember");

        $user = User::getUserByEmail($email);
        $canLogin = false;

        if(isset($user)){
            $canLogin = Hash::check($password, $user->password);
        }
        if($canLogin){
            Auth::login($user, $remember);
            
            return redirect()->route("home");
        }else{
            session()->put("message","Email hoặc mật khẩu không chính xác!");
            return back();
        }
    }

    function register(){
        return view("register");
    }
    public function postregister(Request $request){
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("pass");
        $confirmpassword = $request->input("confirmPass");

        $user = User::getUserByEmail($email);

        if(isset($user)){
            session()->put("message","Email đã tồn tại!");
            return back();
        }
        if($password != $confirmpassword){
            session()->put("message","Mật khẩu không trùng khớp!");
            return back();
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        $user->save();
        return redirect()->route("login");
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route("login");
    }

    public function profile(){
        return view("profile");
    }
    public function profileupdate(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $user->name = $name;
        $user->phone = $phone;
        $user->address = $address;
        
        $user->save();
        session()->put("message","Cập nhật thành công!");

        return redirect()->route('profile');
    }

    public function changepasswordform(){
        return view("changepass");
    }
    public function changepassword(Request $request){
        $old_password = $request->input("old_password");
        $new_password = $request->input("new_password");
        $confirm_new_password = $request->input("confirm_new_password");

        $id = Auth::user()->id;
        $user = User::getUserByID($id);

        if(!Hash::check($old_password, Auth::user()->password)){
            session()->put("message","Mật khẩu cũ không chính xác!");
            return back();
        }

        if($new_password != $confirm_new_password){
            session()->put("message","Mật khẩu mới không trùng khớp!");
            return back();
        }

        $user->password = Hash::make($new_password);
        $user->save();

        session()->put("message_success", "Đổi mật khẩu thành công!");
        return back();
    }

    public function likeview(){
        $likes = Likes::where('user_id', Auth::user()->id)->get();
        $productIds = $likes->pluck('product_id');
        $products = Products::whereIn('id', $productIds)->orderBy('created_at', 'desc')->get();

        return view('like', compact('likes', 'products'));
    }
}
