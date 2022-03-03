@extends('layout.master')

@section('content')
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Статьи
                </h3>

                @foreach($articles as $article)
                    <article class="blog-post">
                        <h2 class="blog-post-title"><a href="/articles/{{ $article->code }}">{{ $article->name }}</a></h2>
                        <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

                        <p>{{ $article->description }}</p>
                    </article>
                @endforeach

            </div>
@endsection
