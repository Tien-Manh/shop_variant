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
                    {{@$order->id}}
                </td>
                <td>
                    {{@$order->orderUser->name}}
                </td>
                <td>
                    {{@$order->saleUser->name}}
                </td>
                <td>
                    {{@$order->order_code}}
                </td>
                <td class="payment-st">
                    @if($order->status_method ==1)
                        {{__('Wait')}}
                    @elseif($order->status_method ==2)
                        {{__('Delivery')}}
                    @elseif($order->status_method ==3)
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
                                        @if($order->sub_price == 0)
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
                                    <option @if($order->status_method == 1)selected
                                            @endif value="1"
                                            data-i18n="wait">{{__('Wait')}}</option>
                                    <option @if($order->status_method == 2)selected
                                            @endif value="2"
                                            data-i18n="delivery">{{__('Delivery')}}</option>
                                    <option @if($order->status_method == 3)selected
                                            @endif value="3"
                                            data-i18n="received">{{__('Received')}}</option>
                                    <option @if($order->status_method == 4)selected
                                            @endif value="4"
                                            data-i18n="4">{{__('Cancel order')}}</option>
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
