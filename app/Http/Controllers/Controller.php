<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main(){
        $products = Product::all();
        $cates = Cate::all();
        $posts = Post::all();
        $orders = Order::all();
        return view('pages.index', compact('products', 'cates', 'posts', 'orders'));
    }
    public function swichLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
