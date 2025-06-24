@extends('layouts.app')

@section('header')
<h1>Вход</h1>
@endsection

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

<form action="{{route('login-user')}}" method="POST">
    @csrf
    <label for="email">Почта</label>
    <input id="email" type="email" name="email" value="{{old('email')}}" autocomplete="email">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password" autocomplete="current-password">
    <button type="submit">Отправить</button>
</form>

<p>Нет аккаунта? <a href="{{route('registration')}}">Зарегистрироваться</a></p>

@endsection

