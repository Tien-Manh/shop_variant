@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Blog Detail')}}</title>
@endsection
@section('content')
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="blog__hero__text">
                        <h2>{{$blog->title}}</h2>
                        <ul>
                            <li>{{$blog->user->name}}</li>
                            <li>{{$blog->created_at}}</li>
                            <li>8 {{__('Comments')}}</li>
                            <li>{{number_format($blog->views,0,0,'.')}} {{__('views')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-details spad" style="margin-top: 40px">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__content">
                        {{--                    <div class="blog__details__share">--}}
                        {{--                        <span>share</span>--}}
                        {{--                        <ul>--}}
                        {{--                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                        {{--                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>--}}
                        {{--                            <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>--}}
                        {{--                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>--}}
                        {{--                        </ul>--}}
                        {{--                    </div>--}}
                        {!! $blog->content !!}
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{route('blog.detail', [$prevBlog->slug])}}"
                                       class="blog__details__btns__item">
                                        <p><span class="arrow_left"></span> {{__('Previous Pod')}}</p>
                                        <h5>{{Str::limit($prevBlog->title, 45, '. . .')}}</h5>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{route('blog.detail', [$nextBlog->slug])}}"
                                       class="blog__details__btns__item blog__details__btns__item--next">
                                        <p>{{__('Next Pod ')}}<span class="arrow_right"></span></p>
                                        <h5>{{Str::limit($nextBlog->title, 45, '. . .')}}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment">
                            <h4>{{__('Leave A Comment')}}</h4>
                            <form action="{{route('comment.save')}}" method="post" class="mb-4">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <textarea style="height: 50px" placeholder="Comment" name="comment"></textarea>
                                        @if(Auth::user())
                                            <button type="submit" class="site-btn">{{__('Post Comment')}}</button>
                                        @else
                                            <button type="button" class="site-btn"
                                                    disabled>{{__('Post Comment')}}</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="mt-3 border p-4">
                                @foreach($comments as $comment)
                                    <div class="mt-4">
                                        <div class="d-flex comment">
                                            <img width="60px" height="60px" class="rounded-circle comment-img"
                                                 src="{{asset('storage/'. $comment->user->photo)}}">
                                            <div class="flex-grow-1 ml-4">
                                                <p class="mb-1">{{$comment->comment}}</p>
                                                <i style="font-size: 12px">{{date_format($comment->created_at, 'd-m-Y : H:m:s')}}</i>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
