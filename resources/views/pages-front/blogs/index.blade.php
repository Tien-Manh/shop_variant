@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Posts')}}</title>
@endsection
@section('banner')
    @include('includes-front.bannersection')
@endsection
@section('content')
    <section class="mt-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{__('Our Blog')}}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{asset('storage/'.$blog->photo)}}"></div>
                            <div class="blog__item__text">
                                <span><img src="{{asset('front_asset/img/icon/calendar.png')}}" alt="">{{date_format($blog->created_at,"d-m-Y H:i:s")}}</span>
                                <h5>{{Str::limit($blog->title, 50, '  . . .')}}</h5>
                                <a href="{{route('blog.detail', [$blog->slug])}}">{{__('Read More')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{$blogs->onEachSide(2)->links('pages-front.paginate.custom')}}
            </div>
        </div>
    </section>
@endsection
