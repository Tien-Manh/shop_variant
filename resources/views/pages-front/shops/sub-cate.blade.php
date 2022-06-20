@php $prefix = '&nbsp;&nbsp;' .  $prefix ; @endphp
<ul>
    <li>
        <a href="{{route('cate.product', [$child_cates->slug])}}">{!! $prefix !!}{{$child_cates->title}}</a>
        <span class="count-data">{{$child_cates->countItems()}}</span>
    </li>
</ul>
@if($child_cates->childCate)
    @foreach($child_cates->childCate as  $childcates)
        @include('pages-front.shops.sub-cate', ['child_cates' => $childcates, 'prefix' => $prefix])
    @endforeach
@endif


