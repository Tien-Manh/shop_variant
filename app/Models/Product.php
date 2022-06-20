<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function cates(){
        return $this->belongsToMany(Cate::class, ProductCate::class, 'product_id', 'cate_id')->withTimestamps();
    }
    public function productDetail(){
        return $this->hasMany(ProductDetail::class, 'product_id');
    }
    public function productAttributes(){
        return $this->hasMany(ProductAttribute::class, 'product_id');
    }
    public function productsImages(){
        return $this->hasMany(ProductsPhoto::class, 'product_id');
    }
}
