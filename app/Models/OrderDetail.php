<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function orders(){
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function productDetails(){
        return $this->hasOne(ProductDetail::class, 'id', 'product_id');
    }
}
