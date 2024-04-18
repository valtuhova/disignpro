@extends('layout.app')
@section('title')
    Регистрация
@endsection
@section('content')
    <div class="container">
        <h2 style="margin-top: 20px;">Регистрация</h2>
        <div class="row mt-5">
            <div class="col-5">
    <form action="{{route('save_new_user') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="mb-3">
            <label for="fio" class="form-label">Введите ФИО</label>
            <input type="text" class="form-control @error('fio') is-invalid @enderror " name="fio" id="fio">
            <div class="invalid-feedback" id="validationServerUsernameFeedback">
                @error('fio')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="login" class="form-label">Введите логин</label>
            <input type="text" class="form-control @error('login') is-invalid @enderror"  name="login" id="login">
            <div class="invalid-feedback" id="validationServerUsernameFeedback">
                @error('login')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Введите email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
            <div class="invalid-feedback" id="validationServerUsernameFeedback">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Введите пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
            <div class="invalid-feedback" id="validationServerUsernameFeedback">
                @error('password')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
            <div class="invalid-feedback" id="validationServerUsernameFeedback">
                @error('password_confirmation')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input @error('rule') is-invalid @enderror" name="rule" id="rule" value="0">
            <label for="rule" class="form-check-label">Согласие на обработку персональных данных</label>
            <div class="invalid-feedback" id="validationServerUsernameFeedback">
                @error('rule')
                {{$message}}
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Зарегистироваться</button>
    </form>
            </div>
        </div>
    </div>
@endsection
