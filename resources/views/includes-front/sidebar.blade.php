<div class="shop__sidebar__accordion">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-heading">
                <a data-toggle="collapse" data-target="#collapseOne">{{__('Categories')}}</a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="shop__sidebar__categories">
                        <ul class="nice-scroll">
                            @php $prefix = '&#9672; &nbsp;' @endphp
                            @foreach($cates as $cate)
                                <li>
                                    <a href="{{route('cate.product', [$cate->slug])}}">{{$cate->title}}</a><span
                                        class="count-data">{{$cate->countItems()}}</span>
                                    @foreach($cate->childCate as  $childcates)
                                        @include('pages-front.shops.sub-cate', ['child_cates' => $childcates, 'prefix' => $prefix])
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-heading">
                <a data-toggle="collapse" data-target="#collapseTwo">{{__('Branding')}}</a>
            </div>
            <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="shop__sidebar__brand">
                        <ul class="nice-scroll">
                            @foreach($brands as $brand)
                                <li>
                                    <a href="{{route('brand.product', [$brand->slug])}}">{{$brand->name}}</a><span
                                        class="count-data">{{$brand->countProducts()}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-heading">
                <a data-toggle="collapse" data-target="#collapseThree">{{__('PRICE')}}</a>
            </div>
            <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="shop__sidebar__price">
                        <ul class="get-price">
                            <li price-start="" price-end=""><a class="d-block" href="javascript:void(0)">{{__('None')}}</a></li>
                            <li price-start="0" price-end="100000"><a class="d-block" href="javascript:void(0)">0 - 100.000 VNĐ</a></li>
                            <li price-start="100000" price-end="200000"><a class="d-block" href="javascript:void(0)">100.000 - 200.000 VNĐ</a></li>
                            <li price-start="200000" price-end="400000"><a class="d-block" href="javascript:void(0)">200.000 - 400.000 VNĐ</a></li>
                            <li price-start="400000" price-end="800000"><a class="d-block" href="javascript:void(0)">400.000 - 800.000 VNĐ</a></li>
                            <li price-start="800000" price-end="0"><a class="d-block" href="javascript:void(0)">800.000+ VNĐ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($attributeSizes))
            @foreach($attributeSizes as $attribute)
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseFour">{{__('SIZES')}}</a>
                    </div>
                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__size">
                                <label attr-id-size="" for="none">{{__('None')}}
                                    <input type="radio" id="none">
                                </label>
                                @foreach($attribute->attributeValues as $size)
                                <label attr-id-size="{{$size->id}}" for="{{$size->value}}">{{$size->value}}
                                    <input type="radio" id="{{$size->value}}">
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if(!empty($attributeColors))
            @foreach($attributeColors as $attribute)
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseFive">{{__('Colors')}}</a>
                    </div>
                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__color ml-3">
                                <label style="background-color: darkcyan" attr-id-color="">
                                    <input type="radio" id="none">
                                </label>
                                @foreach($attribute->attributeValues as $color)
                                    <label attr-id-color="{{$color->id}}" class="{{str_replace(' ', '-', $color->value)}}" for="{{str_replace(' ', '-', $color->value)}}">
                                        <input type="radio" id="{{str_replace(' ', '-', $color->value)}}">
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         @endif
    </div>
</div>
