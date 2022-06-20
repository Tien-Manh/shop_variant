@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Add')}}</title>
@endsection
@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_asset/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
@endsection
@section('page-css')
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
    <div class="blog-edit-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form id="banner" action="{{route('banner-add-save')}}" enctype="multipart/form-data"  method="post" class="mt-2"  novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-12">
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
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="slug" data-i18n="Slug">{{__('Description')}}</label>
                                        <div id="content-editor-wrapper">
                                            <div id="content-editor-container">
                                                <div class="contents" id="contents"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="Order-by" data-i18n="Order by">{{__('Link')}}</label>
                                        <input
                                            type="text"
                                            id="order-by"
                                            class="form-control"
                                            name="link"
                                            placeholder="http://app/url"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-status">{{__('Status')}}</label>
                                        <select class="form-selec select2" id="blog-edit-status" name="status">
                                            <option value="1" data-i18n="Active">{{__('Active')}}</option>
                                            <option value="0" data-i18n="Inactive">{{__('Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1" data-i18n="Photo">{{__('Photo')}}</h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <div style="width: 100%; height: auto" class="fix-img me-2 mb-1 mb-md-0">
                                                <img
                                                    src="{{asset('admin_asset/app-assets/images/banner/banner-9.jpg')}}"
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
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/app-assets/js/scripts/pages/page-blog-edit.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/ajax-baner.js')}}"></script>
@endsection
