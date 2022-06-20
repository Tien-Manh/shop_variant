@extends('layouts.layout-auth')
@section('title')
    <title data-i18n="Login">{{__('Reset password')}}</title>
@endsection
@section('content')
    <div class="content-body">
        <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0">
                <!-- Brand logo--><a style="left: 1rem" class="brand-logo justify-content-center" href="#">
                    <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" height="28">
                        <defs>
                            <linearGradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                <stop stop-color="#000000" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </linearGradient>
                            <linearGradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                            y2="100%">
                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                    <path class="text-primary" id="Path"
                                          d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                          style="fill: currentColor"></path>
                                    <path id="Path1"
                                          d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                          fill="url(#linearGradient-1)" opacity="0.2"></path>
                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                             points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                             points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                             points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <h2 class="brand-text text-primary">{{__('App')}}</h2>
                </a>
                <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5 m-auto">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                        @if(session('msg_rs'))
                            <span
                                style="color: #139906; position: relative; word-break: break-all; bottom: 0.5rem; font-weight: bold"
                                id="" class="error"> {{session('msg_rs')}}</span>
                        @endif
                        <h2 class="card-title fw-bold mb-1">{{__('Change Password')}} 🔒</h2>
                        <form class="auth-forgot-password-form mt-2" action="{{route('rs-pws')}}" method="POST"
                              novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="mb-1">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="new-password">{{__('New Password')}}</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input class="form-control form-control-merge" id="new-password" type="password"
                                           name="new_password" placeholder="············"
                                           aria-describedby="login-password" tabindex="2"><span
                                        class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                     width="14" height="14"
                                                                                     viewBox="0 0 24 24" fill="none"
                                                                                     stroke="currentColor"
                                                                                     stroke-width="2"
                                                                                     stroke-linecap="round"
                                                                                     stroke-linejoin="round"
                                                                                     class="feather feather-eye"><path
                                                d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12"
                                                                                                                cy="12"
                                                                                                                r="3"></circle></svg></span>
                                </div>
                                @error('new_password')
                                <span style="color: #ea5455; position: relative; word-break: break-all;"
                                      class="error"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="corm-password">{{__('Retype New Password')}}</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input class="form-control form-control-merge" id="corm-password" type="password"
                                           name="comfirm_password" placeholder="············"
                                           aria-describedby="login-password" tabindex="2"><span
                                        class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                     width="14" height="14"
                                                                                     viewBox="0 0 24 24" fill="none"
                                                                                     stroke="currentColor"
                                                                                     stroke-width="2"
                                                                                     stroke-linecap="round"
                                                                                     stroke-linejoin="round"
                                                                                     class="feather feather-eye"><path
                                                d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12"
                                                                                                                cy="12"
                                                                                                                r="3"></circle></svg></span>
                                </div>
                                @error('comfirm_password')
                                <span style="color: #ea5455; position: relative; word-break: break-all;"
                                      class="error"> {{$message}}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary w-100 waves-effect waves-float waves-light"
                                    tabindex="2">{{__('Change Password')}}</button>
                        </form>
                        <p class="text-center mt-2"><a href="{{route('login')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-left">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg> {{__('Back to login')}}/a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

