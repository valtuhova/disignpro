@extends('layout.app')
@section('title')
    Авторизация
@endsection
@section('content')
    <div class="container">
        <h2 style="margin-top: 15px;">Авторизация</h2>
        <div class="mt-2">
            @if(session()->has('err'))
                <div class="alert alert-danger w-40" >

                    {{session('err')}}

                    @endif
        </div>

        <div class="row mt-5">
            <div class="col-5">
                <form action="{{ route('auth_user') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="mb-3">
                        <label for="exmpleInputEmail1" class="form-label">Введите логин</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" id="login">
                        <div class="invalid-feedback" id="validationServerUsernameFeedback">
                            @error('login')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exmpleInputPassword1" class="form-label">Введите пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        <div class="invalid-feedback" id="validationServerUsernameFeedback">
                            @error('password')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Войти</button>
                </form>

            </div>
        </div>
    </div>
@endsection

