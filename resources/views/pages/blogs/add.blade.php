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
                        <form id="post" action="{{route('post-add-save')}}" method="post" enctype="multipart/form-data" class="mt-2">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="title">{{__('Title')}}</label>
                                        <input
                                            type="text"
                                            id="title"
                                            class="form-control"
                                            placeholder="The Best Features Coming and Web design"
                                            name="title"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="blog-edit-category">{{__('Cate')}}</label>
                                        <select id="blog-edit-category" class="select2 form-select cate_id" multiple name="cate_id[]">
                                            @foreach(@$cates as $cate)
                                                <option value="{{@$cate->id}}">{{@$cate->title}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <label class="form-label" for="slug">{{__('Slug')}}</label>
                                        <input
                                            type="text"
                                            id="slug"
                                            class="form-control"
                                            placeholder="the-best-features-and-web-design"
                                            name="slug"
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
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{__('Content')}}</label>
                                        <div id="content-editor-wrapper">
                                            <div id="content-editor-container">
                                                <div class="contents" id="contents"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="border rounded p-2">
                                        <h4 class="mb-1">{{__('Featured Image')}}</h4>
                                        <div class="d-flex flex-column flex-md-row">
                                            <div style="width: 95px; height: 95px" class="fix-img me-2 mb-1 mb-md-0">
                                                <img
                                                    src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}"
                                                    id="blog-feature-image"
                                                    class="rounded me-2 mb-1 mb-md-0"
                                                    width="170"
                                                    height="110"
                                                    alt="Blog Featured Image"
                                                />
                                            </div>
                                            <div class="featured-info d-flex align-items-center">
                                                <div class="d-inline-block blog_CustomFile">
                                                    <input class="form-control blog_CustomFile" type="file" id="blogCustomFile" accept="image/*" name="file_thumb" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('admin_asset/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
@endsection
@section('page-js')
    <script src="{{asset('admin_asset/app-assets/js/scripts/pages/page-blog-edit.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/ajax-post.js')}}"></script>
    <script>
        $('#blog-edit-category').select2({
            placeholder: "Selected cate name"
        })
    </script>
@endsection
