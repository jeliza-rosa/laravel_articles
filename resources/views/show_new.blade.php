@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $new->title }}
        </h3>

        <p>
            {{ $new->description }}
        </p>

        <a href="/news">Назад к новостям</a>

    </div>
@endsection
