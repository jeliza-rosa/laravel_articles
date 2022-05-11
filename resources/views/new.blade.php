@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание новости
        </h3>

        @include('layout.errors')

        <form method="POST" action="/news">

            @csrf

            <div class="mb-3">
                <label for="inputTitle" class="form-label">Заголовок новости</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Заголовок" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="inputDescription" class="form-label">Текст новости</label>
                <textarea type="text" class="form-control" id="inputDescription" placeholder="Введите текст новости" name="description" value="{{ old('description') }}"></textarea>
            </div>

            <div class="mb-3 form-check">
                <label for="inputTags" class="form-label">Теги</label>
                <input type="text" class="form-control" id="inputTags" name="tags" value="{{ old('tags') }}">
            </div>

            <button type="submit" class="btn btn-primary">Создать новость</button>
        </form>
    </div>
@endsection
