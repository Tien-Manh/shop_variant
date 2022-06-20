<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Attribute;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'products_detail';
    public function attributeValues(){
        return $this->hasMany(PrdetailAttvalue::class, 'product_detail_id');
    }
    public function product(){
        return $this->hasOne(Product::class,'id', 'product_id');
    }
    public function attributeValue($attr){
        $id = $this->id;
        return PrdetailAttvalue::where('product_detail_id', $id)->where('attribute_id', $attr)->first();
    }
    public function getValueAttibute($attr){
        return AttributeValue::find($this->attributeValue($attr)->attribute_value_id);
    }
    public function wishList(){
        return $this->hasMany(WishList::class, 'product_id');
    }

}
