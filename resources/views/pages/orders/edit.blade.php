@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Edit')}}</title>
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/css/pages/app-ecommerce-details.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/css/plugins/forms/form-quill-editor.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/css/pages/page-blog.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/forms/form-validation.css')}}">
@endsection
@if(@$breadcrumb)
@section('bcb')
    @include('breadcrumbs.breadcrumbs', $breadcrumb)
@endsection
@endif
@section('content')
    <div class="ecommerce-application">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body app-ecommerce-details">
                        <!-- Form -->
                        <form id="post" action="{{route('order-save-update')}}" method="post" enctype="multipart/form-data" class="mt-2 invoice-repeater">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$order->id}}"/>
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="customer">{{__('Customer')}}</label>
                                        <select class="select2 form-select" name="customer" id="customer">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="payment_methods">{{__('Payment methods')}}</label>
                                        <select class="select2 form-select" name="payment_methods" id="payment_methods">
                                            <option @if($order->paymet_method == 'cod') selected @endif  value="cod" data-i18n="cod">{{__('Cod')}}</option>
                                            <option @if($order->paymet_method == 'paypal') selected @endif  value="paypal" data-i18n="Paypal">{{__('Paypal')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="payment_status">{{__('Payment status')}}</label>
                                        <select class="select2 form-select" name="payment_status" id="payment_status">
                                            <option @if($order->payment_status == 'unpaid') selected @endif  value="unpaid" data-i18n="unpaid">{{__('Unpaid')}}</option>
                                            <option @if($order->payment_status == 'paid') selected @endif  value="paid" data-i18n="paid">{{__('Paid')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="coupon">{{__('Coupon')}}</label>
                                        <input
                                            type="text"
                                            id="coupon"
                                            class="form-control"
                                            placeholder="coupon"
                                            name="coupon"
                                            value="{{$order->coupon}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="messages">{{__('Messages')}}</label>
                                        <textarea name="messages" placeholder="messages"  id="messages" rows="2" class="form-control">{{$order->messages}}</textarea>
                                    </div>
                                </div>
                                <div data-repeater-list="invoice">
                                    @foreach($orderDetails as $orderDetail)
                                        <div data-repeater-item>
                                        <div class="row d-flex align-items-end invoice">
                                            <div class="col-12">
                                                <div class="row">
                                                    <input type="hidden" name="order_detail_id" value="{{$orderDetail->id}}">
                                                    <div class="col-md-8 col-12">
                                                        <div class="mb-2">
                                                            <label class="form-label" for="product">{{__('Product')}}</label>
                                                            <select class="select2 form-select product" name="product">
                                                                <option value="{{$orderDetail->productDetails->product->id}}">{{$orderDetail->productDetails->product->title}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-4">
                                                        <div class="mb-2">
                                                            <label class="form-label" for="quantity">{{__('Quantity')}}</label>
                                                            <div class="input-group input-group-lg">
                                                                <input id="quantity" name="quantity" type="text" class="touchspin" value="{{$orderDetail->quantity }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-4" name="checkBtn">
                                                        <label for=""></label>
                                                        <button
                                                            class="btn btn-outline-danger text-nowrap px-1 w-100 waves-effect"
                                                            data-repeater-delete="" type="button">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 width="14" height="14" viewBox="0 0 24 24"
                                                                 fill="none" stroke="currentColor"
                                                                 stroke-width="2" stroke-linecap="round"
                                                                 stroke-linejoin="round"
                                                                 class="feather feather-x me-25">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                            <span>{{__('Delete')}}</span>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6 col-12 order-color-options">
                                                        @php
                                                            $product = $orderDetail->productDetails->product
                                                        @endphp
                                                        @foreach($product->productAttributes as $attributes)
                                                            <div class="mb-2">
                                                                <div data-pr="{{$product->id}}" class="product-color-options mt-0 mb-0" name="kl">
                                                                    @if($attributes->attributes)
                                                                        <h6>{{mb_strtoupper($attributes->attributes->name) }}</h6>
                                                                    @else
                                                                        <div>
                                                                            <div data-pr-detail="0" class="product-color-options mt-0 mb-0">
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                        <ul class="list-unstyled mb-0">
                                                                            @foreach($attributes->attrbuteValues() as $af)
                                                                                @if($attributes->attributes->name == 'color' || $attributes->attributes->name == 'colors')
                                                                                    <li data-id="{{$af->id}}" data-attribute="{{$attributes->attributes->id}}" class="d-inline-block @if($orderDetail->productDetails->attributeValue($attributes->attributes->id)->attribute_value_id == $af->id)selected @endif">
                                                                                        <div class="color-option b-{{$af->value}}">
                                                                                            <div class="filloption bg-{{$af->value}}"></div>
                                                                                        </div>
                                                                                    </li>
                                                                                @else
                                                                                    <li data-id="{{$af->id}}" data-attribute="{{$attributes->attributes->id}}" class="d-inline-block @if($orderDetail->productDetails->attributeValue($attributes->attributes->id)->attribute_value_id == $af->id)selected @endif">
                                                                                        <div class="color-option b-violet">
                                                                                            <div class="filloption bg-violet text-center nj">
                                                                                                <span>{{$af->value}}  </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-6 col-12 views">
                                                        <div class="card m-0" id="pr" data-pr-detail="{{$orderDetail->productDetails->id}}">
                                                            <div class="card-body p-0">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <img  src="{{asset('storage/' . $orderDetail->productDetails->photo_thumb)}}" class="img-fluid photo_thumb" alt="">
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <p class="col-5 m-0">{{ __('Cost') }}</p>
                                                                                    <span class="item-price col-7 cost">{{number_format( $orderDetail->productDetails->cos, 0, 0, '.')}} VND</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <p class="col-5 m-0">{{ __('Quantity')}}</p>
                                                                                    <span class="item-price col-7 quantity">{{number_format($orderDetail->productDetails->quantity, 0, 0, '.')}} DV</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <p class="col-5 m-0">{{__('Sub quantity')}}</p>
                                                                                    <span class="item-price col-7 sub_quantity">{{number_format($orderDetail->productDetails->sub_quantity, 0, 0, '.')}} DV</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <p class="col-5 m-0">{{__('Price')}}</p>
                                                                                    <span class="item-price col-7 price">{{number_format($orderDetail->productDetails->price, 0, 0, '.')}} VND</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <p class="col-5 m-0">{{__('Sell price')}}</p>
                                                                                    <span class="item-price col-7 sell_price" price-default="{{$orderDetail->productDetails->sell_price}}">{{number_format($orderDetail->productDetails->sell_price, 0, 0, '.')}} VND</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-md-3 col-12 mb-1">
                                    <button type="button" class="btn btn-icon btn-primary w-100" data-repeater-create>
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>{{__('Add product')}}</span>
                                    </button>
                                </div>
                                <div class="col-md-9 col-12 mb-1 d-flex align-items-center  justify-content-end">
                                    <span>{{__('Total')}}: &nbsp;</span><b><span class="costTotal"> {{number_format($order->total, 0, 0, '.')}} VND</span></b>
                                </div>
                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1">{{__('Save Changes')}}</button>
                                    <button type="reset" class="btn btn-outline-secondary">{{__('Cancel')}}</button>
                                </div>
                            </div>
                        </form>
                        <!--/ Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-js')
    <script src="{{asset('admin_asset/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/app-assets/js/scripts/forms/form-number-input.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/ajax-order.js')}}"></script>
    <script>
        function costTotal(){
            let costTotals = 0
            $.each($('.invoice'), function (key){
                if ($(this).find('.sell_price').attr('price-default') != undefined){
                    costTotals += (parseInt($(this).find('.sell_price').attr('price-default')) * $(this).find('#quantity').val())
                }
            })
            $('.costTotal').text(costTotals.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}))
        }
        $(function () {
            'use strict';
            // form repeater jquery
            $('.invoice-repeater, .repeater-default').repeater({
                show: function () {
                    $(this).find('.order-color-options .mb-2').remove()
                    $(this).find('.views #pr').remove()
                    $(this).slideDown()
                    $(this).find('.select2-container').remove()
                    $(this).find('.touchspin').prev().remove()
                    $(this).find('.touchspin').next().remove()
                    const tounts = $('.touchspin').TouchSpin({
                        initval: 1
                    })
                    tounts.on('change', function (){
                        costTotal()
                    })
                    tounts.on('touchspin.on.startspin', function () {
                        costTotal()
                    })
                    selecProduct()
                    //Feather Icons
                    if (feather) {
                        feather.replace({width: 14, height: 14});
                    }
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });
        });
        const tounts = $('.touchspin').TouchSpin({
            initval: 1
        })
        tounts.on('change', function (){
            costTotal()
        })
        tounts.on('touchspin.on.startspin', function () {
            costTotal()
        })
        $('select#customer').select2({
            placeholder: '{{__('Select customer')}}',
            ajax: {
                url: location.href + '?type=1',
                data: function (params) {
                    return {
                        customer: params.term // search term
                    };
                },
                processResults: function (res) {
                    return {
                        results: $.map(res, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        })
        $(document).on('change', 'select.product', function (){
            let $that = $(this)
            $.ajax({
                url: location.href + '?id=' + $(this).val(),
                method: 'get',
                success: function (res){
                    $that.parents('.invoice').find('.order-color-options').hide().html(res[0]).slideDown()
                    $that.parents('.invoice').find('.views').hide().html(res[1]).slideDown()
                    costTotal()
                }
            })
        })
        function selecProduct(){
            $('select.product').select2({
                allowClear: true,
                placeholder: '{{__('Select product')}}',
                ajax: {
                    url: location.href + '?type=2',
                    data: function (params) {
                        return {
                            product: params.term // search term
                        };
                    },
                    processResults: function (res) {
                        return {
                            results: $.map(res, function (item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        }
                    },
                    cache: true,
                },
            })
        }
        selecProduct()

        $(document).on('click', '.product-color-options li', function (){
            $(this).addClass('selected').siblings().removeClass('selected')
        })
        $(document).on('click', '.product-color-options li', function (){
            let $that = $(this)
            let values = $(this).parents('.product-color-options').find('li.selected')
            let product_id = $(this).parents('.product-color-options').attr('data-pr')
            let product_detail_id = $(this).parents('.invoice').find('#pr').attr('data-pr-detail')
            let attrName = []
            let attrValue = []
            $.each(values, function (key, value){
                attrName.push(value.getAttribute('data-attribute'))
                attrValue.push(value.getAttribute('data-id'))
            })
            let data = {
                product_id: product_id,
                product_detail_id: product_detail_id,
                attrName: attrName,
                attrValue: attrValue
            }
            $.ajax({
                url: location.href,
                data: data,
                success: function (res){
                    if (typeof res != 'object'){
                        $that.parents('.invoice').find('.views').hide().html(res).slideDown()
                        costTotal()
                    }
                }
            })
        })
    </script>
@endsection
