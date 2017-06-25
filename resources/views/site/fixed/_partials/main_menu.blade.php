@foreach ($site->getProductCategories() as $category)
    @if ((count($category->categoryFather) == 0 && count($category->categoriesChild) == 0))
        <li>
            <a href="{{ $category->getLink($category) }}">{{ $category->name }}</a>
        </li>
    @elseif ((count($category->categoryFather) == 0 && count($category->categoriesChild) > 0))
        <li class="has-submenu">
            <a href="{{ $category->getLink($category) }}" title="{{ $category->name }}">{{ $category->name }}</a>
            <span class="label btn btn-info toggle-submenu"><i class="fa fa-angle-down"></i></span>
            <ul class="">
                @foreach($category->categoriesChild->sortBy('name') as $child)
                    @if (count($child->categoriesChild) == 0)
                        <li>
                            <a href="{{ $category->getLink($child) }}" title="{{ $child->name }}">{{ $child->name }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $child->getLink($child) }}" title="{{ $child->name }}">{{ $child->name }}</a>
                            {{--<span class="label btn btn-info toggle-third"><i class="fa fa-minus' }}"></i></span>--}}
                            <ul class="dropdown-menu">
                                @foreach($child->categoriesChild->sortBy('name') as $child2)
                                    <li>
                                        <a href="{{ $child->getLink($child2) }}" title="{{ $child2->name }}">{{ $child2->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    @endif
@endforeach