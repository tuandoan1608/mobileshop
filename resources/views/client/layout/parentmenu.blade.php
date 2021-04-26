@if ($parent->categorychildrent->count())
    <ul>
        @foreach ($parent->categorychildrent as $child)

            <li><a href="/pk/{{ $menuparent->slug }}">{{ $child->name }}</a></li>


        @endforeach

    </ul>
@endif
