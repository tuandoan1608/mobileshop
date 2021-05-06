@if ($parent->categorychildrent->count())
    <ul>
        @foreach ($parent->categorychildrent as $child)

            <li><a class="uppercase" href="/pk/{{ $child->slug }}">{{ $child->name }}</a></li>


        @endforeach

    </ul>
@endif
