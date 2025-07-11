@extends('layouts.app')


@section('header')
<h1>Новости науки</h1>
@endsection

@section('content')
<section class="eight columns">
    @foreach ($posts as $post)
    <article class="blog_post">
        <div class="three columns">
        <a href="{{ route('statya', ['rubrics_id' => $post['rubric_id'], 'post_id' => $post['id']]) }}" class="th"><img src="{{ asset('storage/' . $post['image']) }}" alt="desc" /></a>
        </div>
        <div class="nine columns">
         <a href="{{ route('statya', ['rubrics_id' => $post['rubric_id'], 'post_id' => $post['id']]) }}"><h4>{{$post['title']}}</h4></a>
         <p> {{$post['lid']}}</p>
         @auth
         @if(auth()->user()->isAdmin())
           <div>
            <form action="{{route('delete', ['post_id' => $post['id'], 'rubrics_id' => $post['rubric_id']])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">Удалить</button>
            </form>
          </div>
         @endif
       @endauth
         </div>
     </article>
    @endforeach
</section>

@auth
      @if(auth()->user()->isAdmin())
      <section class="four columns">
        <H3>  &nbsp; </H3>
        <div class="panel">
          <h3>Админ-панель</h3>

        <ul class="accordion">
          <li class="active">
            <div class="title">
              <a href="{{route('create')}}"><h5>Добавить статью</h5></a>
            </div>
          </li>
          <li class="active">
            <div class="title">
              <a href="{{route('create-rubric')}}"><h5>Добавить рубрику</h5></a>
            </div>
          </li>
        </ul>

        </div>
      </section>
      @endif

    @endauth
@endsection

@section('footer')
<section>

    <div class="section_dark">
    <div class="row">

    <h2></h2>

        <div class="two columns">
        <img src="{{ asset('images/thumb1.jpg') }}" alt="desc" />
        </div>

        <div class="two columns">
        <img src="{{ asset('images/thumb2.jpg') }}" alt="desc" />
        </div>

        <div class="two columns">
        <img src="{{ asset('images/thumb3.jpg') }}" alt="desc" />
        </div>

        <div class="two columns">
        <img src="{{ asset('images/thumb4.jpg') }}" alt="desc" />
        </div>

        <div class="two columns">
        <img src="{{ asset('images/thumb5.jpg') }}" alt="desc" />
        </div>

        <div class="two columns">
        <img src="{{ asset('images/thumb6.jpg') }}" alt="desc" />
        </div>


    </div>
    </div>

  </section>
@endsection
