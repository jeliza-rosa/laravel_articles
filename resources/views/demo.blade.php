@extends('app')

@section('title', 'Page Demo Title')

@section('content')
    Содержимое страницы Demo
@endsection

@section('sidebar')
    @parent
    <p>Переопределение demo содержимого боковой панели</p>

    <sript>
        var app = <?= json_encode()   ?>
    </sript>
@endsection
