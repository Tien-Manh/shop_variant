@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Add">{{__('Add')}}</title>
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
                        <form action="{{route('user-add-save')}}" enctype="multipart/form-data" method="post"
                              class="mt-2" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="full-name"
                                               data-i18n="Full Name">{{__('Full Name')}}</label>
                                        <input
                                            type="text"
                                            id="full-name"
                                            class="form-control"
                                            name="fullname"
                                            placeholder="Main join h"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="user-name"
                                               data-i18n="User Name">{{__('User Name')}}</label>
                                        <input
                                            type="text"
                                            id="user-name"
                                            class="form-control"
                                            name="username"
                                            placeholder="join01"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="user-email"
                                               data-i18n="Email">{{__('Email')}}</label>
                                        <input
                                            type="email"
                                            id="user-email"
                                            class="form-control"
                                            name="email"
                                            placeholder="join@gmail.com"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="user-status"
                                               data-i18n="Status">{{__('Status')}}</label>
                                        <select class="select2 form-select" id="user-status" name="status">
                                            <option value="1" data-i18n="activate">{{__('Activate')}}</option>
                                            <option value="0" data-i18n="inactive">{{__('Inactive')}}</option>
                                        </select>
                                    </div>
                                </div>
                                @if(Auth::user()->role  <= 1)
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="user-role"
                                                   data-i18n="Role">{{__('Role')}}</label>
                                            <select class="select2 form-select" id="user-role" name="role">
                                                @if(Auth::user()->role == 0)
                                                    <option value="1" data-i18n="Mod">{{__('Admin')}}</option>
                                                @endif
                                                <option value="3" selected data-i18n="Member">{{__('Mod')}}</option>
                                                <option value="3" selected data-i18n="Member">{{__('Member')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-4 col-12">
                                    <div class="mb-2 in">
                                        <label class="form-label" for="user-password"
                                               data-i18n="Password">{{__('Password')}}</label>
                                        <div class="input-group form-password-toggle">
                                            <button class="btn btn-outline-primary waves-effect" id="create-password"
                                                    type="button" data-i18n="Create">{{__('Create')}}
                                            </button>
                                            <input
                                                type="password"
                                                id="user-password"
                                                class="form-control"
                                                name="password"
                                            />
                                            <span class="input-group-text cursor-pointer" id="eye-user">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-eye font-small-4"><path
                                                        d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </span>
                                        </div>
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
                                    <button type="submit" class="btn btn-primary me-1"
                                            data-i18n="Save Changes">{{__('Save Changes')}}</button>
                                    <a href="{{route('index-users')}}" class="btn btn-outline-secondary"
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
