<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portfolio of Joel</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main>
    <div class="head">
        <div class="nav-right">
            <a href="{{ route('home') }}">Home</a>
            @if (Route::has('login'))
            @auth
                <a href="{{ route('posts') }}">My work</a>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{route('login')}}">Login</a>

                @if (route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif

            @endauth

        </div>
    <div class="center-name">
        <h1>Joel's portfolio</h1>
    </div>
    </div>
    @endif
    @yield('content')
</main>
<footer>© {{date("Y")}} Joel Heezen</footer>
<script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>
