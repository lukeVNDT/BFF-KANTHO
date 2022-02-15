@if($childs->count())
<ul class="folder">
    @foreach($childs  as $child)
                                                    <li><input class="common_selector cateloc" type="checkbox" value="{{$child->category_id}}" >
                                                        <span>{{$child->category_name}}<span class="total">({{$child->productCount->count()}})</span></span>
                                                    @if($child->childs->count())
                                                        @include('layout.frontend.include.listtreecheckbox',['childs'=> $child->childs])
                                                    @endif
                                                     </li>
                                                    @endforeach
                                                </ul>
@endif