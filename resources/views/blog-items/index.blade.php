@extends('layouts.master')

@section('content')
    <header class ="header">
        <h1 class ="headline">Posts</h1>
        <a class ="create" href="{{route('posts.create')}}">Create a new post</a>
        <div class="search-bar">
            <p>search</p>
            <input type="text" id="searchbar" onkeyup="search()">
            <p class="filter">filter by category</p>
            <select class="filter" id="filter-category" onClick="search()">
                <option value="">all</option>
                <option value="1">Hardware</option>
                <option value="2">Javascript</option>
                <option value="3">PHP</option>
                <option value="4">Game</option>
            </select>
        </div>
        <script type="text/javascript">
            let token = "{{ csrf_token() }}";
        </script>

    </header>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-succes alert-block">
                <strong>{{$message}}</strong>
            </div>
        @endif
            @foreach($blogItems as $blogItem)
                @if ($blogItem['hidden'] === 0 || Auth::user()->admin === 1)
        <div class="blog-row">
                <div class="col-sm card border-0">
                    <input type="hidden" class="invis-cat" value="{{$blogItem['category_id']}}">
                    <h2 class="card-title">{{$blogItem['title']}}</h2>
                    <p class="card-text">{{$blogItem['description']}}</p>
                    <img class="card-img" src="{{$blogItem['image']}}" alt="{{$blogItem['title']}}"/>
                    <form action="{{route('views.count')}}" method="POST">@csrf
                        <button class="read-more" type="submit">Read more</button>
                    <input type="hidden" name="blog-id" value="{{$blogItem->id}}">
                    </form>
                    @if(Auth::user())
                    @if(Auth::user()->admin === 1)
                            <a class="admin-edit" href="{{route('posts.edit', $blogItem['id'])}}">edit</a>
                            <form action="{{route('posts.destroy',  $blogItem->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>

                        @if($blogItem['hidden'] === 1)
                                <form action="{{route('posts.unhide',  $blogItem->id)}}" method="POST">
                                    @csrf
                                    <button class="hidden" type="submit">Show</button>
                                </form>
                            @else
                                <form action="{{route('posts.hide',  $blogItem->id)}}" method="POST">
                                    @csrf
                                    <button class="shown" type="submit">Hide</button>
                                </form>
                            @endif
                    @endif
                    @endif
                    @endif
                </div>
        </div>
                    @endforeach
    </div>
@endsection
