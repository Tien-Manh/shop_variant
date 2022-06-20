@if(@$cates)
    <option value="0" data-i18n="Not cate">{{__('Parent cate')}}</option>
    @php $prefix = '&#9672; &nbsp;' @endphp
    @foreach($cates as $cate)
        <option value="{{$cate->id}}">{{$cate->title}}</option>
        @foreach($cate->childCate as  $childcates)
            @include('pages.cates.ajax.cate-child', ['child_cates' => $childcates, 'prefix' => $prefix])
        @endforeach
    @endforeach
@endif
