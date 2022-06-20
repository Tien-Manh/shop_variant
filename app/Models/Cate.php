<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    use HasFactory;

    public $couProducts = [];

    public function cateID()
    {
        return $this->hasOne(Cate::class, 'id', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, ProductCate::class, 'cate_id', 'product_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, PostCate::class, 'cate_id', 'post_id');
    }

    public function childCates($id)
    {
        array_push($this->couProducts, $id);
        $cates = Cate::where('parent_id', $id)->get();
        foreach ($cates as $cate) {
            $newid = $cate->id;
            array_push($this->couProducts, $newid);
            if ($newid) {
                $this->childCates($newid);
            }
        }
        return $this->couProducts;
    }

    public function getItemProducts(){
        $getId  = $this->childCates($this->id);
        $products = ProductCate::whereIn('cate_id', $getId)->get();
        return $products;
    }
    public function countItems()
    {
        $getId  = $this->childCates($this->id);
        $cproductIds = ProductCate::whereIn('cate_id', $getId)->get();
        $products = Product::whereIn('id', $cproductIds->pluck('product_id'))->where('status',1)->pluck('id');
        return count($products);
    }
//    public function categories()
//    {
//        return $this->hasMany(Cate::class,'parent_id', 'id');
//    }

    public function childCate()
    {
        return $this->hasMany(Cate::class, 'parent_id');
    }
}
