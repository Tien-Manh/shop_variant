<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{asset('storage/'.$configs['logo_footer'])}}" alt=""></a>
                    </div>
                    <p class="mb-1">{{__('Hotline')}}: <span
                            style="font-size:16px;"><b>{{$configs['hotline']}}</b></span></p>
                    <p class="mb-4">{{__('Phone')}}: <span style="font-size:16px;"><b>{{$configs['phone']}}</b></span>
                    </p>
                    <a href="#"><img src="{{asset('front_asset/img/payment.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-3 col-sm-6 float-right">
                <div class="footer__widget">
                    <h6>{{__('FAQ')}}</h6>
                    <div class="d-flex justify-content-between">
                        <ul>
                            @foreach($blogs_footer[0] as $blog_footer)
                                <li><a href="{{route('faq', [$blog_footer->slug])}}">{{ucfirst(mb_strtolower($blog_footer->title))}}</a></li>
                            @endforeach
                        </ul>
                        <ul>
                            @foreach($blogs_footer[1] as $blog_footer)
                                <li><a href="{{route('faq', [$blog_footer->slug])}}">{{ucfirst(mb_strtolower($blog_footer->title))}}</a></li>
                            @endforeach
                        </ul>
                        <ul>
                            @foreach($blogs_footer[2] as $blog_footer)
                                <li><a href="{{route('faq', [$blog_footer->slug])}}">{{ucfirst(mb_strtolower($blog_footer->title))}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer__copyright__text">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <p>
                        {{$configs['footer']}}
                    </p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
