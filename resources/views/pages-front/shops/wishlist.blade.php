@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Wishlist')}}</title>
@endsection
@section('content')
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 show-ajax">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($productsDetails ) && $productsDetails->count() > 0)
                            @foreach($productsDetails as $productDetail)
                                @php
                                    $product = $productDetail->product;
                                     $salePrice = \App\Models\Coupon::getSaleProduct($productDetail->id);
                                @endphp
                                <div class="col-lg-3 col-md-4 col-sm-6 showpProduct">
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
                                            @if($salePrice > 0 && $salePrice < $productDetail->price)
                                                <span class=mb-1"><del>{{number_format($productDetail->price,0,0,'.')}}</del> VNĐ</span>
                                                <h5>{{number_format($salePrice,0,0,'.')}} VNĐ</h5>
                                            @else
                                                <h5>{{number_format($productDetail->price,0,0,'.')}} VNĐ</h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5 class="m-auto">{{__('There are currently no products')}}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
