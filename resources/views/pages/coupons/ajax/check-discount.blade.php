<div class="d-flex justify-content-end flex-column">
    <div class="d-flex justify-content-between">
        <div class="pe-1"><b>{{__('Your order')}}: </b></div>
        <div>
            @if($message[0] == true)
                <input type="hidden" id="discount-code" value="{{$discount_code}}">
                <span class="text-success">{{$message[1]}}:  {{$discountText}}</span>
                <button type="button" class="btn btn-sm btn-primary ms-1 discount-remove">{{__('remove')}}</button>
            @else
               <span class="text-danger">{{$message[1]}}</span>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-between pt-1">
        <div class="pe-1"><p>{{__('Sub Total')}}: </p></div>
        <div class="rs-total">{{number_format($subtotal, 0, 0, '.')}} VNĐ</div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="pe-1"><p>{{__('Discount')}}: </p></div>
        <div class="rs-total">{{number_format($distotal, 0, 0, '.')}} VNĐ</div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="pe-1"><p>{{__('Total')}}: </p></div>
        <div><b><span class="rs-total">{{number_format($total, 0, 0, '.')}} VNĐ</span></b></div>
    </div>
</div>
