@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Создание статьи
        </h3>

        @include('layout.errors')

        <form method="POST" action="/articles/create">

            @csrf

            <div class="mb-3">
                <label for="inputCode" class="form-label">Уникальный символьный код</label>
                <input type="text" class="form-control" id="inputCode" placeholder="Только латиница, цифры и символы -, _" name="code" value="{{ old('code') }}">
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Название статьи</label>
                <input type="text" class="form-control" id="inputName" placeholder="Введите название" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Краткое описание статьи</label>
                <input type="text" class="form-control" id="inputDescription" placeholder="Введите описание" name="description" value="{{ old('description') }}">
            </div>
            <div class="mb-3">
                <label for="inputDetail" class="form-label">Детальное описание</label>
                <textarea class="form-control" id="inputDetail" placeholder="Введите описание" name="detail">{{ old('detail') }}</textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="inputPublished" name="published" {{ old('published') ? 'checked' : '' }}>
                <label for="inputPublished" class="form-check-label">опубликовано</label>
            </div>
            <button type="submit" class="btn btn-primary">Создать статью</button>
        </form>
    </div>
@endsection
