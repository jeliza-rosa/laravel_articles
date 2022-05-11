@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            {{ $new->title }}
            <a href="/news/{{ $new->id }}/edit">Изменить</a>
        </h3>

        <p>
            {{ $new->description }}
        </p>

        @include('tags', ['tags' => $new->tags])

        <h4>Комментарии к новости</h4>

        @if($new->comment->toArray())
            <table>
                <tr>
                    <th style="width: 300px">Дата комментария</th>
                    <th style="width: 300px">Автор комментария</th>
                    <th style="width: 300px">Текст комментария</th>
                </tr>
                @foreach($new->comment as $item)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->pivot->text_comment }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Нет комментариев</p>
        @endif
        <hr>

        <form method="POST" action="/news/{{ $new->id }}/comment">

            @csrf

            <div class="mb-3">
                <label for="inputComment" class="form-label">Оставить комменатрий к новости</label>
                <input type="text" class="form-control" id="inputComment" placeholder="Введите Ваш комментарий" name="comment" value="{{ old('comment') }}">
            </div>

            <button type="submit" class="btn btn-primary">Оставить комментарий</button>
        </form>

        <a href="/news">Назад к новостям</a>

    </div>
@endsection
