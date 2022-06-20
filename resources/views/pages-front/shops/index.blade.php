@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Products')}}</title>
@endsection
@section('banner')
    @include('includes-front.bannersection')
@endsection
@section('content')
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{route('shop')}}" class="data-route">
                                <input id="key-search" type="text" placeholder="{{__('Search...')}}">
                                <button type="button"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        @include('includes-front.sidebar')
                    </div>
                </div>
                <div class="col-lg-9 show-ajax">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>{{__('Showing')}} {{__('page')}} {{$products->currentPage()}} {{__('has')}} {{$products->count()}} {{__('of')}} {{$products->total()}} {{__('results')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($products && $products->count() > 0)
                            @foreach($products as $product)
                                @php
                                    $productDetail = $product->productDetail()->where('is_default', 1)->first();
                                     $salePrice = \App\Models\Coupon::getSaleProduct($productDetail->id);
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6 showpProduct">
                                    <div
                                        class="product__item @if($salePrice > 0 && $salePrice < $productDetail->price)sale @endif">
                                        <div class="stock-show">
                                            @if($productDetail->sub_quantity <= 0)
                                                <div class="oustock-in">
                                                    <h6>{{__('Out of stock')}}</h6>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product__item__pic set-bg"
                                             data-setbg="{{asset('storage/'.$productDetail->photo_thumb)}}">
                                            @if($salePrice > 0 && $salePrice < $productDetail->price)
                                                <span class="label">{{__('Sale')}}</span>
                                            @endif
                                            <ul class="product__hover">
                                                <li>
                                                    @if(Auth::user() && !empty($productDetail->wishList()->where('user_id', Auth::user()->id)->first()->user_id)
                                                  && $productDetail->wishList()->where('user_id', Auth::user()->id)->first()->user_id == Auth::user()->id)
                                                        <a class="add-wishlist"
                                                           href="{{route('wishlist.save', [$productDetail->id])}}"><img
                                                                src="{{asset('front_asset/img/icon/heart-like.png')}}"
                                                                alt="">
                                                        </a>
                                                    @else
                                                        <a class="add-wishlist"
                                                           href="{{route('wishlist.save', [$productDetail->id])}}"><img
                                                                src="{{asset('front_asset/img/icon/heart.png')}}"
                                                                alt="">
                                                        </a>
                                                    @endif
                                                </li>
                                                {{--                                                <li><a href="#"><img src="{{asset('front_asset/img/icon/compare.png')}}" alt=""> <span>Compare</span></a>--}}
                                                {{--                                                </li>--}}
                                                <li><a href="{{route('product.detail', [$product->slug])}}"><img
                                                            src="{{asset('front_asset/img/icon/detail.png')}}"
                                                            alt=""></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6>{{$product->title}}</h6>
                                            @if($productDetail->sub_quantity > 0)
                                                <a href="{{route('add.cart', [$productDetail->id])}}"
                                                   class="add-cart">+ {{__('Add To Cart')}}</a>
                                            @else
                                                <a href="javascript:void(0)"
                                                   class="add-cart">+ {{__('Add To Cart')}}</a>
                                            @endif
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            @if($salePrice > 0 && $salePrice < $productDetail->price)
                                                <span class=mb-1"><del>{{number_format($productDetail->price,0,0,'.')}}</del> VNĐ</span>
                                                <h5>{{number_format($salePrice,0,0,'.')}} VNĐ</h5>
                                            @else
                                                <h5>{{number_format($productDetail->price,0,0,'.')}} VNĐ</h5>
                                            @endif
                                            @foreach($product->productAttributes as $ar)
                                                @foreach($ar->attributes()->get() as $r)
                                                    @if(in_array(strtolower($r->name), array_map('strtolower', ['color', 'colors'])))
                                                        <div class="product__color__select">
                                                            @foreach($ar->attrbuteValues() as $color)
                                                                <label data-url="{{route('shop')}}"
                                                                       product-id="{{$product->id}}"
                                                                       attribute-value-id="{{$color->id}}"
                                                                       attr-id="{{$r->id}}"
                                                                       class="{{str_replace(' ', '-', $color->value)}}@if($productDetail->attributeValue($r->id)->attribute_value_id == $color->id) active @endif"
                                                                       for="pc_{{$productDetail->id}}_{{$color->id}}">
                                                                    <input type="radio"
                                                                           id="pc_{{$productDetail->id}}_{{$color->id}}"
                                                                           name="color_{{$productDetail->id}}">
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5 class="m-auto">{{__('There are currently no products')}}</h5>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{$products->onEachSide(2)->links('pages-front.paginate.custom')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>{{__('Latest News')}}</span>
                        <h2>{{__('Fashion New Trends')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{asset('storage/'.$post->photo)}}"></div>
                            <div class="blog__item__text">
                                <span><img src="{{asset('front_asset/img/icon/calendar.png')}}" alt="">{{date_format($post->created_at,"d-m-Y H:i:s")}}</span>
                                <h5>{{Str::limit($post->title, 50, '  . . .')}}</h5>
                                <a href="{{route('blog.detail', [$post->slug])}}">{{__('Read More')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
