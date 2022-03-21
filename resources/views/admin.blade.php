@extends('layout.master')

@section('content')
    <div class="col-md-8">

        <h3 class="pb-4 mb-4 fst-italic">
            <a href="/admin/allarticles">
                Все статьи
            </a>
        </h3>

        <h3 class="pb-4 mb-4 fst-italic">
            <a href="/admin/feedback">
                Список обращений
            </a>
        </h3>

        @isset($messages)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Обращение</th>
                    <th scope="col">Дата получения</th>
                </tr>
            </thead>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                    </tr>
                @endforeach
        </table>
        @endisset

        @isset($articles)
            @foreach($articles as $article)
                @include('item')
            @endforeach
        @endisset

    </div>
@endsection
