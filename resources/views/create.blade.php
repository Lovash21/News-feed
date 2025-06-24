@extends('layouts.app')

@section('header')
<h1>Создание новости</h1>
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

<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Заголовок</label>
    <input id="title" type="text" name="title" value="{{old('title')}}" autocomplete="off">
    <label for="lid">Краткое описание</label>
    <input id="lid" type="text" name="lid" value="{{old('lid')}}" autocomplete="off">
    <label for="content">Контент</label>
    <input id="content" type="text" name="content" value="{{old('content')}}" autocomplete="off">
    <label for="rubric">Рубрика</label>
    <select id="rubric" name="rubric_id">
        @foreach ($rubrics as $rubric)
            <option value="{{$rubric['id']}}" @selected($rubric['id'] === old('rubric_id'))>{{$rubric['name']}}</option>
        @endforeach
    </select>
    <label for="image">Изображение</label>
    <input id="image" name="image" type="file">
    <button type="submit">Отправить</button>
</form>

@endsection

