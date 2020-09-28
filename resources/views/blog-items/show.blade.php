@extends('layouts.master')

@section('content')
    <header class="jumbotron">
        @if($blogItem)
            <h1 class="modal-title float-left">{{$blogItem['title']}}</h1>
        @else
            <h1 class="modal-title float-left">{{$error}}</h1>
        @endif
        <a class="nav-link float-right" href="{{route('posts')}}">Terug naar blogposts.</a>
    </header>

    <div class="container">
        @if($blogItem)
            <article>
                <p>{{$blogItem['description']}}</p>
                <img src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>
                <p>{{$blogItem['fulltext']}}</p>
            </article>
        @endif
    </div>
@endsection
