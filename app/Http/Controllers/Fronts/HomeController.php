<?php

namespace App\Http\Controllers\Fronts;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $bestSales = OrderDetail::select(DB::raw('count(*) as product_id_count, product_id'))
            ->groupBy('product_id')->orderBy('product_id_count', 'desc')->limit(200)->pluck('product_id');
        $idToString = implode(', ' , $bestSales->toArray());
        $getproductIds = ProductDetail::whereIn('id', $bestSales)->where('status', 1)
            ->orderByRaw("FIELD(id , $idToString)")->distinct()->limit(30)->pluck('product_id');
        $product_sales = Product::whereIn('id', $getproductIds)->where('status', 1)->get();
        return view('pages-front.index',  compact('product_sales'));
    }
}
