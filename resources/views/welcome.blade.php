@extends('layout.master')

@section('content')
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Статьи
                </h3>

                @foreach($articles as $article)
                    @include('item')
                @endforeach
            </div>
@endsection
