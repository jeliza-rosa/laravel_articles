@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Статистика сайта
        </h3>

        <p>Количество статей на сайте: {{ $data['articles'] }}</p>
        <p>Количество новостей на сайте: {{ $data['news'] }}</p>
        <p>Пользователь с наибольшим количеством статей: {{ $data['user_more_articles'] }}</p>

        <p>Самая длиная статья: </p>
            @if($data['long_articles'])
                <p style="text-indent: 25px;">название: {{ $data['long_articles']->name }}</p>
                <p style="text-indent: 25px;">ссылка: <a href="/articles/{{ $data['long_articles']->code }}">перейти к статье</a></p>
                <p style="text-indent: 25px;">количество символов: {{ $data['long_articles']->length_detail }}</p>
            @else
                <p style="text-indent: 25px;">Нет статей</p>
            @endif

        <p>Самая короткая статья: </p>
            @if($data['short_articles'])
                <p style="text-indent: 25px;">название: {{ $data['short_articles']->name }}</p>
                <p style="text-indent: 25px;">ссылка: <a href="/articles/{{ $data['short_articles']->code }}">перейти к статье</a></p>
                <p style="text-indent: 25px;">количество символов: {{ $data['short_articles']->length_detail }}</p>
            @else
                <p style="text-indent: 25px;">Нет статей</p>
            @endif

        <p>Средние количество статей у активных пользователей: {{ $data['average_articles'] }}</p>

        <p>Самая изменяемая статья: </p>
            @if(!empty($data['more_change']->name))
                <p style="text-indent: 25px;">название: {{ $data['more_change']->name }}</p>
                <p style="text-indent: 25px;">ссылка: <a href="/articles/{{ $data['more_change']->code }}">перейти к статье</a></p>
            @else
                <p style="text-indent: 25px;">{{$data['more_change']}}</p>
            @endif

        <p>Самая комментируемая статья: </p>
            @if(!empty($data['more_comments']->name))
                <p style="text-indent: 25px;">название: {{ $data['more_comments']->name }}</p>
                <p style="text-indent: 25px;">ссылка: <a href="/articles/{{ $data['more_comments']->code }}">перейти к статье</a></p>
            @else
                <p style="text-indent: 25px;">{{$data['more_comments']}}</p>
            @endif
    </div>
@endsection
