<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">
            @if(Auth::user())
                <div class="avatar">
                    <img style="cursor: pointer" src="{{asset('storage/' .@Auth::user()->photo)}}" alt="">
                </div>
                <div class="header__top__hover profile mr-3">
                            <span>{{Auth::user()->name}}
                                <i class="arrow_carrot-down"></i>
                            </span>
                    <ul>
                        <li><a class="btn " href="{{route('user.profile')}}">{{__('Profile')}}</a></li>
                        <li><a class="btn " href="{{route('user.order')}}">{{__('Orders')}}</a></li>
                        <li><a class="btn" href="{{route('user.logout')}}">{{__('Sign out')}}</a></li>
                    </ul>
                </div>
            @else
                <div class="header__top__links">
                    <a href="{{route('user.login')}}">{{__('Sign in')}}</a>
                </div>
            @endif
{{--            @if(Auth::user())--}}
{{--                <a href="{{route('user.logout')}}">{{__('Sign out')}}</a>--}}
{{--            @else--}}
{{--                <a href="{{route('user.login')}}">{{__('Sign in')}}</a>--}}
{{--            @endif--}}
        </div>
        <div class="offcanvas__top__hover @if (session()->get('locale') == 'en') fix-bar @endif">
            @if (session()->get('locale') == 'en')
                <span>English
                                <i class="arrow_carrot-down"></i>
                            </span>
            @else
                <i class="flag-icon flag-icon-vn"></i>
                <span> Vietnamese
                                <i class="arrow_carrot-down"></i>
                            </span>
            @endif
            <ul>
                <li><a class="btn text-white" href="{{route('swich.language', ['en'])}}">English</a></li>
                <li><a class="btn text-white" href="{{route('swich.language', ['vi'])}}">Vietnamese</a></li>
            </ul>
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{asset('front_asset/img/icon/search.png')}}" alt=""></a>
        <a href="#"><img src="{{asset('front_asset/img/icon/heart.png')}}" alt=""></a>
        <a href="{{route('show.cart')}}"><img src="{{asset('front_asset/img/icon/cart.png')}}" alt="">
            <span class="sum_total">{{\App\Http\Controllers\Fronts\ProductShopController::getTotalcart()}}</span></a>
        <div class="price sum_price"
             >{{number_format(\App\Http\Controllers\Fronts\ProductShopController::getSumPrice(),0,0,'.')}}
            VNĐ
        </div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
    </div>
</div>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">

                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        @if(Auth::user())
                            <div class="avatar">
                                <img style="cursor: pointer" src="{{asset('storage/' .@Auth::user()->photo)}}" alt="">
                            </div>
                            <div class="header__top__hover profile mr-3">
                            <span>{{Auth::user()->name}}
                                <i class="arrow_carrot-down"></i>
                            </span>
                                <ul>
                                    <li><a class="btn " href="{{route('user.profile')}}">{{__('Profile')}}</a></li>
                                    <li><a class="btn " href="{{route('user.order')}}">{{__('Orders')}}</a></li>
                                    <li><a class="btn" href="{{route('user.logout')}}">{{__('Sign out')}}</a></li>
                                </ul>
                            </div>
                        @else
                        <div class="header__top__links">
                                <a href="{{route('user.login')}}">{{__('Sign in')}}</a>
                        </div>
                        @endif
                        <div class="header__top__hover">
                            @if (session()->get('locale') == 'en')
                                <span>English
                                <i class="arrow_carrot-down"></i>
                            </span>
                            @else
                                <i class="flag-icon flag-icon-vn"></i>
                                <span> Vietnamese
                                <i class="arrow_carrot-down"></i>
                            </span>
                            @endif
                            <ul>
                                <li><a class="btn " href="{{route('swich.language', ['en'])}}">English</a></li>
                                <li><a class="btn " href="{{route('swich.language', ['vi'])}}">Vietnamese</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="myHeader">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"><img src="{{asset('storage/'.$configs['logo'])}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="@if(request()->routeIs('home') || request()->routeIs('user.profile') )active @endif"><a
                                href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li class="@if(request()->routeIs('shop') || request()->routeIs('product.detail')
                            || request()->routeIs('cate.product') || request()->routeIs('brand.product')
                            ||request()->routeIs('show.cart') ||request()->routeIs('checkout')
                             || request()->routeIs('user.order') || request()->routeIs('wishlist'))active @endif"><a
                                href="{{route('shop')}}">{{__('Products')}}</a></li>
                        <li class="@if(request()->routeIs('blogs') || request()->routeIs('blog.detail'))active @endif"><a href="{{route('blogs')}}">{{__('Blogs')}}</a></li>
                        <li class="@if(request()->routeIs('contact')) active @endif"><a href="{{route('contact')}}">{{__('Contact')}}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
{{--                    <a href="#" class="search-switch"><img src="{{asset('front_asset/img/icon/search.png')}}"--}}
{{--                                                           alt=""></a>--}}
                    <a class="wishlist-show" href="{{route('wishlist')}}"><img src="{{asset('front_asset/img/icon/heart.png')}}" alt=""></a>
                    <a href="{{route('show.cart')}}"><img src="{{asset('front_asset/img/icon/cart.png')}}" alt="">
                        <span class="sum_total">{{\App\Http\Controllers\Fronts\ProductShopController::getTotalcart()}}</span></a>
                    <div class="price sum_price">{{number_format(\App\Http\Controllers\Fronts\ProductShopController::getSumPrice(),0,0,'.')}}
                        VNĐ
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
