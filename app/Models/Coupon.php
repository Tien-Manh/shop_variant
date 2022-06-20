<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public function itemCoupon(){
        return $this->hasMany(ItemCoupon::class, 'coupon_id');
    }

    public static function getSaleProduct($product_id){
        $getPrice = 0;
        $now = Carbon::now();
        $productDetail = ProductDetail::find($product_id);
        if ($productDetail->sell_price > 0 && $productDetail->sell_prcie < $productDetail->price){
            $getPrice = $productDetail->sell_price;
        }
        else{
            $product = $productDetail->product;
            $coupons = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                ->where('coupons.status', 1)->where('coupons.type_coupon', 'products')->where('item_coupons.item_id', $product->id)->first();
            if(!$coupons){
                $cateIds = $product->cates->pluck('id');
                $coupons = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                    ->where('coupons.status', 1)->where('type', 'percent price')->where('coupons.type_coupon', 'categories')
                    ->whereIn('item_coupons.cate_id', $cateIds)->orderBy('price_value', 'desc')->first();
                if(!$coupons){
                    $coupons = Coupon::join('item_coupons', 'coupons.id', '=', 'item_coupons.coupon_id')
                        ->where('coupons.status', 1)->where('type', 'fixed price')->where('coupons.type_coupon', 'categories')
                        ->whereIn('item_coupons.cate_id', $cateIds)->orderBy('price_value', 'desc')->first();
                }
            }
            if ($coupons){
               if (($coupons->date_start <= $now && $coupons->date_end >= $now)
                   || ($coupons->date_start <= $now && $coupons->date_end == null)
                   || ($coupons->date_start == null && $coupons->date_end == null)
               ){
                   if ($coupons->type == 'percent price'){
                       $getPrice = $productDetail->price * ((100 - $coupons->price_value) / 100);
                   }
                   else{
                       $getPrice = $productDetail->price - $coupons->price_value;
                   }
               }
            }
        }
        return $getPrice;
    }
}
