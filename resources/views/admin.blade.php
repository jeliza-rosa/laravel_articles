@extends('layout.master')

@section('content')
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Список обращений
        </h3>

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
    </div>
@endsection
