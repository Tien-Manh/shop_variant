@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Edit">{{__('Edit')}}</title>
@endsection
@section('page-css')
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
                        <form action="{{route('setting-save')}}" enctype="multipart/form-data" method="post"
                              class="mt-2" novalidate>
                            @csrf
                            <div class="row">
                                @foreach($settings as $setting)
                                    @if($setting->key == 'logo' || $setting->key == 'logo_footer' || $setting->key == 'favicon_icon')
                                        <div class="col-6 mb-2">
                                            <label class="form-label" for="{{$setting->key}}"
                                                   data-i18n="Status">{{$setting->key}}</label>
                                            <div class="border rounded p-2" style="height: 120px;">
                                                <div class="d-flex flex-column flex-md-row">
                                                    <div class="fix-img me-2 mb-1 mb-md-0" style="width: 80px; height: 80px; background-color: black;">
                                                        @if($setting->value != '' || $setting->value != null)
                                                            <img style="height: auto"
                                                                src="{{asset('storage/'. $setting->value)}}"
                                                                id="blog-feature-image"
                                                                class="rounded"
                                                                alt="Blog Featured Image"
                                                            />
                                                        @else
                                                            <img style="height: auto"
                                                                src="{{asset('admin_asset/app-assets/images/slider/03.jpg')}}"
                                                                id="blog-feature-image"
                                                                class="rounded"
                                                                alt="Blog Featured Image"
                                                            />
                                                        @endif
                                                    </div>
                                                    <div class="featured-info">
                                                        <small class="text-muted"></small>
                                                        <p class="my-50">
                                                            <a href="#" id="blog-image-text"></a>
                                                        </p>
                                                        <div class="d-inline-block">
                                                            <input class="form-control blog_CustomFile" type="file"
                                                                   name="{{$setting->key}}"
                                                                   id="blogCustomFile" accept="image/*"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="{{$setting->key}}"
                                                       data-i18n="Status">{{$setting->key}}</label>
                                                <label class="form-label" for="slug" data-i18n="Value"></label>
                                                <input
                                                    type="text"
                                                    id="{{$setting->key}}"
                                                    class="form-control"
                                                    name="{{$setting->key}}"
                                                    value="{{$setting->value}}"
                                                />
                                            </div>
                                        </div>
                                    @endif
{{--                                    <div class="col-md-4 col-12">--}}
{{--                                        <div class="mb-1">--}}
{{--                                            <label class="form-label" for="status_{{$setting->key}}"--}}
{{--                                                   data-i18n="Status">{{__('Status')}}</label>--}}
{{--                                            <select class="form-select" id="status_{{$setting->key}}"--}}
{{--                                                    name="status_{{$setting->key}}">--}}
{{--                                                <option value="1" @if($setting->status == 1) selected--}}
{{--                                                        @endif data-i18n="activate">{{__('Activate')}}</option>--}}
{{--                                                <option value="0" @if($setting->status == 0) selected--}}
{{--                                                        @endif data-i18n="inactive">{{__('Inactive')}}</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endforeach
                                <div class="col-12 mt-50">
                                    <button type="submit" class="btn btn-primary me-1"
                                            data-i18n="Save Changes">{{__('Save')}}</button>
                                    <a href="{{route('admin.cp')}}" class="btn btn-outline-secondary"
                                       data-i18n="Cancel">{{__('Cancel')}}</a>
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
    <script src="{{asset('admin_asset/assets/js/ajax-users.js')}}"></script>
@endsection
