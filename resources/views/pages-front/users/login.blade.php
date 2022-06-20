@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Login')}}</title>
@endsection
@section('css-page')
    <link rel="stylesheet" href="{{asset('front_asset/css/style-css-form.css')}}" type="text/css">
@endsection
@section('content')
    <section>
        <div class="noi-dung m-auto">
            <div class="form login">
                <h2>{{__('Login')}}</h2>
                <div class="input-form">
                <p>{{__('Forgot Password ?')}} <a href="{{route('reset.user')}}">{{__('Click here')}}?</a></p>
                </div>
                @if(session('msg_login'))
                    <span style="color: #ea5455; position: relative; word-break: break-all; bottom: 0.5rem"; class="error"> {{session('msg_login')}}</span>
                @endif
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    <div class="input-form">
                        <span>{{__('User Name')}}</span>
                        <input type="text" name="login_email">
                    </div>
                    <div class="input-form">
                        <span>{{__('Password')}}</span>
                        <input type="password" name="login_password">
                    </div>
                    <div class="nho-dang-nhap">
                        <label> <input type="checkbox" name=""> {{__('Remember  Me')}}</label>
                    </div>
                    <div class="input-form">
                        <input type="submit" value="{{__('Login')}}">
                    </div>
                    <div class="input-form" style="margin-top: 13px">
                        <p>{{__('You have not account')}}? <a href="{{route('user.resign')}}">{{__('registration')}}</a></p>
                    </div>
                </form>
                <ul class="icon-dang-nhap pb-5">
                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-google" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
