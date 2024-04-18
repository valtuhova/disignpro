@extends('layout.app')
@section('title')
    Заявки
@endsection
@section('content')

    <div class="container">
        <div class="row mt-4 justify-content-between" style="width: 330px" >
            <div class="col-4"><h1>Заявки</h1></div>
            <div class="col-3 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <a class="btn btn-dark mt-2">Добавить</a>
            </div>

            <!-- Модальное окно -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Заявка</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xxl-9">

                                        <form action="{{route('ApplicationsStore')}}" method="post" enctype="multipart/form-data">
                                            @method('post')
                                            @csrf

                                            <div class="mb-3">
                                                <label for="title" class="form-label">Введите название</label>
                                                <input type="text" name="title" class="form-control" id="title">
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Введите описание</label>
                                                <textarea type="text" name="description" class="form-control" id="description"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="category_id" class="form-label">Выберите категорию</label>
                                                <select name="category_id" id="category_id" class="form-select">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="img" class="form-label">Загрузите план помещения</label>
                                                <input type="file" name="img_one" class="form-control" id="img_one">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Добавить</button>
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
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Категория</th>
                        <th scope="col">План помещения</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <th scope="row">{{$application->id}}</th>
                            <td>{{$application->title}}</td>
                            <td>{{$application->description}}</td>
                            <td>{{$application->category->title}}</td>
                            <td>
                                <img src="{{asset($application->img_one)}}" style="width:150px; height: 150px" alt="">
                            </td>
                            <td>
                                <div class="row justify-content-between" style="width: 330px">
                                    <button type="button" class="btn" style="background-color: darkseagreen; width: 150px; color: white" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$application->id}}">
                                        Изменить
                                    </button>

                                    <a href="{{route('delete_application',['application'=>$application->id])}}" style="width: 150px" class="btn  bg-danger text-white">Удалить</a>
                                </div>
                            </td>
                            <div class="modal fade" id="exampleModal_{{$application->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение категории</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('edit',['application'=>$application->id])}}" method="post" enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <div>
                                                        <label for="title" class="form-label">Название продукта</label>
                                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" name="title" value="{{$application->title}}">
                                                        <div class="invalid-feedback" id="validationServerTitleFeedback">
                                                            @error('title')
                                                            {{$message}}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <span>Категория</span>
                                                        <select name="category_id">
                                                            <option disabled value="">Выберите категорию</option>
                                                            @foreach($categories as $category)
                                                                @if($application->category->id==$category->id)
                                                                    <option selected="selected" value="{{$category->id}}">{{$category->title}}</option>
                                                                @endif
                                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="description" class="form-label">Описание</label>
                                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" aria-describedby="title" name="description">{{$application->description}}</textarea>
                                                        <div class="invalid-feedback" id="validationServerDescriptionFeedback">
                                                            @error('description')
                                                            {{$message}}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div>
                                                    </div>
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

