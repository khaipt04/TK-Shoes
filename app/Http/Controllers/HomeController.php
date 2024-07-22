<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        $bestseller = Products::BestSellerProducts();
        $new = Products::NewProducts();
        $sale = Products::SaleProducts();

        $products = Products::AllProducts();

        if(Auth::check()){
            foreach ($products as $product) {
                $isLiked[$product->id] = Likes::where('user_id', Auth::user()->id)->where('product_id', $product->id)->exists();
            }
        }else{
            foreach ($products as $product) {
                $isLiked[$product->id] = false;
            }
        }
        // dd($isLiked);

        return view("home", compact("bestseller", "new", "sale", "isLiked"));
        // return view("home");
    }
}
