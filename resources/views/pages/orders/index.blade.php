@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Post">{{__('Order')}}</title>
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/extensions/swiper.min.css')}}">
@endsection
@section('page-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/pages/app-ecommerce-details.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/css/plugins/extensions/ext-component-swiper.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@if(@$breadcrumb)
@section('bcb')
    @include('breadcrumbs.breadcrumbs', $breadcrumb)
@endsection
@endif
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="card-header border-bottom p-1">
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="{{route('order-add')}}" class="dt-button create-new btn btn-primary"
                                       tabindex="0"
                                       aria-controls="DataTables_Table_0" type="button"><span><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-plus me-50 font-small-4"><line x1="12" y1="5"
                                                                                                      x2="12"
                                                                                                      y2="19"></line><line
                                                    x1="5" y1="12" x2="19" y2="12"></line></svg>{{__('Add New')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mx-0 row">
                            <div class="col-12 col-md-3">
                                <div class="d-flex justify-content-start align-items-center">
                                    <label class="pe-1">{{__('Show')}} </label>
                                    <select class="select2 form-select filter">
                                        <option value="5">5</option>
                                        <option selected value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                    </select>
                                    <label class="ps-1">{{__('entries')}}</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label class="d-flex justify-content-end align-items-center">{{__('Search')}}:<input
                                            type="search" class="form-control  w-100" placeholder=""
                                            aria-controls="DataTables_Table_0"></label></div>
                            </div>
                        </div>
                        <div class="showPage">
                            <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0"
                                   role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1205px;">
                                <thead class="text-center">
                                <tr role="row">
                                    <th class="control sorting_disabled" rowspan="1" colspan="1"
                                        style="width: 0px; display: none;" aria-label=""></th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 271px;"
                                        aria-label="Name: activate to sort column ascending">{{__('Id')}}
                                    </th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 271px;"
                                        aria-label="Name: activate to sort column ascending">{{__('Order user')}}
                                    </th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 271px;"
                                        aria-label="Name: activate to sort column ascending">{{__('Sales agent')}}
                                    </th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 271px;"
                                        aria-label="Name: activate to sort column ascending">{{__('Code')}}
                                    </th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 271px;"
                                        aria-label="Name: activate to sort column ascending">{{__('Status methods')}}
                                    </th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 261px;"
                                        aria-label="Email: activate to sort column ascending">{{__('Total')}}
                                    </th>
                                    <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 261px;"
                                        aria-label="Email: activate to sort column ascending">{{__('Sub Total')}}
                                    </th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 68px;"
                                        aria-label="Actions">{{__('Actions')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count(@$orders) > 0)
                                    @foreach(@$orders as $key => $order)
                                        <tr class="odd text-center">
                                            <td class=" control" tabindex="0" style="display: none;"></td>
                                            <td>
                                                {{$order->id}}
                                            </td>
                                            <td>
                                                {{@$order->orderUser->name}}
                                            </td>
                                            <td>
                                                {{@$order->saleUser->name}}
                                            </td>
                                            <td>
                                                {{$order->order_code}}
                                            </td>
                                            <td class="payment-st">
                                                @if($order->status_method ==0)
                                                    {{__('Wait')}}
                                                @elseif($order->status_method ==1)
                                                    {{__('Delivery')}}
                                                @elseif($order->status_method ==2)
                                                    {{__('Received')}}
                                                @else
                                                    {{__('Cancel order')}}
                                                @endif
                                            </td>
                                            <td>
                                                {{number_format($order->total, 0, 0, '.')}} VNĐ
                                            </td>
                                            <td>
                                                {{number_format($order->sub_total, 0, 0, '.')}} VNĐ
                                            </td>
                                            <td>
                                                <div class="text-center d-flex align-items-center">
                                                    <a href="javascript:void(0)" class="item-post-show"
                                                       data-bs-toggle="modal" data-bs-target="#default-{{$key}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none"
                                                             style="width: 22px !important; ; height: 22px !important;"
                                                             stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-eye font-small-4">
                                                            <path
                                                                d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>
                                                    <span>&nbsp; &nbsp;</span>
{{--                                                    <a href="{{route('order-update', [$order->id])}}" class="item-edit">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
{{--                                                             stroke-width="2"--}}
{{--                                                             stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                                             class="feather feather-edit font-medium-4">--}}
{{--                                                            <path--}}
{{--                                                                d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>--}}
{{--                                                            <path--}}
{{--                                                                d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>--}}
{{--                                                        </svg>--}}
{{--                                                    </a>--}}
{{--                                                    <span>&nbsp; &nbsp;</span>--}}
                                                    <a data-id="{{$order->id}}"
                                                       href="{{route('order-delete', [$order->id])}}"
                                                       class="item-delete delete-record">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-trash-2 font-medium-4 me-30">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if(count(@$orders) > 0)
                                @foreach(@$orders as $key => $order)
                                    <div class="modal fade modal-primary post-modal" id="default-{{$key}}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg ecommerce-application">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>{{__('Order Detail')}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body showPage">
                                                    <table class="datatables-basic table dataTable no-footer dtr-column"
                                                           role="grid" aria-describedby="DataTables_Table_0_info">
                                                        <thead class="text-center">
                                                        <tr role="row">
                                                            <th class="control sorting_disabled" rowspan="1" colspan="1"
                                                                style="width: 0px; display: none;" aria-label=""></th>
                                                            <th>{{__('Id')}}
                                                            </th>
                                                            <th>{{__('Photo')}}
                                                            </th>
                                                            <th>{{__('Name')}}
                                                            </th>
                                                            <th>{{__('Sku')}}
                                                            </th>
                                                            <th>{{__('Sell price')}}
                                                            </th>
                                                            <th>{{__('Price')}}
                                                            </th>
                                                            <th>{{__('Quantity')}}
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach(@$order->orderDetails as $orderdetail)
                                                            <tr class="odd text-center">
                                                                <td class=" control" tabindex="0"
                                                                    style="display: none;"></td>
                                                                <td>
                                                                    {{$orderdetail->id}}
                                                                </td>
                                                                <td>
                                                                    <div class="align-items-center fix-img-list m-auto">
                                                                        @if(!file_exists(public_path('storage/' . $orderdetail->productDetails->photo_thumb)) || $orderdetail->productDetails->photo_thumb === '' ||$orderdetail->productDetails->photo_thumb === null)
                                                                            <img width="100%" height="100%"
                                                                                 src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}"
                                                                                 alt="">
                                                                        @else
                                                                            <img width="100%" height="100%"
                                                                                 src="{{asset('storage/' . $orderdetail->productDetails->photo_thumb)}}"
                                                                                 alt="">
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{$orderdetail->productDetails->product->title}}
                                                                </td>
                                                                <td>
                                                                    {{$orderdetail->productDetails->sku}}
                                                                </td>
                                                                <td>
                                                                    @if($orderdetail->sub_price == 0)
                                                                        {{number_format($orderdetail->price,0,0,'.')}}
                                                                        VNĐ
                                                                    @else
                                                                        {{number_format($orderdetail->sub_price,0,0,'.')}}
                                                                        VNĐ
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{number_format($orderdetail->price,0,0,'.')}} VNĐ
                                                                </td>
                                                                <td>
                                                                    {{$orderdetail->quantity}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer" style="place-content: flex-start">
                                                    <div class="col-12">
                                                                <div class="d-flex flex-column">
                                                                    <div class="d-flex justify-content-start pt-1">
                                                                        <div class="pe-1"><p>{{__('Messages')}}: </p></div>
                                                                        <p> {{$order->messages}}</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <div class="pe-1"><p>{{__('Payment methods')}}: </p></div>
                                                                        <p> {{__($order->payment_method)}}</p>
                                                                    </div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <div class="pe-1"><p>{{__('Date')}}: </p></div>
                                                                        <p> {{$order->order_date}}</p>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-md-3 col-12">
                                                        <div class="mb-2">
                                                            <label
                                                                class="form-label payment-success">{{__('Payment status')}}</label>
                                                            <select class="select2 form-select payment_status"
                                                                    name="payment_status">
                                                                <option @if($order->payment_status == 'unpaid')selected
                                                                        @endif value="unpaid"
                                                                        data-i18n="unpaid">{{__('Unpaid')}}</option>
                                                                <option @if($order->payment_status == 'paid')selected
                                                                        @endif value="paid"
                                                                        data-i18n="paid">{{__('Paid')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <div class="mb-2">
                                                            <label
                                                                class="form-label payment-success"></label>
                                                            <select class="select2 form-select status_method"
                                                                    name="status_method">
                                                                <option @if($order->status_method == 0)selected
                                                                        @endif value="0"
                                                                        data-i18n="wait">{{__('Wait')}}</option>
                                                                <option @if($order->status_method == 1)selected
                                                                        @endif value="1"
                                                                        data-i18n="delivery">{{__('Delivery')}}</option>
                                                                <option @if($order->status_method == 2)selected
                                                                        @endif value="2"
                                                                        data-i18n="received">{{__('Received')}}</option>
                                                                <option @if($order->status_method == 3)selected
                                                                        @endif value="3"
                                                                        data-i18n="3">{{__('Cancel order')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button disabled type="button" id-update="{{$order->id}}"
                                                            class="btn btn-primary bn-savepaymet">{{__('Change')}}</button>
                                                    <div class="col-1"></div>
                                                    <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">{{__('Close')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="d-flex justify-content-between mx-0 mb-1 row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                         aria-live="polite">
                                        {{__('Showing')}} 1 {{__('to')}}
                                        {{$orders->currentPage() == $orders->lastPage() && $orders->currentPage()
                                            > 1  ? $orders->total() - ($orders->perPage() * ($orders->lastPage() - 1)): ($orders->perPage()
                                            <=  $orders->total() ?  $orders->perPage()  : $orders->total() )}}
                                        {{__('of ')}} {{$orders->total()}} {{__('entries')}}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers float-end"
                                         id="DataTables_Table_0_paginate">
                                        {{@$orders->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('vendor-js')
    <script src="{{asset('admin_asset/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/app-assets/js/scripts/extensions/ext-component-sweet-alerts.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/js/scripts/pages/app-ecommerce-details.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/js/scripts/extensions/ext-component-swiper.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".payment_status").select2();
            $(".status_method").select2();
        });
        let value = '';
        let value1 = '';
        $(document).on('change', '.status_method', function () {
            $(this).parents('.modal-footer').find('.bn-savepaymet').prop('disabled', false)
            $(this).parents('.modal-footer').find('.payment-success').removeClass('text-success')
            value1 = $(this).val();
        })
        $(document).on('change', '.payment_status', function () {
            $(this).parents('.modal-footer').find('.bn-savepaymet').prop('disabled', false)
            $(this).parents('.modal-footer').find('.payment-success').removeClass('text-success')
            value = $(this).val();
        })
        $('.modal').on('hidden.bs.modal', function (e) {
            $('#' + e.target.getAttribute('id')).find('.bn-savepaymet').prop('disabled', true)
        })
        $(document).on('click', '.bn-savepaymet', function () {
            let id = $(this).attr('id-update')
            let csrfToken = '{{@csrf_token()}}'
            let defaultKey = $(this).parents('.modal').attr('id')
            let that = $(this)
            $.ajax({
                url: '{{route('payment.status')}}',
                type: 'post',
                data: {id: id, value: value, value1: value1, _token: csrfToken},
                success: function (res) {
                    if (res.message) {
                        if (value) {
                            let v_text = '';
                            if (value == 'unpaid') {
                                v_text = '{{__('unpaid')}}'
                            } else if (value == 'paid') {
                                v_text = '{{__('paid')}}'
                            }
                            $("[data-bs-target='#" + defaultKey + "']").parents('.odd').find('.payment-td').text(v_text)
                        }
                        if (value1) {
                            let v_text = '';
                            if (value1 == 0) {
                                v_text = '{{__('Wait')}}'
                            } else if (value1 == 1) {
                                v_text = '{{__('Delivery')}}'
                            } else if (value1 == 2) {
                                v_text = '{{__('Received')}}'
                            } else {
                                v_text = '{{__('Cancel order')}}'
                            }
                            $("[data-bs-target='#" + defaultKey + "']").parents('.odd').find('.payment-st').text(v_text)
                        }
                        toastr.success("", res.message, {
                            closeButton: !0,
                            tapToDismiss: !1
                        })
                        that.prop('disabled', true)
                        that.parents('.modal').find('.payment-success').addClass('text-success')
                    }
                }
            })
        })
        let text_ = '{{__("You will not be able to revert this !")}}'
        let confirm = '{{__('Yes, delete it !')}}'
        let cancel = '{{__('Cancel !')}}'
        let cancel_delete = '{{__('Cancel Post Delete!')}}'
    </script>
    <script src="{{asset('admin_asset/assets/js/delete-item.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/ajax-filter.js')}}"></script>
@endsection

