@if ($parent->categorychildrent->count())
    <ul>
        @foreach ($parent->categorychildrent as $child)

            <li><a href="shop-3-column.html">{{ $child->name }}</a></li>


        @endforeach

    </ul>
@endif
