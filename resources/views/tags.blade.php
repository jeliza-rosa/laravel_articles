@php
    $tags = $tags ?? collect();
@endphp

@if ($tags->isNotEmpty())
    <div>
        @foreach($tags as $tag)
            @if($tag->name)
                <a href="/tags/{{ $tag->getRouteKey() }}" class="btn btn-secondary btn-sm">{{ $tag->name }}</a>
            @endif
        @endforeach
    </div>
@endif
