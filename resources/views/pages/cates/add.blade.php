@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Add')}}</title>
@endsection
@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/css/plugins/forms/form-validation.css')}}">
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
                        <form action="{{route('cate-add-save')}}" enctype="multipart/form-data"  method="post" class="mt-2"  novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label  class="form-label" for="title" data-i18n="Title">{{__('Title')}}</label>
                                        <input
                                            type="text"
                                            id="title"
                                            class="form-control"
                                            name="title"
                                            placeholder="new title"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="slug" data-i18n="Slug">{{__('Slug')}}</label>
                                        <input
                                            type="text"
                                            id="slug"
                                            class="form-control"
                                            name="slug"
                                            placeholder="new slug"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="Order-by" data-i18n="Order by">{{__('Order by')}}</label>
                                        <input
                                            type="number"
                                            id="order-by"
                                            class="form-control"
                                            name="order_by"
                                            placeholder="1"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="parent_id" data-i18n="Parent cate">{{__('Parent cate')}}</label>
                                        <select class="form-select" id="parent_id" name="parent_id">
                                            @if(@$cates)
                                                 <option value="0" data-i18n="Not cate">{{__('parent not')}}</option>
                                            @php $prefix = '&#9672; &nbsp;' @endphp
                                                @foreach($cates as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->title}}</option>
                                                        @foreach($cate->childCate as  $childcates)
                                                            @include('pages.cates.ajax.cate-child', ['child_cates' => $childcates, 'prefix' => $prefix])
                                                        @endforeach
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="type" data-i18n="Type">{{__('type cate')}}</label>
                                        <select class="form-select type-cate" id="type" name="type">
                                            <option value="cate product" data-i18n="Cate product">{{__('cate product')}}</option>
                                            <option value="cate post" data-i18n="Cate post">{{__('cate post')}}</option>
                                            <option value="cate footer" data-i18n="Cate post">{{__('cate footer')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="user-status" data-i18n="Status">{{__('Status')}}</label>
                                        <select class="form-select" id="user-status" name="status">
                                            <option value="1" data-i18n="activate">{{__('Activate')}}</option>
                                            <option value="0" data-i18n="inactive">{{__('Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1" data-i18n="Photo">{{__('Photo')}}</h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <div class="fix-img me-2 mb-1 mb-md-0">
                                                <img
                                                    src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}"
                                                    id="blog-feature-image"
                                                    class="rounded"
                                                    alt="Blog Featured Image"
                                                />
                                            </div>
                                            <div class="featured-info">
                                                <div class="d-inline-block">
                                                    <input class="form-control blog_CustomFile" type="file" name="photo"
                                                           id="blogCustomFile" accept="image/*"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1" data-i18n="Save Changes">{{__('Save Changes')}}</button>
                                    <a href="{{route('index-cates')}}"  class="btn btn-outline-secondary" data-i18n="Cancel">{{__('Cancel')}}</a>
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
    <script src="{{asset('admin_asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/assets/js/ajax-cate.js')}}"></script>
@endsection
