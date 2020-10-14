@extends('layouts.master')

@section('content')
    @if(Auth::user()->admin === 0)Je hebt geen toestemming om een blogpost aan te maken.{{exit}} @endif
    <header class="jumbotron">
        <h1 class="modal-title float-left">Voeg een nieuwe post toe</h1>
        <a class="nav-link float-right" href="{{route('posts')}}">Terug naar blogposts</a>
    </header>

    <div class="container">
        <form method="post" action="{{route('posts.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" class="form-control" id="title" name="title"/>
                @if ($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <input type="text" class="form-control" id="description" name="description"/>
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="fulltext">volledige tekst:</label>
                <textarea class="form-control" id="fulltext" name="fulltext"></textarea>
                @if ($errors->has('fulltext'))
                    <span class="alert-danger form-check-inline">{{$errors->first('fulltext')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="category_id">categorie:</label>
                <input type="number" class="category_id" id="category_id" name="category_id">
                @if ($errors->has('category_id'))
                    <span class="alert-danger form-check-inline">{{$errors->first('category_id')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding:</label>
                <input type="text" class="form-control" id="image" name="image"/>
            </div>
            <button type="submit" class="btn-primary btn-block">Post opslaan</button>
        </form>
    </div>
@endsection
