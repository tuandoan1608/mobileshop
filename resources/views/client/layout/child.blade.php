@if ($menuparent->categorychilrent->count())
    <ul class="megamenu hb-megamenu">
        @foreach ($menuparent->categorychilrent as $parent)
            <li><a style="color: black">{{ $parent->name }}</a>
                @include('client..layout.parentmenu',['parent'=>$parent])
            </li>
        @endforeach
    </ul>
@endif
