@extends('layout.app')
@section('title')
    Категории
@endsection
@section('content')

    <div class="container">
        <div class="row mt-4 justify-content-between" style="width: 350px" >
            <div class="col-4"><h1>Категории</h1></div>
            <div class="col-3 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <a class="btn btn-dark mt-2">Создать</a>
            </div>
            <!-- Модальное окно -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Создание категории</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xxl-9">
                                        <form action="{{route('CategoriesStore')}}" method="post">
                                            @method('post')
                                            @csrf
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Введите название</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                            </div>
                                                <button type="submit" class="btn btn-dark">Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Назавание</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->title}}</td>
                            <td>
                                <div class="row justify-content-between" style="width: 330px">
                                    <button type="button" class="btn" style="background-color: darkseagreen; width: 150px; color: white" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$category->id}}">
                                        Изменить
                                    </button>
                                    <a href="{{route('delete',['category'=>$category->id])}}" style="width: 150px" class="btn  bg-danger text-white">Удалить</a>
                                </div>
                            </td>

                            <div class="modal fade" id="exampleModal_{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение категории</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('category_update',['category'=>$category->id])}}">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Название категории</label>
                                                    <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{$category->title}}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Изменить</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
