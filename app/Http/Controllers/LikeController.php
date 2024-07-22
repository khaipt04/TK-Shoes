<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request){
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        $isLiked = false;
        $isLiked = Likes::where('user_id', $user_id)->where('product_id', $product_id)->exists();

        if($isLiked){
            $like = Likes::where('user_id', $user_id)->where('product_id', $product_id)->first();
            $like->delete();
            return redirect()->back();
        }else{
            $like = new Likes();
            $like->user_id = $user_id;
            $like->product_id = $product_id;
            $like->save();
            return redirect()->back();
        }
    }
}
