@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Add')}}</title>
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@section('page-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/pages/app-ecommerce-details.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/forms/form-quill-editor.min.css')}}">
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
                        <form id="post" action="{{route('order-add-save')}}" method="post" enctype="multipart/form-data"
                              class="mt-2 invoice-repeater">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="customer">{{__('Customer')}}</label>
                                        <select class="select2 form-select" name="customer" id="customer">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-2">
                                        <label class="form-label"
                                               for="payment_methods">{{__('Payment methods')}}</label>
                                        <select class="select2 form-select" name="payment_methods" id="payment_methods">
                                            <option value="cod" data-i18n="Pay Cost">{{__('Cod')}}</option>
                                            <option value="paypal" data-i18n="Paypal">{{__('Paypal')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="payment_status">{{__('Payment status')}}</label>
                                        <select class="select2 form-select" name="payment_status" id="payment_status">
                                            <option value="unpaid" data-i18n="unpaid">{{__('Unpaid')}}</option>
                                            <option value="paid" data-i18n="paid">{{__('Paid')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label class="form-label" for="coupon">{{__('Coupons')}}</label>
                                    <div class="mb-2 input-group">
                                        <input
                                            type="text"
                                            id="coupon"
                                            class="form-control"
                                            placeholder="RTX-ZD65Q-4MSWJ-CME91"
                                            name="discount"
                                        />
                                        <div class="input-group-append">
                                            <button type="button"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light checkCoupon">{{__('Appply')}}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="messages">{{__('Messages')}}</label>
                                        <textarea name="messages" placeholder="messages" id="messages" rows="2"
                                                  class="form-control"></textarea>
                                    </div>
                                </div>
                                <div data-repeater-list="invoice">
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end invoice">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-8 col-12">
                                                        <div class="mb-2">
                                                            <label class="form-label"
                                                                   for="product">{{__('Products')}}</label>
                                                            <select class="select2 form-select product" name="product">
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-4">
                                                        <div class="mb-2">
                                                            <label class="form-label"
                                                                   for="quantity">{{__('Quantity')}}</label>
                                                            <div class="input-group input-group-lg">
                                                                <input id="quantity" name="quantity" type="text"
                                                                       class="touchspin" value="1"/>
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
                                                    </div>
                                                    <div class="col-md-6 col-12 views">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="col-md-3 col-12 mb-3">
                                                <button type="button" class="btn btn-icon btn-primary w-100"
                                                        data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>{{__('Add')}}</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mt-md-0 mt-2">
                                            <div class="col-12 mb-1 col-md-10 float-md-end">
                                                <div class="order-check">
                                                    <div class="d-flex justify-content-end flex-column">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="pe-1"><b>{{__('Your order')}}: </b></div>
                                                            <div></div>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-1">
                                                            <div class="pe-1"><p>{{__('Sub Total')}}: </p></div>
                                                            <div class="rs-total"> 0 VND</div>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="pe-1"><p>{{__('Discount')}}: </p></div>
                                                            <div class="rs-total"> 0 VND</div>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="pe-1"><p>{{__('Total')}}: </p></div>
                                                            <div><b><span class="rs-total"> 0 VND</span></b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-50">
                                            <button type="submit"
                                                    class="btn btn-primary me-1">{{__('Save Changes')}}</button>
                                            <button type="reset"
                                                    class="btn btn-outline-secondary">{{__('Cancel')}}</button>
                                        </div>
                                    </div>
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
{{--    <script src="{{asset('admin_asset/app-assets/js/scripts/forms/form-number-input.js')}}"></script>--}}
    <script src="{{asset('admin_asset/assets/js/ajax-order.js')}}"></script>
    <script>
        $(function () {
            'use strict';
            // form repeater jquery
            $('.invoice-repeater, .repeater-default').repeater({
                show: function () {
                    $(this).slideDown()
                    $(this).find('.select2-container').remove()
                    $(this).find('.touchspin').prev().remove()
                    $(this).find('.touchspin').next().remove()
                    $(this).find('.touchspin').TouchSpin({
                        initval: 1,
                        min: 1,
                    })
                    $(this).find('.touchspin').on('change', function () {
                        changeStatusCount($(this))
                        handleTotal('{{route('total.order')}}')
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
                        setTimeout(function () {
                            $('#coupon').val('')
                            handleTotal('{{route('total.order')}}')
                        }, 500)
                    }
                }
            });
        });
        let tounts = $('.touchspin')
        tounts.TouchSpin({
            initval: 1,
            min: 1,
        })
        tounts.on('change', function (e) {
            changeStatusCount($(this))
            handleTotal('{{route('total.order')}}')
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
        function changeStatusCount($that){
            let dataMax = parseInt($that.parents('.invoice').find('.sub_quantity').attr('data-quantity'))
            if (isNaN(dataMax)){
                dataMax = 1;
            }
            let getId = $that.parents('.invoice').find('#pr').attr('data-pr-detail')
            let sumQuantity = 0;
            let getVal = parseInt($that.parents('.invoice').find('.touchspin ').val());
            $('[data-pr-detail=' +getId +']').each(function (){
                let val = $(this).parents('.invoice').find('input.touchspin').val()
                if (!isNaN(val)){
                    sumQuantity += parseInt(val);
                }
            })
            let newValset = (dataMax + getVal) - sumQuantity
            if (newValset <= 0){
                newValset = 1;
            }
            $that.parents('.invoice').find('.touchspin ').TouchSpin().trigger("touchspin.updatesettings", {max: newValset});
            if (dataMax < sumQuantity){
                if (newValset ==1){
                    $that.parents('.invoice').find('.touchspin ').prop('disabled', true)
                    $that.parents('.invoice').find('.bootstrap-touchspin button').prop('disabled', true)
                    $that.parents('.invoice').find('select.product').parent().find('span.error').remove()
                    $that.parents('.invoice').find('select.product').parent().append(`<span class="error">{{__('The product is currently out of stock')}}</span>`)
                }
                $that.parents('.invoice').find('.touchspin').val(newValset)
            }
            else {
                console.log(dataMax)
                console.log(newValset)
                $('[data-pr-detail=' +getId +']').each(function (){
                    $(this).parents('.invoice').find('select.product').parent().find('span.error').remove()
                    $(this).parents('.invoice').find('.touchspin').prop('disabled', false)
                    $(this).parents('.invoice').find('.bootstrap-touchspin button').prop('disabled', false)
                    $(this).parents('.invoice').find('.touchspin').TouchSpin().trigger("touchspin.updatesettings", {max: parseInt($(this).parents('.invoice').find('.touchspin').val()) + (dataMax - sumQuantity)});
                })
                $that.parents('.invoice').find('.touchspin ').TouchSpin().trigger("touchspin.updatesettings", {max: newValset});
            }
        }
        $(document).on('change', 'select.product', function () {
            let $that = $(this)
            $.ajax({
                url: location.href + '?id=' + $(this).val(),
                method: 'get',
                success: function (res) {
                    $that.parents('.invoice').find('.order-color-options').hide().html(res[0]).slideDown()
                    $that.parents('.invoice').find('.views').hide().html(res[1]).slideDown()
                    changeStatusCount($that)
                    handleTotal('{{route('total.order')}}')
                }
            })
        })

        function selecProduct() {
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
        $(document).on('click', '.discount-remove', function () {
            autoRmCode()
        })
        function autoRmCode(){
            $('#coupon').val('')
            handleTotal('{{route('total.order')}}', 'remove')
            $('.checkCoupon').prop('disabled', false)
            $('#coupon').prop('disabled', false)
        }
        $(document).on('click', '.checkCoupon', function () {
            let discount = $('#coupon').val()
            if (discount != '') {
                handleTotal('{{route('total.order')}}', 'check')
            }
        })
        $(document).on('click', '.product-color-options li', function () {
            $(this).addClass('selected').siblings().removeClass('selected')
        })
        $(document).on('click', '.product-color-options li', function () {
            let $that = $(this)
            let values = $(this).parents('.product-color-options').find('li.selected')
            let product_id = $(this).parents('.product-color-options').attr('data-pr')
            let product_detail_id = $(this).parents('.invoice').find('#pr').attr('data-pr-detail')
            let attrName = []
            let attrValue = []
            $.each(values, function (key, value) {
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
                success: function (res) {
                    if (typeof res != 'object') {
                        $that.parents('.invoice').find('.views').hide().html(res).slideDown()
                        changeStatusCount($that)
                        handleTotal('{{route('total.order')}}')
                    }
                }
            })
        })
    </script>
@endsection
