@extends('layouts.master')

@section('content')
    @if(Auth::user()->admin === 0)You don't have authorization to create a post.{{exit}} @endif
    <header class="header">
        <h1 class="modal-title float-left">Create a new post</h1>
        <a class="nav-link float-right" href="{{route('posts')}}">Back to all posts</a>
    </header>

    <div class="container">
        <form method="post" action="{{route('posts.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title"/>
                @if ($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description"/>
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="fulltext">Full text:</label>
                <textarea class="form-control" id="fulltext" name="fulltext"></textarea>
                @if ($errors->has('fulltext'))
                    <span class="alert-danger form-check-inline">{{$errors->first('fulltext')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <input type="number" class="category_id" id="category_id" name="category_id">
                @if ($errors->has('category_id'))
                    <span class="alert-danger form-check-inline">{{$errors->first('category_id')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="text" class="form-control" id="image" name="image"/>
            </div>
            <button type="submit" class="btn-primary btn-block">Save post</button>
        </form>
    </div>
@endsection
