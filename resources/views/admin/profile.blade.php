@extends('layout.app')
@section('title')
    Админ Профиль
@endsection
@section('content')
    <div class="container-fluid w-75">
        <div class="w-75">
            <h1>
                Заявки
            </h1>
        </div>
        <div class="">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <td class="w-auto">Название</td>
                    <td class="w-auto">Категория</td>
                    <td class="w-auto">Описание</td>
                    <td class="w-auto">Статус</td>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <th scope="row">{{$application->id}}</th>
                        <td>{{$application->title}}</td>
                        <td>{{$application->category->title}}</td>
                        <td>{{$application->description}}</td>
                        <td>{{$application->status}}</td>

                 @endforeach
@endsection
