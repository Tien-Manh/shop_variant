@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Add')}}</title>
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@section('page-css')
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
    <div class="blog-edit-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form id="products" action="{{route('product-add-save')}}" method="post" enctype="multipart/form-data"
                              class="mt-2 invoice-repeater">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="title" data-i18n="Title">{{__('Title')}}</label>
                                        <input
                                            type="text"
                                            id="title"
                                            class="form-control"
                                            placeholder="The Product and Web design"
                                            name="title"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="slug" data-i18n="Slug">{{__('Slug')}}</label>
                                        <input
                                            type="text"
                                            id="slug"
                                            class="form-control"
                                            placeholder="the-product-and-web-design"
                                            name="slug"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="cate_id" data-i18n="Cate">{{__('Cate')}}</label>
                                        <select id="cate_id" name="cate_id[]" class="select2 form-select" multiple>
                                            @if(@$cates)
                                                @php $prefix = '&#9672; &nbsp;' @endphp
                                                @foreach($cates as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                                                    @foreach($cate->childCate as  $childcates)
                                                        @include('pages.cates.ajax.cate-child', ['child_cates' => $childcates, 'prefix' => $prefix])
                                                    @endforeach
                                                @endforeach
{{--                                                @foreach($cates as $cate)--}}
{{--                                                    <option value="{{$cate->id}}">{{$cate->title}}</option>--}}
{{--                                                    @foreach($cate->childCate as  $childcates)--}}
{{--                                                        @include('pages.cates.ajax.cate-child', ['child_cates' => $childcates, 'prefix' => $prefix])--}}
{{--                                                    @endforeach--}}
{{--                                                @endforeach--}}
                                            @else
                                                <option
                                                        data-i18n="Not cate" disabled>{{__('Not parent cate')}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="brand_id"
                                               data-i18n="Brand">{{__('Brand')}}</label>
                                        <select id="brand_id" name="brand_id" class="select2 form-select">
                                            @if(@$brands)
                                                <option data-i18n="" disabled selected>{{__('Select brand')}}</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            @else
                                                <option data-i18n="Not brand">{{__('Not brand')}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="sku" data-i18n="SKU">{{__('SKU')}}</label>
                                        <input
                                            type="text"
                                            id="sku"
                                            class="form-control"
                                            placeholder="RTX-05500"
                                            name="sku"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="blog-edit-status"
                                               data-i18n="Status">{{__('Status')}}</label>
                                        <select class="form-select select2" id="blog-edit-status" name="active">
                                            <option  value="1" data-i18n="Active">{{__('Active')}}</option>
                                            <option  value="0" data-i18n="Inactive">{{__('Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="attribute"
                                               data-i18n="Attribute">{{__('Attribute')}}</label>
                                        <select place-data="Attribute name" class="select2 form-select attribute"
                                                name="attribute[]" multiple>
                                            @if(@$attributes && count($attributes) > 0)
                                                @foreach($attributes as $attribute)
                                                    <option
                                                        value="{{$attribute->id}}">{{$attribute->name}}</option>
                                                @endforeach
                                            @else
                                                <option value="0"
                                                        data-i18n="Default">{{__('Default')}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 d-flex align-items-end">
                                    <div class="mb-1 w-100">
                                        <div class="form-modal-ex">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary waves-effect w-100"
                                                    data-bs-toggle="modal" data-bs-target="#inlineForm">
                                                {{__('Add Attribute Name')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 d-flex align-items-end">
                                    <div class="mb-1 w-100">
                                        <div class="form-modal-ex">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary waves-effect w-100"
                                                    data-bs-toggle="modal" data-bs-target="#inlineForm1">
                                                {{__('Add Attribute Value')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div data-repeater-list="invoice">
                                    <div data-repeater-item>
                                        <p class="text-success mt-1">{{__('Variant')}}</p>
                                        <hr>
                                        <div class="row d-flex align-items-end invoice">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-4 col-12 mt-2">
                                                        <div class="col-12 mb-1">
                                                            <div class="border rounded p-1">
                                                                <h4 class="mb-1">{{__('Featured Image')}}</h4>
                                                                <div>
                                                                    <div style="width: 75px; height: 75px" class="fix-img me-2 mb-1 mb-md-0">
                                                                        <img
                                                                            src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}"
                                                                            id="blog-feature-image"
                                                                            class="rounded blog-feature-image"
                                                                            alt="Blog Featured Image"
                                                                        />
                                                                    </div>
                                                                    <div class="featured-info mt-1">
                                                                        <div class="d-inline-block">
                                                                            <input class="form-control blog_CustomFile"
                                                                                   type="file" name="file_thumb"
                                                                                   id="blogCustomFile"
                                                                                   accept="image/*"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="attribute_value"
                                                                           data-i18n="Attribute Value">{{__('Attribute Value')}}</label>
                                                                    <select place-data="Attribute value" class="select2 form-select attribute_value"
                                                                            name="attribute_value" multiple>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="sku_detail"
                                                                           data-i18n="SKU">{{__('SKU')}}</label>
                                                                    <input
                                                                        type="text"
                                                                        id="sku_detail"
                                                                        class="form-control"
                                                                        placeholder="RTX-05500-SL"
                                                                        name="sku_detail"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="active_product_detail"
                                                                           data-i18n="Status">{{__('Status')}}</label>
                                                                    <select class="form-select select2 active_product_detail" name="active_product_detail">
                                                                        <option selected value="1" data-i18n="Active">{{__('Active')}}</option>
                                                                        <option value="0" data-i18n="Inactive">{{__('Inactive')}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="quantity"
                                                                           data-i18n="Quantity">{{__('Quantity')}}</label>
                                                                    <input
                                                                        type="number"
                                                                        id="quantity"
                                                                        class="form-control"
                                                                        placeholder="50"
                                                                        name="quantity"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="cost"
                                                                           data-i18n="Cost">{{__('Cost')}}</label>
                                                                    <input
                                                                        type="number"
                                                                        id="cost"
                                                                        class="form-control"
                                                                        placeholder="10"
                                                                        name="cost"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="price"
                                                                           data-i18n="Price">{{__('Price')}}</label>
                                                                    <input
                                                                        type="number"
                                                                        id="price"
                                                                        class="form-control"
                                                                        placeholder="20"
                                                                        name="price"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="sell_price"
                                                                           data-i18n="Sell Price">{{__('Sell Price')}}</label>
                                                                    <input
                                                                        type="number"
                                                                        id="sell_price"
                                                                        class="form-control"
                                                                        placeholder="15"
                                                                        name="sell_price"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-6">
                                                                <div class="mb-1">
                                                                    <div class="form-check form-check-info">
                                                                        <label class="form-check-label">{{__('Is default')}}</label>
                                                                        <input value="1" type="checkbox" id="is_default" name="is_default" class="form-check-input" checked>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-12 pr_f" name="checkBtn">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-sm btn-outline-danger text-nowrap px-1 waves-effect"
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <button type="button" class="btn btn-icon btn-primary" data-repeater-create>
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>{{__('Add New')}}</span>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label">{{__('Content')}}</label>
                                        <div id="content-editor-wrapper">
                                            <div id="content-editor-container">
                                                <div class="contents" id="contents"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="dropzone dropzone-file-area dz-clickable"
                                         id="dpz-remove-thumb">
                                        <div class="dz-default dz-message">{{__('Drop files here or click to upload.')}}</div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
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
    <!-- Modal -->
    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('Add Attribute')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="attributes" action="{{route('attribute-add-save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label id="name_attribute">{{__('Name')}}</label>
                        <input type="text" placeholder="Color" class="form-control" id="name_attribute"
                               name="name_attribute">
                    </div>
                    <div class="modal-body">
                        <label id="type">{{__('Type')}}</label>
                        <select id="type" class="form-select select2 active_product_detail" name="type">
                            <option selected value="default" data-i18n="Default">{{__('Default')}}</option>
                            <option value="filters" data-i18n="Filters">{{__('Filters')}}</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button id="attribute-btn" type="submit"
                                class="btn btn-primary waves-effect waves-float waves-light">{{__('Add')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-start" id="inlineForm1" tabindex="-1" aria-labelledby="myModalLabel33">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('Add Attribute Value')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  id="attribute_values" action="{{route('attribute-value-add-save')}}">
                    @csrf
                    <div class="modal-body">
                        <label id="name">{{__('Name')}}</label>
                        <div class="mb-1">
                            <select class="form-select select2" id="attribute1" name="attribute1">
                                @if(@$attributes && count($attributes) > 0)
                                    <option disabled selected
                                            value="nodata">{{__('select attribute name')}}</option>
                                    @foreach($attributes as $attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                    @endforeach
                                @else
                                    <option disabled selected
                                            value="nodata">{{__('select attribute name')}}</option>
                                @endif
                            </select>
                        </div>
                        <label id="value-attribute">{{__('Value')}}</label>
                        <div class="mb-1">
                            <input type="text" placeholder="Color" class="form-control" id="value-attribute"
                                   name="value_attribute">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-primary waves-effect waves-float waves-light">{{__('Add')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('vendor-js')
    <script src="{{asset('admin_asset/app-assets/vendors/js/file-uploaders/dropzone.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/app-assets/js/scripts/pages/page-blog-edit.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/ajax-product.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/js/scripts/forms/form-file-uploader.js')}}"></script>
    <script>
        let message_p = '{{__('Value attribute already exists')}}'
        $(function () {
            'use strict';
            // form repeater jquery
            $('.invoice-repeater, .repeater-default').repeater({
                show: function () {
                    let values = ($(this).prev().find('select.attribute_value').val())
                    $(this).slideDown()
                    $(this).find('.select2-container').remove()
                    let options = $(this).prev().find('select.attribute_value optgroup').clone(true)
                    $(this).find('select.active_product_detail').val(1).select2().trigger('change')
                    $(this).find('select.attribute_value').html(options)
                    $(this).prev().find('select.attribute_value').select2({
                        placeholder: $(this).prev().find('select.attribute_value').attr('place-data')
                    })
                    $(this).find('select.attribute_value').val([]).select2({
                        allowClear: true,
                        placeholder: $(this).prev().find('select.attribute_value').attr('place-data')
                    })
                    $(this).find('#quantity').val($(this).prev().find('#quantity').val())
                    $(this).find('#cost').val($(this).prev().find('#cost').val())
                    $(this).find('#price').val($(this).prev().find('#price').val())
                    $(this).find('#sell_price').val($(this).prev().find('#sell_price').val())
                    let getForNew = $(this).find('select.attribute_value ').parent().prev('label')
                    let getSelectNew = $(this).find('select')
                    // $.each(getSelectNew, function (index, item) {
                    //     if(getForNew[index]) {
                    //         $(item).attr('id', getForNew[index].getAttribute('for'));
                    //     }
                    // })
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

    </script>
@endsection
