@extends('layouts.master')

@section('content')
    <header class ="header">
        <h1 class ="card-header">Profile</h1>
        <script type="text/javascript">
            let loc = "{{route('profile.update', auth::user()->id)}}";
            let token = "{{ csrf_token() }}";
        </script>
    </header>
    @if(Auth::user())
    <div class="hello">Hello {{Auth::user()->name}}<br>
        Welcome to your profile, here you can see your comment history as well as your details.
    </div>
    @endif
    <div class="profile-details">
        <label for="email">Email:</label> {{Auth::user()->email}}<br>
        <label for="creation-date">Joined on:</label> {{Auth::user()->created_at}}<br>
        <label for="update-date">Latest account update on:</label> {{Auth::user()->updated_at}}<br>
        <label for="update">Edit your account </label><button class="edit-account" onclick="editAccount()">click here to update</button>
        @if ($errors->has('email'))
            <span class="alert-danger form-check-inline">{{$errors->first('email')}}</span>
        @endif
        @if ($errors->has('name'))
            <span class="alert-danger form-check-inline">{{$errors->first('name')}}</span>
        @endif
    </div>

@if($comments)
    <div class="comment-history">
        @foreach($comments as $comment)
            <br><div class="comment-in-history">{{$comment['headline']}} {{$comment['comment']}} {{$comment['updated_at']}} <a href="{{route('posts.show', $comment->blogItems_id)}}">View</a></div>
        @endforeach
    </div>
@endif

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-succes alert-block">
                <strong>{{$message}}</strong>
            </div>
        @endif
    </div>
@endsection
