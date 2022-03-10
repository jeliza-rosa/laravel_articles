<article class="blog-post">
    <h2 class="blog-post-title"><a href="/articles/{{ $article->code }}">{{ $article->name }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

    @include('tags', ['tags' => $article->tags])

    <p>{{ $article->description }}</p>
</article>
