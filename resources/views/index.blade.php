@extends('layout.master')

@section('content')
    <div class="col-md-4">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список статей
        </h3>

        @foreach($articles as $article)
            @include('item')
        @endforeach

    </div>
    <div class="col-md-4">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список новостей
        </h3>

        @foreach($news as $new)
            <h2 class="blog-post-title"><a href="/news/{{ $new->id }}">{{ $new->title }}</a></h2>
            <p class="blog-post-meta">{{ $new->created_at->toFormattedDateString() }}</p>

            @include('tags', ['tags' => $new->tags])

            <p>{{ $new->description }}</p>
        @endforeach

    </div>
@endsection
