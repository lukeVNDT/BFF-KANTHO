@if($childs->count())
<ul class="dropdown">
    @foreach($childs  as $child)
                                                    <li><a href="{{ URL::to('/danhmucsp/'.$child->category_id) }}">{{$child->category_name}}</a>
                                                    @if($child->childs->count())
                                                        @include('layout.frontend.include.mainmenu',['childs'=> $child->childs])
                                                    @endif
                                                     </li>
                                                    @endforeach
                                                </ul>
@endif