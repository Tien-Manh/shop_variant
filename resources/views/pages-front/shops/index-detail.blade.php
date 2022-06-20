@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Products Detail')}}</title>
@endsection
@section('content')
    <section class="shop-details">
        <div class="getStock">
        </div>
        <div class="product__details__pic">
            <div class="container container-fix">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            {{--                            @if($product->productsImages->count() > 0)--}}
                            {{--                                @foreach($product->productsImages as $images)--}}
                            {{--                                    <li class="nav-item">--}}
                            {{--                                        <a class="nav-link @if($loop->first) active @endif" data-toggle="tab"--}}
                            {{--                                           href="#tabs-{{$images->id}}" role="tab">--}}
                            {{--                                            <div class="product__thumb__pic set-bg"--}}
                            {{--                                                 data-setbg="{{asset('storage/'.$images->photo)}}">--}}
                            {{--                                            </div>--}}
                            {{--                                        </a>--}}
                            {{--                                    </li>--}}
                            {{--                                @endforeach--}}
                            {{--                            @else--}}
                            @foreach($product->productDetail as $productDetails)
                                <li class="nav-item">
                                    <a class="nav-link @if($product->productDetail()->where('is_default', 1)->first()->id == $productDetails->id) active @endif"
                                       data-toggle="tab"
                                       href="#tabs-{{$productDetails->id}}" role="tab">
                                        <div class="product__thumb__pic set-bg"
                                             data-setbg="{{asset('storage/'.$productDetails->photo_thumb)}}">
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            {{--                            @endif--}}
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            {{--                            @if($product->productsImages->count() > 0)--}}
                            {{--                                @foreach($product->productsImages as $images)--}}
                            {{--                                    <div class="tab-pane @if($loop->first) active @endif" id="tabs-{{$images->id}}"--}}
                            {{--                                         role="tabpanel">--}}
                            {{--                                        <div class="product__details__pic__item">--}}
                            {{--                                            <img src="{{asset('storage/'. $images->photo)}}" alt="">--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                @endforeach--}}
                            {{--                            @else--}}
                            @foreach($product->productDetail as $productDetails)
                                <div
                                    class="tab-pane @if($product->productDetail()->where('is_default', 1)->first()->id == $productDetails->id) active @endif"
                                    id="tabs-{{$productDetails->id}}" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <img src="{{asset('storage/'. $productDetails->photo_thumb)}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                            {{--                            @endif--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="product__details__text">
                            <h4>{{$product->title}}</h4>
                            @php
                                $productDetail = $product->productDetail()->where('is_default', 1)->first();
                                 $salePrice = \App\Models\Coupon::getSaleProduct($productDetail->id);
                            @endphp
                            @if($salePrice > 0 && $salePrice < $productDetail->price)
                                <h3>{{number_format($salePrice,0,0,'.')}} VNĐ<span>{{number_format($productDetail->price,0,0,'.')}} VNĐ</span>
                                </h3>
                            @else
                                <h3>{{number_format($productDetail->price,0,0,'.')}} VNĐ</h3>
                            @endif
                            <div class="product__details__option">
                                @foreach($product->productAttributes as $fr)
                                    @foreach($fr->attributes()->get() as $ft)
                                        @if(in_array(strtolower($ft->name), array_map('strtolower', ['color', 'colors'])))
                                            <div class="product__details__option__color">
                                                <span>{{__($ft->name)}}</span>
                                                @foreach($fr->attrbuteValues() as $value)
                                                    <label data-url="{{route('choze.detail')}}"
                                                           product-id="{{$product->id}}" attr-name-id="{{$ft->id}}"
                                                           attr-value-id="{{$value->id}}"
                                                           class="@if($productDetail->attributeValue($ft->id)->attribute_value_id == $value->id) active @endif {{str_replace(' ', '-', $value->value)}}"
                                                           for="sp-{{$value->id}}">
                                                        <input type="radio" id="sp-{{$value->id}}" name="{{$ft->name}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="product__details__option__size">
                                                <span>{{__($ft->name)}}</span>
                                                @foreach($fr->attrbuteValues() as $value)
                                                    <label data-url="{{route('choze.detail')}}"
                                                           product-id="{{$product->id}}" attr-name-id="{{$ft->id}}"
                                                           attr-value-id="{{$value->id}}"
                                                           class="@if($productDetail->attributeValue($ft->id)->attribute_value_id == $value->id) active @endif"
                                                           for="{{$ft->name}}-{{$value->value}}"
                                                           data-name="{{$ft->name}}">{{$value->value}}
                                                        <input type="radio" id="{{$ft->name}}-{{$value->value}}"
                                                               name="{{$ft->name}}">
                                                    </label>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        @if($productDetail->sub_quantity <= 0)
                                            <input disabled type="number" value="1"
                                                   max="{{$productDetail->sub_quantity}}">
                                        @else
                                            <input type="number" value="1" max="{{$productDetail->sub_quantity}}">
                                        @endif
                                    </div>
                                </div>
                                <a href="{{route('add.cart', [$productDetail->id])}}"
                                   class="primary-btn cart-add">{{__('Add to cart')}}</a>
                            </div>
                            <div class="product__details__btns__option">
                                @if(Auth::user() && !empty($productDetail->wishList()->where('user_id', Auth::user()->id)->first()->user_id)
                                                  && $productDetail->wishList()->where('user_id', Auth::user()->id)->first()->user_id == Auth::user()->id)
                                <a class="add-wishlist" href="{{route('wishlist.save', [$productDetail->id])}}">
                                    <i class="fa fa-heart text-danger"></i> {{__('Remove wishlist')}}</a>
                                @else
                                    <a class="add-wishlist" href="{{route('wishlist.save', [$productDetail->id])}}">
                                        <i class="fa fa-heart"></i> {{__('Add to wishlist')}}</a>
                                @endif
                            </div>
                            @if($product->content != '<p><br></p>')
                                <p>{!!$product->content!!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->
    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">{{__('Related Product')}}</h3>
                </div>
            </div>
            <div class="row">
                @foreach($relatedProduct as $relatedDetails)
                    @php
                        $relatedDetail = $relatedDetails->productDetail()->where('is_default', 1)->first();
                          $salePriceRela = \App\Models\Coupon::getSaleProduct($relatedDetail->id);
                    @endphp
                    <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                 data-setbg="{{asset('storage/'.$relatedDetail->photo_thumb)}}">
                                @php
                                    $now = \Carbon\Carbon::now();
                                @endphp
                                @if($now->diffInDays($relatedDetail->created_at) < 15)
                                    <span class="label">{{__('New')}}</span>
                                @endif
                                <ul class="product__hover">
                                    <li>
                                        @if(Auth::user() && !empty($relatedDetail->wishList()->where('user_id', Auth::user()->id)->first()->user_id)
                                      && $relatedDetail->wishList()->where('user_id', Auth::user()->id)->first()->user_id == Auth::user()->id)
                                            <a class="add-wishlist"
                                               href="{{route('wishlist.save', [$relatedDetail->id])}}"><img
                                                    src="{{asset('front_asset/img/icon/heart-like.png')}}"
                                                    alt="">
                                            </a>
                                        @else
                                            <a class="add-wishlist"
                                               href="{{route('wishlist.save', [$relatedDetail->id])}}"><img
                                                    src="{{asset('front_asset/img/icon/heart.png')}}"
                                                    alt="">
                                            </a>
                                        @endif
                                    </li>
                                    {{--                                                <li><a href="#"><img src="{{asset('front_asset/img/icon/compare.png')}}" alt=""> <span>Compare</span></a>--}}
                                    {{--                                                </li>--}}
                                    <li><a href="{{route('product.detail', [$relatedDetails->slug])}}"><img
                                                src="{{asset('front_asset/img/icon/detail.png')}}"
                                                alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{$relatedDetails->title}}</h6>
                                <a href="{{route('add.cart', [$relatedDetail->id])}}"
                                   class="add-cart">+ {{__('Add To Cart')}}</a>
                                <div class="rating">
                                    <i class="fa fa-star-o1"></i>
                                    <i class="fa fa-star-o1"></i>
                                    <i class="fa fa-star-o1"></i>
                                    <i class="fa fa-star-o1"></i>
                                    <i class="fa fa-star-o1"></i>
                                </div>
                                @if($salePriceRela > 0 && $salePriceRela < $relatedDetail->price)
                                    <span class=mb-1"><del>{{number_format($relatedDetail->price,0,0,'.')}}</del> VNĐ</span>
                                    <h5>{{number_format($salePriceRela,0,0,'.')}} VNĐ</h5>
                                @else
                                    <h5>{{number_format($relatedDetail->price,0,0,'.')}} VNĐ</h5>
                                @endif
                                {{--                            <div class="product__color__select">--}}
                                {{--                                <label for="pc-{{$relatedDetail->id}}">--}}
                                {{--                                    <input type="radio" id="pc-{{$relatedDetail->id}}">--}}
                                {{--                                </label>--}}
                                {{--                                <label class="active black" for="pc-{{$relatedDetail->id}}">--}}
                                {{--                                    <input type="radio" id="pc-{{$relatedDetail->id}}">--}}
                                {{--                                </label>--}}
                                {{--                                <label class="grey" for="pc-{{$relatedDetail->id}}">--}}
                                {{--                                    <input type="radio" id="pc-{{$relatedDetail->id}}">--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->
@endsection
@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
