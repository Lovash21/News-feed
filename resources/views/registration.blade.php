@extends('layouts.app')

@section('header')
<h1>Регистрация</h1>
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

<form action="{{route('register-user')}}" method="POST">
    @csrf
    <label for="name">Имя</label>
    <input id="name" type="text" name="name" value="{{old('name')}}" autocomplete="name">
    <label for="email">Почта</label>
    <input id="email" type="email" name="email" value="{{old('email')}}" autocomplete="email">
    <label for="password">Пароль</label>
    <input id="password" type="password" name="password" autocomplete="new-password">
    <button type="submit">Отправить</button>
</form>

<p>Есть аккаунт? <a href="{{route('login')}}">Войти</a></p>

@endsection