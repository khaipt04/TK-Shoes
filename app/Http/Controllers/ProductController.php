<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // function products(){
    //     $all = Products::AllProducts();
    //     return view("products", compact("all"));
    // }

    function detail(Request $request){
        $product_id = $request->product_id;
        if($product_id>0){
            $product = Products::getProductsById($product_id)->get();
        }
        $isLiked = false;
        if(Auth::check()){
            $isLiked = Likes::where('user_id', Auth::user()->id)->where('product_id', $product_id)->exists();
        }
        return view('detail', compact('product', 'isLiked'));
    }

    function get_products_category(Request $request){
        $category_id = $request->category_id;
        if($category_id>0){
            $products = Products::getProductsByCategory($category_id)->paginate(9);
        }else{
            $products = Products::paginate(9);
        }
        $categories= Categories::AllCategories();
        if(Auth::check()){
            foreach ($products as $product) {
                $isLiked[$product->id] = Likes::where('user_id', Auth::user()->id)->where('product_id', $product->id)->exists();
            }
        }else{
            foreach ($products as $product) {
                $isLiked[$product->id] = false;
            }
        }
        return view('products', compact('products', 'categories', 'isLiked'));
    }

    function get_products_brand(Request $request){
        $brand_id = $request->brand_id;
        if($brand_id>0){
            $products = Products::getProductsByBrand($brand_id)->paginate(9);
        }else{
            $products = Products::paginate(9);
        }
        $brands= Brands::AllBrands();
        if(Auth::check()){
            foreach ($products as $product) {
                $isLiked[$product->id] = Likes::where('user_id', Auth::user()->id)->where('product_id', $product->id)->exists();
            }
        }else{
            foreach ($products as $product) {
                $isLiked[$product->id] = false;
            }
        }
        return view('products', compact('products', 'brands', 'isLiked'));
    }

    function search(Request $request){
        $keyword = $request->keyword_submit;
        $products = Products::getProductsByKeyWord($keyword)->paginate(9);
        if(Auth::check()){
            foreach ($products as $product) {
                $isLiked[$product->id] = Likes::where('user_id', Auth::user()->id)->where('product_id', $product->id)->exists();
            }
        }else{
            foreach ($products as $product) {
                $isLiked[$product->id] = false;
            }
        }
        return view('search', compact('products', 'isLiked'));
    }
}
