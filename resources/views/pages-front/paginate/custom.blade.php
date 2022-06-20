@if ($paginator->hasPages())
    <div class="product__pagination">
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="disabled"><span class="arrow_carrot-left"></span></li>--}}
{{--        @else--}}
{{--            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="arrow_carrot-left"></a></li>--}}
{{--        @endif--}}
        @foreach ($elements as $element)
            @if (is_string($element))
                    <a class="disabled">{{$element}}</a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                            <a class="active">{{$page}}</a>
                    @else
                            <a href="{{$url}}">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

{{--        @if ($paginator->hasMorePages())--}}
{{--            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="arrow_carrot-right"></a></li>--}}
{{--        @else--}}
{{--            <li class="disabled"><span  class="arrow_carrot-right"></span></li>--}}
{{--        @endif--}}
    </div>
@endif
