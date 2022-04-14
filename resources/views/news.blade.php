@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Новости
        </h3>

        @foreach($news as $new)
            <h2 class="blog-post-title"><a href="/news/{{ $new->id }}">{{ $new->title }}</a></h2>
        @endforeach

        {{ $news->links() }}

    </div>
@endsection
