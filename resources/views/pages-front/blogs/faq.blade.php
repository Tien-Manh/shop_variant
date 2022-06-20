@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Faql')}}</title>
@endsection
@section('content')
    <section class="blog-details spad" style="margin-top: 40px">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__content">
                        {!! $blog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
