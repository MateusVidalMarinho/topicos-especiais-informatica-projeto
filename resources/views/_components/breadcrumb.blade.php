<nav>
    <ol class="breadcrumb">
        @foreach ($breadcrumb as $item)
        @if ($item['type'] == 'active')
        <li class="breadcrumb-item active">
            @else
        <li class="breadcrumb-item">
            @endif
            @if ($item['type'] != 'active' && $item['link'] != null)
            <a href="{{$item['link']}}">{{ $item['text'] }}</a>
            @else
                {{ $item['text'] }}
            @endif
        </li>
        @endforeach
    </ol>
</nav>
