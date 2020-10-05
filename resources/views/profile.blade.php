@extends('layouts.master')

@section('content')
    <header class ="jumbotron">
        <h1 class ="modal-title float-left">Profile</h1>
    </header>

    <div class="hello">Hello {{Auth::user()->name}}<br>
        Welcome to your profile, here you can see your comment history as well as your details.
    </div>

    <div class="profile-details">
        <label for="email">Email:</label> {{Auth::user()->email}}<br>
        <label for="creation-date">Joined on:</label> {{Auth::user()->created_at}}<br>
        <label for="update-date">Latest account update on:</label> {{Auth::user()->updated_at}}
    </div>

    <div class="comment-history">
        @foreach($comments as $comment)
            <div class="comment-in-history">{{$comment['headline']}} {{$comment['comment']}}</div>
        @endforeach
    </div>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-succes alert-block">
                <strong>{{$message}}</strong>
            </div>
        @endif
        {{Auth::user()}}
    </div>
@endsection
