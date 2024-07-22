<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'price_sale', 'color', 'quantity', 'category_id', 'brand_id', 'image'];
    
    public function apiCategoriesModel(){
        return $this->belongsTo(apiCategoriesModel::class, 'category_id');
    }
}


