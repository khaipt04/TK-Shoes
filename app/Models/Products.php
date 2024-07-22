<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['name', 'price', 'price_sale', 'color', 'quantity', 'category_id', 'brand_id', 'image'];

    public function scopeAllProducts($query){
        return $query->get();
    }

    public function scopeNewProducts($query){
        return $query->orderBy('created_at', 'desc')->limit(4)->get();
    }

    public function scopeBestSellerProducts($query){
        return $query->orderBy('sold', 'desc')->limit(8)->get();
    }
    
    public function scopeSaleProducts($query){
        return $query->where('price_sale', '>', 0)->limit(8)->get();
    }

    public static function getProductsByCategory($category_id)
    {
        return self::where('category_id', $category_id);
    }
    public static function getProductsByBrand($brand_id)
    {
        return self::where('brand_id', $brand_id);
    }

    public static function getProductsById($product_id)
    {
        return self::where('id', $product_id);
    }

    public static function getProductsByKeyWord($keyword)
    {
        return self::where('name','LIKE','%'. $keyword .'%');
    }
}
