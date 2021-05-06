@if ($menuparent->categorychildrent->count())
    <ul class="megamenu hb-megamenu">
        @foreach ($menuparent->categorychildrent as $parent)
            <li><a class="uppercase" style="color: black">{{ $parent->name }}</a>
                @include('client..layout.parentmenu',['parent'=>$parent])
            </li>
        @endforeach
    </ul>
@endif
