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
            aria-label="Name: activate to sort column ascending">{{__('Photo')}}
        </th>
        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
            colspan="1" style="width: 271px;"
            aria-label="Name: activate to sort column ascending">{{__('title')}}
        </th>
        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
            colspan="1" style="width: 271px;"
            aria-label="Name: activate to sort column ascending">{{__('slug')}}
        </th>
        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
            colspan="1" style="width: 261px;"
            aria-label="Email: activate to sort column ascending">{{__('sku')}}
        </th>
        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
            colspan="1" style="width: 261px;"
            aria-label="Email: activate to sort column ascending">{{__('categories')}}
        </th>
        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
            colspan="1" style="width: 93px;"
            aria-label="Status: activate to sort column ascending">{{__('Status')}}
        </th>
        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 68px;"
            aria-label="Actions">{{__('Actions')}}
        </th>
    </tr>
    </thead>
    <tbody>
    @if(count(@$products) > 0)
        @foreach(@$products as $key => $product)
            <tr class="odd text-center">
                <td class=" control" tabindex="0" style="display: none;"></td>
                <td>
                    {{$product->id}}
                </td>
                <td>
                    <div class="align-items-center fix-img-list m-auto">
                        @if(!empty($product->productDetail()->where('is_default', 1)->first()))
                            @if(!file_exists(public_path('storage/' . $product->productDetail()->where('is_default', 1)->first()->photo_thumb)) || $product->productDetail()->where('is_default', 1)->first()->photo_thumb === '' ||$product->productDetail()->where('is_default', 1)->first()->photo_thumb === null)
                                <img width="100%" height="100%" src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}" alt="">
                            @else
                                <img width="100%" height="100%" src="{{asset('storage/' . $product->productDetail()->where('is_default', 1)->first()->photo_thumb)}}" alt="">
                            @endif
                        @else
                            <img width="100%" height="100%" src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}" alt="">
                        @endif
                    </div>
                </td>
                <td>
                    {{$product->title}}
                </td>
                <td> {{$product->slug}}</td>
                <td> {{$product->sku}}</td>
                <td>
                    @if(count($product->cates) > 0)
                        @foreach($product->cates as $val)
                            <span class="badge badge-light-primary">{{$val->title}}</span>
                        @endforeach
                    @endif
                </td>
                <td>
                    <div class="form-check form-check-success form-switch">
                        <input type="checkbox"  @if($product->status == 0) @else checked @endif class="form-check-input" active-id="{{$product->id}}">
                    </div>
                </td>
                <td>
                    <div class="text-center d-flex align-items-center">
                        <a href="javascript:void(0)" product-id="{{$product->id}}" class="item-product-show" data-bs-target="#default-{{$key}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" style="width: 22px !important; ; height: 22px !important;"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-eye font-small-4">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </a>
                        <span>&nbsp; &nbsp;</span>
                        <a href="{{route('product-update', [$product->id])}}" class="item-edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-edit font-medium-4">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>
                        <span>&nbsp; &nbsp;</span>
                        <a data-id="{{$product->id}}" href="{{route('product-delete', [$product->id])}}" class="item-delete delete-record">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                <div class="modal fade modal-primary" id="default-{{$key}}">
                    <div class="modal-dialog modal-dialog-centered modal-lg ecommerce-application">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <section class="app-ecommerce-details">
                                        <!-- Product Details starts -->
                                        <div class="card m-0 productDetail"></div>
                                    </section>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{__('Close')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
<div class="d-flex justify-content-between mx-0 mb-0 row">
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
             aria-live="polite">
            {{__('Showing')}} 1 {{__('to')}}
            {{$products->currentPage() == $products->lastPage() && $products->currentPage()
                > 1  ? $products->total() - ($products->perPage() * ($products->lastPage() - 1)): ($products->perPage()
                <=  $products->total() ?  $products->perPage()  : $products->total() )}}
            {{__('of')}} <b>{{$products->total()}}</b> {{__('entries')}}
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_paginate paging_simple_numbers float-end"
             id="DataTables_Table_0_paginate">
            {{@$products->links()}}
        </div>
    </div>
</div>
