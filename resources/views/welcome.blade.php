@extends('layout.app')
@section('content')
    @if(session()->has('ok'))
    <div class="alert alert-success w-25" >

        {{session('ok')}}

    @endif
    </div>

    <div class="container-fluid w-75">
        <div class="mb-3">
            <h1>Страница заявок</h1>
        </div>

        <div class="d-flex justify-content-start flex-wrap">
            @foreach($applications as $application)
                <div class="card m-3 pb-2" style="width: 250px; height: 350px">
                    <img src="/{{$application->img_one}}" style="width: 250px; height:250px" class="card-img-top" alt="Picture">
                    <div class="card-body">
                        <h5 class="card-title">{{$application->title}}</h5>
                        <p class="card-text">Категория: {{$application->category->title}}</p>
                        <p  class="card-text">{{$application->created_at}}</p>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
