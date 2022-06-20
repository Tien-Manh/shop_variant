<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/'.$configs['favicon_icon'])}}">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('front_asset/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('front_asset/css/style.css')}}" type="text/css">
    @yield('css-page')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
@include('includes-front.header')
<!-- Header Section End -->


<!-- Banner Section Begin -->
@yield('banner')
<!-- Banner Section End -->

<!-- Product Section Begin -->
@yield('content')
<!-- Product Section End -->

<!-- Latest Blog Section Begin -->

<!-- Latest Blog Section End -->

<!-- Footer Section Begin -->
@include('includes-front.footer')
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{asset('front_asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front_asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('front_asset/js/mixitup.min.js')}}"></script>
<script src="{{asset('front_asset/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('front_asset/js/main.js')}}"></script>
@yield('js')
</body>

</html>
