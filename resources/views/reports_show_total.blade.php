@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Итоговый отчет
        </h3>

        <form method="POST" action="/admin/reports/send">

            @csrf
            @method('POST')

            <input type="checkbox" name="news">Новости
            <input type="checkbox" name="articles">Статьи
            <input type="checkbox" name="comments">Комментарии
            <input type="checkbox" name="tags">Теги
            <input type="checkbox" name="users">Пользователи

            <button onclick="return alert('Отчет отправлен на почту')" type="submit" class="btn btn-primary">Отправить данные</button>
        </form>

    </div>
@endsection
