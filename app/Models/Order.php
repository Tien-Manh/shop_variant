<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function orderUser(){
        return $this->hasOne(User::class, 'id', 'customer_id');
    }
    public function saleUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
