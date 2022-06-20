@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Your orders')}}</title>
@endsection
@section('css-page')
@endsection
@section('content')
    <div class="container mt-3 mt-md-5">
        <h5 class="text-charcoal hidden-sm-down mb-2">{{__('Your order')}}</h5>
        <div class="row">
            <div class="col-12">
                <div class="list-group">
                    @foreach($orders as $order)
                        <div class="list-group-item pt-2 pl-3 pr-3 pb-1 bg-snow"
                             style="position: relative; border-top-width: 1px">
                            <div class="row w-100 no-gutters">
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">{{__('Code')}}</h6>
                                    <a class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$order->order_code}}</a>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">{{__('Date')}}</h6>
                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{date_format(date_create($order->order_date), 'd-m-Y H:m:s')}}</p>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">{{__('Money total')}}</h6>
                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{number_format($order->total,0,0,'.')}}
                                        VNĐ</p>
                                    <del style="font-size: 13px;"
                                         class="text-danger">{{number_format($order->sub_total,0,0,'.')}} VNĐ
                                    </del>
                                </div>
                                <div class="col-6 col-md">
                                    <h6 class="text-charcoal mb-0 w-100">{{__('Ship to address')}}</h6>
                                    <p class="text-pebble mb-0 w-100 mb-2 mb-md-0">{{$order->ship_to_address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item p-2 bg-white mb-5">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-12 pr-0 pr-md-3">
                                    <div class="alert p-2 alert-primary w-100 mb-0">
                                        <h6 class="mb-0"><b>{{__('Status')}}:</b>
                                            @if($order->status_method ==0)
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-danger">{{__('Wait')}}</b></span>
                                            @elseif($order->status_method ==1)
                                                <span class=" hidden-sm-down mb-0"><b
                                                        class="badge badge-warning">{{__('Delivery')}}</b></span>
                                            @elseif($order->status_method ==2)
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-success"> {{__('Received')}}</b></span>
                                            @else
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-danger"> {{__('Cancel order')}}</b></span>
                                            @endif
                                            &nbsp;|<b class="ml-2">{{__('Payment methods')}}:</b>
                                            @if($order->payment_method == 'pain')
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-danger">{{__($order->payment_method)}}</b></span>
                                            @else
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-success"> {{__($order->payment_method)}}</b></span>
                                            @endif
                                            &nbsp;|<b class="ml-1"></b>
                                            @if($order->payment_status == 'unpaid')
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-danger">{{__($order->payment_status)}}</b></span>
                                            @else
                                                <span class="hidden-sm-down mb-0"><b
                                                        class="badge badge-success"> {{__($order->payment_status)}}</b></span>
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 pr-0 pr-md-3">
                                    @foreach($order->orderDetails as $orderdetail)
                                        @php
                                            $product = $orderdetail->productDetails->product;
                                            $productDetail = $orderdetail->productDetails;
                                            @endphp
                                        <div class="row pt-3">
                                            <div class="col-3 col-md-1">
                                                <img class="img-fluid pr-3"
                                                     src="{{asset('storage/' .$productDetail->photo_thumb)}}"
                                                     alt="">
                                            </div>
                                            <div class="col-9 col-md-8 pr-0 pr-md-3">
                                                <h6 class="text-charcoal mb-2 mb-md-1">
                                                    <a href="{{route('product.detail', [$product->slug])}}" class="text-charcoal">{{$orderdetail->quantity}} x {{$product->title}}</a>
                                                </h6>
                                                <ul class="list-unstyled text-pebble mb-2 small">
                                                    @foreach($product->productAttributes as $at)
                                                        @foreach($at->attributes()->get() as $ft)
                                                            <li class="" style="font-size: 14px;">
                                                                <b>{{__(strtoupper($ft->name))}}: </b><span class="badge badge-success"> {{$productDetail->getValueAttibute($ft->id)->value}}</span>
                                                            </li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                                <h6 class="text-charcoal text-left mb-0 mb-md-2">
                                                    @if($orderdetail->sub_price > 0)
                                                        <b>{{number_format($orderdetail->sub_price, 0,0,'.')}} VNĐ</b>
                                                    @else
                                                        <b>{{number_format($orderdetail->price, 0,0,'.')}} VNĐ</b>
                                                    @endif
                                                </h6>
                                            </div>
                                            <div class="col-12 col-md-3 hidden-sm-down">
                                                <a href="{{route('add.cart', [$orderdetail->id])}}" class="text-success add-cart  mb-2">{{__('Buy It Again')}}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
