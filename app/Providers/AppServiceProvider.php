<?php

namespace App\Providers;

use App\Models\Attribute;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Cate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        View::share('products', Product::alll()) user  bien ra compact controller => one page
        view()->composer('includes-front.sidebar', function ($view){
            $cates = Cate::where('status', 1)->where('parent_id', 0)->where('type', 'cate product')->get();
            $brands = Brand::where('status', 1)->get();
            $view->with('cates', $cates)->with('brands', $brands);
        });

        view()->composer('includes-front.footer', function($view){
            $blogs_footer = Post::whereHas('cates', function ($query){
                $query->where('type', 'cate footer');
            })->orderBy('id', 'desc')->get();
            $blogs_footer = $blogs_footer->chunk(3);
            $view->with('blogs_footer', $blogs_footer);
        });

        view()->composer('includes-front.bannersection', function($view){
            $baners = Banner::where('status', 1)->inRandomOrder()->get();
            $view->with('baners', $baners);
        });

        view()->composer('includes-front.sidebar', function($view){
            $attributeSizes = Attribute::where('type', 'filters')->where('name', 'size')->orwhere('name', 'sizes')->get();
            $attributeColors = Attribute::where('type', 'filters')->where('name', 'color')->orwhere('name', 'colors')->get();
            $view->with('attributeSizes', $attributeSizes)->with('attributeColors', $attributeColors);
        });

        view()->composer('*', function($view){
            $settings = Setting::select('key', 'value')->get();
            $configs = [];
            foreach ($settings as $key => $value){
                $configs[$value->key] = $value->value;
            }
            $view->with('configs', $configs);
        });
        Paginator::useBootstrap();
    }
}
