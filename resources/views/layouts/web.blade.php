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
        background-size: 100% auto;
        background-repeat: no-repeat;   
        min-height: 100vh;
    }
        .navbar-dark a
        {
            color: #000000;
        }
        .navbar-dark a:hover
        {
            color: #b3ffb3;
            background: #5D8A4B;
            transition: 0.4s;
        }
        .navbar-toggler {
            font-size: 1.125rem;
            line-height: 1;
            background-color: #5D8A4B;
            border: 1px solid #ffffff;
            border-radius: 0.25rem;
        }
        .bd-footer {
            background-color: transparent;
        }
    </style>
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg pt-3">
            <div class="container-fluid">
                    <a class="col-md navbar-brand" href="{{ route('home')}}"><img src="{{asset("assets/images/default/brand.png")}}" alt="Brand"></a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse col-md-9">
                        
                        <ul class="navbar-nav navbar-dark mr-auto">
                            {{-- 
                             --}}
                            <li class="nav-item">
                                <a class="nav-link px-3 rounded-pill" href="/">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 rounded-pill" href="{{route('categories')}}">PRODUCTS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 rounded-pill" href="#">INSPIRATION</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-dark    ml-auto">
                            {{-- @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user_dashboard')}}">
                                        {{ Auth::user()->fname }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest --}}
                        </ul>
                    </div>
                    <div class="col-md-2"></div>
            </div>
        </nav>
        <main>
                @yield('content')
        </main>
    </div>
    <footer class="bd-footer text-muted">
        <div class="container-fluid p-3 p-md-5">
            <ul class="bd-footer-links">
            <li><a href="https://github.com/thiensgith/web0001">GitHub</a></li>
            <li><a href="https://www.facebook.com/borntodiee">A Cute Cat</a></li>
            <li><a href="#">About</a></li>
            </ul>
            <p>Designed and built with all the love of <a href="https://www.facebook.com/borntodiee">A Cute Cat</a> with the help of <a href="#">open source</a>.</p>
        </div>
    </footer>
</body>
</html>