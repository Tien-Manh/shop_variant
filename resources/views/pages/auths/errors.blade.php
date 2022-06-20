@extends('layouts.layout-auth')
@section('title')
    <title data-i18n="Login">{{__('Login')}}</title>
@endsection
@section('content')
    <div class="content-body">
        <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0">
                <div class="d-flex col-lg-4 align-items-center px-2 p-lg-5 m-auto" style="margin-top: 8rem !important;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto text-center">
                        <span style="color: #139906; word-break: break-all; font-size: 16px;  font-weight: bold" id="" class="error"> {{$msg_rs}}</span>
                        <p class="text-center mt-2"><a style="font-size: 18px; font-weight: bold" href="{{route('login')}}"><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> Back to login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

