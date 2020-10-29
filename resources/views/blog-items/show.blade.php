@extends('layouts.master')

@section('content')
    <header class="header">
        @if($blogItem)
            <h1 class="modal-title float-left">{{$blogItem['title']}}</h1>
        @else
            <h1 class="modal-title float-left">{{$error}}</h1>
        @endif
        <a class="nav-link float-right" href="{{route('posts')}}">Back to all</a>
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
                <img class="image"src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>
                <p>{{$blogItem['fulltext']}}</p>
            </article>

                <div class="comments-area">
                    @foreach($blogItem->comments as $comment)
                        <div class="comment-container" id="{{$comment->id}}">
                            <h3 class="comment-show">{{$comment['headline']}}</h3>
                            <p class="comment-show-full">{{$comment['comment']}}</p>
                            <p class="comment-show-user">{{$comment->user->name}}</p>
                            <p class="comment-timestamp">{{$comment['updated_at']}}</p>
                            @if (Auth::user()->admin === 1 || Auth::user()->name === $comment->user->name)
                                <form action="{{route('comment.destroy',  $comment->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                                </form>
                                <form id="com-edit{{$comment->id}}" action="{{route('comment.update',  $comment->id)}}" method="POST">
                                    @csrf
                                    <button type="button" onclick="editComment({{$comment->id}})">Edit</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else This post has not been made please head back{{exit}}
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
                    <textarea class="comment-input" id="comment" name="comment"></textarea>
                    @if ($errors->has('comment'))
                        <span class="alert-danger form-check-inline">{{$errors->first('comment')}}</span>
                    @endif
                </div>
                <input type="hidden" id="users_id" name="users_id" value="{{Auth::user()->id}}">
                <input type="hidden" id="blogItems_id" name="blogItems_id" value="{{$blogItem['id']}}">
                @if(Auth::user()->views < 5)
                    <button type="submit" class="disabled-button" >Look at more posts before you can comment</button>
                @else
                    <button type="submit" class="button">Publish comment</button>
                @endif
            </form>
        </div>
    </div>
@endsection
