@extends('layouts.app')

@section('header')
<h4>{{$header}}</h4>
    <article>
             <div class="twelve columns">
                 <h1>{{$post['title']}}</h1>
                      <p class="excerpt">
                      {{$post['lid']}}
                      </p>    
             </div>
    </article>
@endsection

@section('content')
<p> <img src="{{asset('storage/'. $post['image'])}}" alt="desc" width=400 align=left hspace=30>
      
    {{$post['content']}}
    
    </p>
@endsection