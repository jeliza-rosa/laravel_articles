@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Итоговый отчет
        </h3>

        <form method="POST" action="/admin/reports/total">

            @csrf
            @method('POST')

            <div class="mb-3">
                <label for="inputCode" class="form-label">Уникальный символьный код</label>
                <input type="text" class="form-control" id="inputCode" placeholder="Только латиница, цифры и символы -, _" name="code">
            </div>

            <button onclick="return alert('Статья изменена')" type="submit" class="btn btn-primary">Изменить статью</button>
        </form>

    </div>
@endsection
