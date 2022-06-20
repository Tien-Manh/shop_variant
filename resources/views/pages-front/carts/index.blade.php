@extends('layouts-front.layout-full')
@section('title')
    <title>{{__('Shop-Fashion')}} | {{__('Carts')}}</title>
@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>{{__('Shopping Cart')}}</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">{{__('Home')}}</a>
                            <a href="{{route('shop')}}">{{__('Shop')}}</a>
                            <span>{{__('Shopping Cart')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <input type="hidden" name="__token" value="{{@csrf_token()}}">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>{{__('Product')}}</th>
                                <th>{{__('Quantity')}}</th>
                                <th>{{__('Total price')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($carts))
                                <h5 class="text-center pb-5">{{__('There are currently no products in your cart')}}</h5>
                            @else
                                @foreach($carts as $cart)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img style="width: 120px; height: auto" src="{{asset('storage/'. $cart['image'])}}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{$cart['name']}}</h6>
                                                <h5>{{number_format($cart['price'], 0,0,'.')}} VNĐ</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity cart-quantity">
                                                <div class="pro-qty-2">
                                                    <input product-id="{{$cart['id']}}" min="0"  type="number" value="{{$cart['quantity']}}" max="{{$cart['sub_quantity']}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{number_format($cart['price'] * $cart['quantity'], 0,0,'.')}} VNĐ</td>
                                        <td cart-id="{{route('delete.one.cart', [$cart['id']])}}" class="cart__close"><i class="fa fa-close"></i></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="{{route('update.cart')}}" class="update-cart"><i class="fa fa-spinner"></i> {{__('Update cart')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>{{__('Discount codes')}}</h6>
                        <form id="submi-check" action="#">
                            <input type="text" placeholder="Coupon code" value="{{@$coucode}}">
                            <button type="submit">{{__('Apply')}}</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>{{__('Cart total')}}</h6>
                        <div class="show-message">
                        </div>
                        <ul>
                            <li class="sum_ub_total">{{__('Total')}} <span>{{number_format(\App\Http\Controllers\Fronts\ProductShopController::getSumPrice())}} VNĐ</span></li>
                            <li class="sum_total">{{__('Money total')}} <span>{{number_format(\App\Http\Controllers\Fronts\ProductShopController::getSumPrice())}} VNĐ</span></li>
                        </ul>
                        <a href="{{route('checkout')}}" class="primary-btn">{{__('Proceed to checkout')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection

@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
