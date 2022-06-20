<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($baners as $baner)
        <div class="hero__items set-bg" data-setbg="{{asset('storage/'. $baner->photo)}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h3>{{$baner->title}}</h3>
                            <div> {!! $baner->description !!}</div>
                            @if($baner->url != '' || $baner->url != null)
                                <a href="{{$baner->url}}" class="primary-btn">{{__('Shop now')}} <span class="arrow_right"></span></a>
                            @endif
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
