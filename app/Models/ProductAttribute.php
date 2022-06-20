<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    public function attributes(){
        return $this
            ->hasOne(Attribute::class, 'id', 'attribute_id')->where('type', 'filters');
    }
    public function attributesDefault(){
        return $this
            ->hasOne(Attribute::class, 'id', 'attribute_id');
    }
    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public  function productDetailDefault(){
        $product_id = $this->product_id;
        $attribute_id = $this->attribute_id;
        $id = ProductDetail::where('product_id', $product_id)->where('is_default', 1)->first();
        return PrdetailAttvalue::where('product_detail_id', $id->id)->where('attribute_id', $attribute_id)->first();
    }
    public function attrbuteValues(){
        $item_ids = $this->product->productDetail->pluck('id')->toArray();
        $attribute_id = $this->attribute_id;
        $attrs = PrdetailAttvalue::wherein('product_detail_id', $item_ids)
            ->where('attribute_id', $attribute_id)->get()->unique('attribute_value_id')->pluck('attribute_value_id')->toArray();
        return AttributeValue::wherein('id', $attrs)->get();
    }
    public function attrbuteValuesAll(){
        $attribute_id = $this->attribute_id;
        return AttributeValue::where('attribute_id', $attribute_id)->get();
    }
}
