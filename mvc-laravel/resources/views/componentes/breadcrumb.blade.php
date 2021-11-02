@if ($lista ?? false)
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($lista as $key => $value)
                @if ($value->link)
                    <li class="breadcrumb-item"><a href="{{ $value->link }}">{{ $value->titulo}}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $value->titulo}}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif