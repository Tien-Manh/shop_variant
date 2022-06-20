@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Profile')}}</title>
@endsection
@section('css-page')
    <link rel="stylesheet" href="{{asset('front_asset/css/profile.css')}}" type="text/css">
@endsection
@section('content')
    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <div class="side-bar">
                        <div class="user-info">
                            <img class="img-profile img-circle img-responsive center-block" src="{{asset('storage/' .$user->photo)}}" alt="">
                            <ul class="meta list list-unstyled">
                                <li class="name">
                                    {{$user->name}}
                                </li>
                                <li class="name">
                                    {{$user->user_name}}
                                </li>
                                <li class="email"><a href="#">{{$user->email}}</a></li>
                            </ul>
                        </div>
                        <nav class="side-menu">
                            <ul class="nav">
                                <li re="info" class="@if(session('msg-r') == null) active @endif"><a href="javascript:void(0)"><span class="fa fa-user"></span> {{__('Profile')}}</a></li>
                                <li re="paswword" class="@if(session('msg-r')) active @endif"><a href="javascript:void(0)"><span class="fa fa-cog"></span> {{__('Password')}}</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="tab1" @if(session('msg-r') != null) style="display: none" @endif class="tab-content">
                        <div id="pane1" class="content-panel">
                            <h2 class="title">{{__('Profile')}}
                                @if(session('msg'))
                                    <span class="text-success ml-5">{{session('msg')}}</span>
                                @endif
                                @if(session('msg-err'))
                                    <span class="text-danger ml-5">{{session('msg-err')}}</span>
                                @endif
                            </h2>
                            <form action="{{route('user.update.img')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group avatar">
                                    <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                        <input type="file" class="file-uploader pull-left" name="file">
                                        <button type="submit" class="btn btn-sm btn-default-alt btn-dark pull-left">{{__('Update Image')}}</button>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal" novalidate method="post" action="{{route('user.update.info')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">{{__('Name')}}</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('Phone')}}</label>
                                            <div class="col-md-12 col-sm-2 col-xs-12">
                                                <input type="email" class="form-control" value="{{$user->phone}}" name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('Country')}}</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="email" class="form-control" value="{{$user->country}}" name="country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('Address')}}</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="email" class="form-control" value="{{$user->address}}" name="address">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('Address')}} 2</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="email" class="form-control" value="{{$user->address2}}" name="address2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('Ship to address')}}</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="email" class="form-control" value="{{@$shipto->address}}" name="shipto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                        <input class="btn btn-dark" type="submit" value="{{__('Update Profile')}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="tab2" @if(session('msg-r')) style="display: block" @endif  class="tab-content">
                        <div id="pane1" class="content-panel">
                            <h2 class="title">{{__('Change Password')}}
                                @if(session('msg'))
                                    <span class="text-success ml-5">{{session('msg')}}</span>
                                @endif
                                @if(session('msg-err'))
                                    <span class="text-danger ml-5">{{session('msg-err')}}</span>
                                @endif
                            </h2>
                            <form class="form-horizontal" novalidate method="post" action="{{route('user.password.save')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">{{__('Password')}}</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" class="form-control" name="password">
                                                @error('password')
                                                <span style="color: #ea5455; position: relative; word-break: break-all;"
                                                      class="error"> {{$errors->first('password')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('Retype New Password')}}</label>
                                            <div class="col-md-12 col-sm-2 col-xs-12">
                                                <input type="password" class="form-control" name="new_password">
                                                @error('new_password')
                                                <span style="color: #ea5455; position: relative; word-break: break-all;"
                                                      class="error"> {{$errors->first('new_password')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2  col-sm-3 col-xs-12 control-label">{{__('confirm_new_password')}}</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" class="form-control" name="confirm_new_password">
                                                @error('confirm_new_password')
                                                <span style="color: #ea5455; position: relative; word-break: break-all;"
                                                      class="error"> {{$errors->first('confirm_new_password')}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                        <input class="btn btn-dark" type="submit" value="{{__('Update Password')}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
