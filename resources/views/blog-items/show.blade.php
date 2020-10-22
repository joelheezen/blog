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
        @if ($message = Session::get('success'))
            <div class="alert alert-succes alert-block">
                <strong>{{$message}}</strong>
            </div>
        @endif
        @if($blogItem)
            <article>
                <p>{{$blogItem['description']}}</p>
                <img src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>
                <p>{{$blogItem['fulltext']}}</p>
            </article>

                <div class="comments-area">
                    @foreach($blogItem->comments as $comment)
                        <div class="comment-container">
                            <div class="comment-show">{{$comment['headline']}}</div>
                            <div class="comment-show-full">{{$comment['comment']}}</div>
                            <div class="comment-show-user">{{$comment->user->name}}</div>
                            <div class="comment-timestamp">{{$comment['updated_at']}}</div>
                        </div>
                    @endforeach
                </div>
            @endif

        <div class="new-comments">
            <form method="post" action="{{route('comment.store')}}">
                @csrf
                <div class="headline-group">
                    <label for="title">Titel:</label>
                    <input type="text" class="headline-input" id="headline" name="headline"/>
                    @if ($errors->has('headline'))
                        <span class="alert-danger form-check-inline">{{$errors->first('headline')}}</span>
                    @endif
                </div>
                <div class="comment-group">
                    <label for="comment">Comment:</label>
                    <input type="text" class="comment-input" id="comment" name="comment"/>
                    @if ($errors->has('comment'))
                        <span class="alert-danger form-check-inline">{{$errors->first('comment')}}</span>
                    @endif
                </div>
                <input type="hidden" id="users_id" name="users_id" value="{{Auth::user()->id}}">
                <input type="hidden" id="blogItems_id" name="blogItems_id" value="{{$blogItem['id']}}">
                <button type="submit" class="btn-primary btn-block">Comment opslaan</button>
            </form>
        </div>
    </div>
@endsection
