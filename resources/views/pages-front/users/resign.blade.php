@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Resign')}}</title>
@endsection
@section('css-page')
    <link rel="stylesheet" href="{{asset('front_asset/css/style-css-form.css')}}" type="text/css">
@endsection
@section('content')
    <section id="Los">
        <div class="noi-dung m-auto">
            <div class="form">
                <h2>{{__('registration')}}</h2>
                <br>
                @if(session('msg_resign'))
                    <span class="text-success pb-1"> {{session('msg_resign')}}</span>
                @endif
                <form action="{{route('user.save.resign')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-form">
                                <span>{{__('Name')}}</span>
                                <input type="text" name="resign_name" value="{{old('resign_name')}}">
                                @error('resign_name')
                                     <span class="text-danger"> {{$errors->first('resign_name')}}</span>
                                @enderror
                            </div>
                            <div class="input-form">
                                <span>{{__('User Name')}}</span>
                                <input type="text" name="resign_username" value="{{old('resign_username')}}">
                                @error('resign_username')
                                <span class="text-danger"> {{$errors->first('resign_username')}}</span>
                                @enderror
                            </div>
                            <div class="input-form">
                                <span>{{__('Email')}}</span>
                                <input type="text" name="resign_email" value="{{old('resign_email')}}">
                                @error('resign_email')
                                <span class="text-danger"> {{$errors->first('resign_email')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-form">
                                <span>{{__('Password')}}</span>
                                <input type="password" name="resign_password">
                                @error('resign_password')
                                <span class="text-danger"> {{$errors->first('resign_password')}}</span>
                                @enderror
                            </div>
                            <div class="input-form">
                                <span>{{__('Confirm Password')}}</span>
                                <input type="password" name="confirm_password">
                                @error('confirm_password')
                                <span class="text-danger"> {{$errors->first('confirm_password')}}</span>
                                @enderror
                            </div>
                            <span><br></span>
                            <div class="input-form" >
                                <input type="submit" value="{{__('registration')}}" style="height: 45px">
                            </div>
                        </div>
                    </div>
                    <div class="input-form mt-3">
                        <p>{{__('You have account')}}?  <a href="{{route('user.login')}}">{{__('Login')}}</a></p>
                    </div>
                </form>
                <ul class="icon-dang-nhap mt-md-1 mt-3">
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
