@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Отправить уведомление
        </h3>

        @include('layout.errors')

        <form method="POST" action="/service">

            @csrf

            <div class="mb-3">
                <label for="inputTitle" class="form-label">Заголовок уведомления</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите заголовок" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="inputText" class="form-label">Текст уведомления</label>
                <input type="text" class="form-control" id="inputText" placeholder="Введите название" name="text" value="{{ old('text') }}">
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
