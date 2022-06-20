<div class="mb-2">
    <div data-pr="{{$product->id}}" class="product-color-options mt-0 mb-0" name="kl">
        @foreach($product->productAttributes as $at)
            @if(count($at->attrbuteValues()) > 0)
                <h6>{{__(mb_strtoupper($at->attributes->name))}}</h6>
            @else
                <div data-pr-detail="0" class="product-color-options mt-0 mb-0"></div>
            @endif
            <div>
                <ul class="list-unstyled mb-0">
                    @foreach($at->attrbuteValues() as $af)
                        @if($at->attributes->name == 'color' || $at->attributes->name == 'colors')
                            <li data-id="{{$af->id}}" data-attribute="{{$at->attributes->id}}"
                                class="d-inline-block @if($at->productDetailDefault() != null and $at->productDetailDefault()->attribute_value_id == $af->id)selected @endif">
                                <div class="color-option b-{{str_replace(' ', '-', $af->value)}}">
                                    <div class="filloption bg-{{str_replace(' ', '-', $af->value)}}"></div>
                                </div>
                            </li>
                        @else
                            <li data-id="{{$af->id}}" data-attribute="{{$at->attributes->id}}"
                                class="d-inline-block @if($at->productDetailDefault() != null and $at->productDetailDefault()->attribute_value_id == $af->id)selected @endif">
                                <div class="color-option b-violet">
                                    <div class="filloption bg-violet text-center nj">
                                        <span>{{$af->value}}</span>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>


