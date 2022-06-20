@extends('layouts.layout-full')
@section('title')
    <title data-i18n="Account">{{__('Profile')}}</title>
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
    <div class="content-body">
        <!-- account setting page -->
        <section id="page-account-settings">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0">
                    <ul class="nav nav-pills flex-column nav-left">
                        <!-- general -->
                        <li class="nav-item">
                            <a class="nav-link active" id="account-pill-general" data-bs-toggle="pill"
                               href="#account-vertical-general" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user font-medium-3 me-1">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="fw-bold">{{__('General')}}</span>
                            </a>
                        </li>
                        <!-- change password -->
                        <li class="nav-item">
                            <a class="nav-link" id="account-pill-password" data-bs-toggle="pill"
                               href="#account-vertical-password" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-lock font-medium-3 me-1">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span class="fw-bold">{{__('Change Password')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/ left menu section -->

                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- general tab -->
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                     aria-labelledby="account-pill-general" aria-expanded="true">
                                    <!-- header section -->
                                    <form id="profile" action="{{route('save.image.user')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{$user->id}}" name="id">
                                        <div class="d-flex">
                                            <a href="#" class="me-25">
                                                <img src="{{asset('storage/'.$user->photo)}}" id="blog-feature-image"
                                                     class="rounded me-50" alt="profile image" height="140"
                                                     width="auto">
                                            </a>
                                            <!-- upload and reset button -->
                                            <div class="mt-75 ms-1 featured-info">
                                                <label for="blogCustomFile"
                                                       class="btn btn-sm btn-primary mb-75 me-75 waves-effect waves-float waves-light">{{__('Upload')}}</label>
                                                <input type="file" id="blogCustomFile" hidden="" class="blog_CustomFile"
                                                       accept="image/*" name="photo">
                                                {{--                                                <button--}}
                                                {{--                                                    class="btn btn-sm btn-outline-secondary mb-75 waves-effect btnrs me-75">{{__('Reset')}}</button>--}}
                                                <button
                                                    class="btn btn-sm btn-outline-secondary mb-75 waves-effect btnsv">{{__('Save')}}</button>
                                            </div>
                                            <!--/ upload and reset button -->
                                        </div>
                                    </form>
                                </div>
                                <!--/ general tab -->

                                <!-- change password -->
                                <div class="tab-pane fade" id="account-vertical-password" role="tabpanel"
                                     aria-labelledby="account-pill-password" aria-expanded="false">
                                    <!-- form -->
                                    <form id="change-pass" action="{{route('change.password')}}" class="validate-form"
                                          novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" value="{{$user->id}}" name="id">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="account-old-password">{{__('Old Password')}}</label>
                                                    <div class="input-group form-password-toggle input-group-merge">
                                                        <input type="password" class="form-control"
                                                               id="account-old-password" name="password"
                                                               placeholder="Old Password">
                                                        <div class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                 height="14" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-eye">
                                                                <path
                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="account-new-password">{{__('New Password')}}</label>
                                                    <div class="input-group form-password-toggle input-group-merge">
                                                        <input type="password" id="account-new-password"
                                                               name="new_password" class="form-control"
                                                               placeholder="New Password">
                                                        <div class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                 height="14" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-eye">
                                                                <path
                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                           for="account-retype-new-password">{{__('Retype New Password')}}</label>
                                                    <div class="input-group form-password-toggle input-group-merge">
                                                        <input type="password" class="form-control"
                                                               id="account-retype-new-password"
                                                               name="confirm_new_password" placeholder="New Password">
                                                        <div class="input-group-text cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                 height="14" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-eye">
                                                                <path
                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit"
                                                        class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">
                                                    {{__('Save changes')}}
                                                </button>
                                                <button type="reset"
                                                        class="btn btn-outline-secondary mt-1 waves-effect">{{__('Cancel')}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ form -->
                                </div>
                                <!--/ change password -->

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ right content section -->
            </div>
        </section>
        <!-- / account setting page -->

    </div>
@endsection
@section('page-js')
    <script>
        !function (e, t, o) {
            "use strict";
            var l = o("#blog-feature-image"), r = t.getElementById("blog-image-text"), a = o("#blogCustomFile");
            $(document).on("change", '.blog_CustomFile', function (e) {
                var t = new FileReader, o = e.target.files;
                let getElment = $(this).parents('.featured-info').prev().children('img')
                t.onload = function () {
                    getElment.attr("src", t.result)
                }, t.readAsDataURL(o[0])
            })
        }(window, document, jQuery);

        {{--$('.btnrs').on('click', function (e) {--}}
        {{--    e.preventDefault()--}}
        {{--    $('#blog-feature-image').attr('src', '{{asset('storage/'.$user->photo)}}')--}}
        {{--})--}}
        $('form#change-pass').on('submit', function (e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: '{{route('change.password')}}',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    $("span.error").remove();
                    if (res.success === true) {
                        $('form#change-pass')[0].reset()
                        console.log(1)
                        toastr.success("", res.message, {
                            closeButton: !0,
                            tapToDismiss: !1
                        })
                    } else if (res.success === false) {
                        if (res.errorpassword) {
                            $('input[name=password]').parent().append(`<span class="error">${res.errorpassword}</span>`)
                        } else {
                            keys = Object.keys(res.messages)
                            toastr.error("", res.message, {
                                closeButton: !0,
                                tapToDismiss: !1
                            })
                            keys.forEach((val) => {
                                $('input[name=' + val).parent().append(`<span class="error">${res.messages[val][0]}</span>`)
                            })
                        }
                    }
                }
            })
        })
        $('form#profile').on('submit', function (e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: '{{route('save.image.user')}}',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (res) {
                    $("span.error").remove();
                    $("br.wer").remove();
                    if (res.success === true) {
                        toastr.success("", res.message, {
                            closeButton: !0,
                            tapToDismiss: !1
                        })
                    } else if (res.success === false) {
                        keys = Object.keys(res.messages)
                        toastr.error("", res.message, {
                            closeButton: !0,
                            tapToDismiss: !1
                        })
                        keys.forEach((val) => {
                            $('input[name=' + val).parent().append(`<br class="wer"><span class="error">${res.messages[val][0]}</span>`)
                        })
                    }
                }
            })
        })
    </script>
@endsection
