@extends('layouts-front.layout-full')
@section('title')
    <title>{{$configs['shop_name']}} | {{__('Contact')}}</title>
@endsection
@section('content')
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>{{__('Information')}}</span>
                            <h2>{{__('Contact Us')}}</h2>
                        </div>
                       <div class="d-flex justify-content-between">
                           <ul>
                               <li>
                                   <h4>{{__('Phone')}}</h4>
                                   <p><span>{{$configs['phone']}}</span></p>
                               </li>
                               <li>
                                   <h4>{{__('Hotline')}}</h4>
                                   <p>{{$configs['hotline']}}</p>
                               </li>
                           </ul>
                           <ul>
                               <li>
                                   <h4>{{__('Email')}}</h4>
                                   <p><span>{{$configs['email']}}</span></p>
                               </li>
                               <li>
                                   <h4>{{__('Address')}}</h4>
                                   <p>{{$configs['address']}}</p>
                               </li>
                           </ul>
                       </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        @if(session('message'))
                        <span class="text-success mb-4 pb-3">{{session('message')}}</span>
                        @endif
                        <form action="{{route('contact.save')}}" method="post" class="mt-2">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="{{__('Name')}}" name="name" class="mb-1">
                                    @error('name')
                                    <span class="text-danger">
                                        {{$errors->first('name')}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email" class="mb-1">
                                    @error('email')
                                    <span class="text-danger">
                                        {{$errors->first('email')}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="{{__('Message')}}" name="message" class="mb-0"></textarea>
                                    @error('message')
                                    <span class="text-danger">
                                        {{$errors->first('message')}}
                                    </span>
                                    @enderror
                                    <br>
                                    <button type="submit" class="site-btn">{{__('Send Message')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
@endsection
