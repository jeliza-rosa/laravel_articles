@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Изменить новость
        </h3>

        @include('tags', ['tags' => $new->tags])

        @include('layout.errors')

        <form method="POST" action="/news/{{ $new->id }}">

            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="inputTitle" class="form-label">Заголовок</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Введите заголовок" name="title" value="{{ old('title', $new->title) }}">
            </div>

            <div class="mb-3">
                <label for="inputDescription" class="form-label">Текст новости</label>
                <input type="text" class="form-control" id="inputDescription" placeholder="Введите текст новости" name="description" value="{{ old('description', $new->description) }}">
            </div>

            <div class="mb-3 form-check">
                <label for="inputTags" class="form-label">Теги</label>
                <input type="text" class="form-control" id="inputTags" name="tags" value="{{ old('tags', $new->tags->pluck('name')->implode(',')) }}">
            </div>

            <button onclick="return alert('Новость изменена')" type="submit" class="btn btn-primary">Изменить новость</button>
        </form>

        <form method="POST" action="/news/{{ $new->id }}">

            @csrf
            @method('DELETE')

            <button onclick="return alert('Новость удалена')" type="submit" class="btn btn-danger">Удалить</button>

        </form>
    </div>
@endsection
