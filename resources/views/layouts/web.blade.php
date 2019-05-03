<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'The Earth Garden') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script async src="//pagead2.googlesyndication.com/
    pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8446253636658211",
    enable_page_level_ads: true
    });
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
        background: url('/assets/images/default/home-background.jpeg');
        background-size: cover;
        background-repeat: no-repeat;   
        min-height: 100vh;
    }
    </style>
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                    <a class="navbar-brand" href="{{ route('home')}}">{{ config('app.name', 'The Earth Garden') }}</a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @foreach ($navbar_data as $item)
                            <li class="nav-item">
                            <a href="{{route('home')."/".$item->category_slug}}" class="nav-link">{{$item->category_name}}</a>
                            </li>
                            @endforeach
                            @guest
                                <li class="nav-item ml-2">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    <a class="btn btn-outline-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                </li>
                                {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                            @else
                                <li class="nav-item mx-2">
                                    <a class="btn btn-outline-dark" href="{{ route('user_dashboard')}}">
                                        {{ Auth::user()->fname }} <span class="caret"></span>
                                    </a>
    
                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div> --}}
                                </li>
                            @endguest
                        </ul>
                    </div>
            </div>
        </nav>
        <main>
                @yield('content')
        </main>
    </div>
</body>
</html>