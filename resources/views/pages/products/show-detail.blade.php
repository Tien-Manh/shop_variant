<div class="card-body p-0 m-0">
    <div class="row">
        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
            <div class="col-12">
                <div class="align-items-start justify-content-start">
                    <img src="{{asset('storage/'.$productDetail->photo_thumb)}}" class="img-fluid photo_thumb"  alt="">
                </div>
                <hr>
                <div class="swiper-coverflow swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($product->productsImages as $photo)
                            <div class="swiper-slide">
                                <img class="img-fluid" src="{{asset('storage/'. $photo->photo)}}" alt="banner">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <h4>{{$product->title}}</h4>
            <p style="font-size: 1rem" class="card-text item-company me-1"> {{__('Cate')}} :
                @if(count($product->cates) > 0)
                    @foreach($product->cates as $val)
                        <span class="badge badge-light-primary"> {{$val->title}}</span>&nbsp;
                    @endforeach
                @endif
            </p>
            <div style="border: none; height: auto" class="ql-container ql-snow">
                <div style="white-space: unset; padding: 0; " class="ql-editor">
                    {!! $product->content !!}
                </div>
            </div>
            <hr>
            <div class="ecommerce-details-price views">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <p class="col-4 mb-0">{{__('Cost')}}</p>
                            <span class="item-price col-8 cost">{{number_format($productDetail->cost,0,0,'.')}} VNĐ</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <p class="col-4 mb-0">{{__('Quantity')}}</p>
                            <span class="item-price col-8 quantity">{{number_format($productDetail->quantity,0,0,'.')}} ĐV</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <p class="col-4 mb-0">{{__('Sub quantity')}}</p>
                            <span class="item-price col-8 sub_quantity">{{number_format($productDetail->sub_quantity,0,0,'.')}} ĐV</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <p class="col-4 mb-0">{{__('Price')}}</p>
                            <span class="item-price col-8 price">{{number_format($productDetail->price,0,0,'.')}} VNĐ</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <p class="col-4 mb-0">{{__('Sell price')}}</p>
                            <span class="item-price col-8 sell_price">{{number_format($productDetail->sell_price,0,0,'.')}} VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div data-pr="{{$product->id}}" data-pr-detail="{{$productDetail->id}}" class="product-color-options">
                @foreach($product->productAttributes as $attr)
                    @if(count(@$attr->attrbuteValues()) > 0)
                        <label class="form-label">{{__(mb_strtoupper(@$attr->attributes->name))}}</label>
                    @endif
                    <ul class="list-unstyled mb-0">
                        @foreach($attr->attrbuteValues() as $val)
                            @if(@$attr->attributes->name == 'color' || @$attr->attributes->name == 'colors')
                                <li  data-id="{{$val->id}}"  data-attribute="{{$attr->attributes->id}}" class="d-inline-block @if($productDetail->attributeValue($attr->attributes->id)->attribute_value_id == $val->id)selected @endif">
                                    <div class="color-option b-{{str_replace(' ', '-', $val->value)}}">
                                        <div class="filloption bg-{{str_replace(' ', '-', $val->value)}}"><span>&nbsp;</span></div>
                                    </div>
                                </li>
                            @else
                                <li data-id="{{$val->id}}" data-attribute="{{@$attr->attributes->id}}"  class="d-inline-block @if($productDetail->attributeValue($attr->attributes->id)->attribute_value_id == $val->id)selected @endif">
                                    <div class="color-option b-violet">
                                        <div class="filloption bg-violet text-center nj">
                                            <span>{{$val->value}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    new Swiper('.swiper-coverflow', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        observer: true,
        observeParents: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true
        },
        pagination: {
            el: '.swiper-pagination'
        }
    })
</script>

