@extends('layouts-front.layout-full')
@section('title')
    <title>{{__('Shop-Fashion')}} | {{__('CheckOut')}}</title>
@endsection
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>{{__('Checkout')}}</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}">{{__('Home')}}</a>
                        <a href="{{route('shop')}}">{{__('Shop')}}</a>
                        <a href="{{route('show.cart')}}">{{__('Cart')}}</a>
                        <span>{{__('Checkout')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    @if(session('msg'))
    <div class="container text-center" style="margin-top: -70px">
        <h3 class="coupon__code text-success" style="font-size: 22px"><span class="icon_account_alt"></span>{{__(session('msg'))}} <a href="{{route('shop')}}">{{__('click here ')}}</a>{{'to shop'}}</h3>
    </div>
    @endif
    <div class="container">
        <div class="checkout__form">
            <form class="form-save-checkount" action="{{route('checkoutSave')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <h6 class="coupon__code"><span class="icon_account_alt"></span> {{__('You have not account')}}? <a href="{{route('user.resign')}}">{{__('Click here')}}</a> {{__('registration')}}</h6>
                        <h6 class="checkout__title">{{__('Billing Details')}}</h6>
                        <div class="checkout__select">
                            <p>{{__('Ship to address')}}<span></span> <span data-toggle="modal" data-target="#exampleModal" style="font-size: 18px; cursor: pointer" class="text-primary ml-3">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </p>
                            <select name="ship_address">
                                @foreach(@$userAdress as $f)
                                <option value="{{$f->address}}" @if($f->is_default == 1) selected @endif>{{$f->address}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="checkout__input">
                            <p>{{__('Address')}}<span></span></p>
                            <input type="text" value="{{@Auth::user()->address}}"  name="address" placeholder="Street Address" class="checkout__input__add">
                            <input type="text" value="{{@Auth::user()->address2}}"  name="address2" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>{{__('Phone')}}<span>*</span></p>
                                    <input type="text" name="phone" value="{{@Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>{{__('Country')}}<span></span></p>
                                    <input type="text" value="{{@Auth::user()->country}}" name="country">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>{{__('Order notes')}}<span></span></p>
                            <input type="text" name="message"
                                   placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="checkout__order">
                            <h4 class="order__title">{{__('Your order')}}</h4>
                            <div class="checkout__order__products d-flex justify-content-end">
                                <span class="mr-auto">{{__('Products')}} </span>
                                 <span class="mr-3">{{__('Total')}}</span>
                                <span>{{__('Quantity')}}</span>
                            </div>
                            <div class="checkout__total__products ">
                              @if(isset($carts))
                                    @foreach($carts as $cart)
                                        <div class="d-flex justify-content-end">
                                            <span class="mr-auto mt-3">{{$cart['name']}}</span>
                                            <span class="mr-5 mt-3">{{number_format($cart['quantity'] * $cart['price'], 0, 0, '.')}} VNĐ</span>
                                            <span class="mt-3">{{$cart['quantity']}}</span>
                                        </div>
                                    @endforeach
                                  @endif
                            </div>
                            <ul class="checkout__total__all">
                                <li>{!!  @$html !!}</li>
                                <li>{{__('Total')}} <span>{{number_format($subTotal, 0, 0, '.')}} VNĐ</span></li>
                                <li>{{__('Money total')}} <span>{{number_format($total, 0, 0, '.')}} VNĐ</span></li>
                            </ul>
                            <button type="submit" class="site-btn">{{__('Place order')}}</button>
                            <div id="paypal-button-container" class="mt-4"></div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal fade" style="margin-top: 8rem" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">{{__('Add ship address')}}</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-f" action="{{route('add.ship.adress')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{__('Add address')}}</label>
                                    <input type="text" class="form-control"  placeholder="address" name="ship_address">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" id="exampleCheck1" class="form-check-input" name="check_default" value="0">
                                    <label style="cursor: pointer" class="form-check-label" for="exampleCheck1">{{__('Chooson')}}</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-primary save-address">{{__('Save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection

@section('js')
    <script data-namespace="paypal_sdk" src="https://www.paypal.com/sdk/js?client-id=AVeeqiSO4EpTxekktyZeCO0n6el0xYeYcBjkJpeoI1xGhiBRf07CX_4mRZVFPzluOM65Cpt_Ks6k52Zt&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <script>
        paypal_sdk.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '{{$total_pay}}' // Can also reference a variable or function
                                }
                            }]
                        });
                    },
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            // const transaction = orderData.purchase_units[0].payments.captures[0];
                            // alert(`${orderData.payer.name.given_name} ${rderData.payer.name.surname} transaction ${transaction.status}: ${transaction.id}\n\n : price: ${transaction.amount.value}`);
                            let url =$('.form-save-checkount').attr('action')
                            let data = {
                                '_token': $('input[name=_token]').val(),
                                'address': $('input[name=address]').val(),
                                'ship_address': $('select[name=ship_address]').val(),
                                'address2': $('input[name=address2]').val(),
                                'phone': $('input[name=phone]').val(),
                                'country': $('input[name=country]').val(),
                                'message': $('input[name=message]').val(),
                                'payment_method': 'paypal',
                                'payment_id': orderData.id,
                            }
                            $.ajax({
                                method: 'POST',
                                url: url,
                                data: data,
                                success: function (res){
                                    console.log(1)
                                    location.reload()
                                }
                            })
                        });
                    }
                }).render('#paypal-button-container');

    </script>
    <script src="{{asset('front_asset/js/ajax-main.js')}}"></script>
@endsection
