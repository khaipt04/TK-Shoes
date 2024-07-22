<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
