@extends('layouts.master')

@section('content')
    <header class ="jumbotron">
        <h1 class ="modal-title float-left">Posts</h1>
        <a class ="nav-link float-right" href="{{route('posts.create')}}">Maak een nieuwe post aan</a>
    </header>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-succes alert-block">
                <strong>{{$message}}</strong>
            </div>
        @endif
        <div class="row">
            @foreach($blogItems as $blogItem)
                <div class="col-sm card border-0">
                    <h2 class="card-title">{{$blogItem['title']}}</h2>
                    <p class="card-text">{{$blogItem['description']}}</p>
                    <img class="card-img" src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>
                    <a class="btn btn-light" href="{{route('posts.show', $blogItem['id'])}}">Lees meer</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
