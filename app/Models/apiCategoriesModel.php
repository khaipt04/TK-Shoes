<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiCategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function apiProductsModel(){
        return $this->hasMany(apiProductModel::class, 'category_id');
    }
}

