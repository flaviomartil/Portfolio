<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ url('/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <div id="app"> --}}
    {{-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                               
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><strong>{{ config('app.name', 'Laravel') }}</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    </div>
        </div>
        </li>
        </ul>
        <ul class="nav navbar-nav my-2 my-lg-0">
            <li class="nav-item"><a id="user" class="nav-link"><i class="fas fa-user"></i>
                    {{ Auth::user()->name }}</a></li>
            <li class="nav-item"><a id="logout" class="nav-link teste" href="/logout"><i
                        class="fas fa-sign-in-alt"></i>
                    Sair</a></li>
        </ul>
    </nav>

    @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
<style>
    .navbar {
        position: relative;
    }

    .navbar-brand {
        font-size: 40px;
        position: absolute;
        left: 40%;
        margin-left: -50px !important;
        display: block;
    }

    #user:hover {
        background-color: #272829;
        color: red;
    }

    #logout:hover {
        background-color: #272829;
        color: red;
    }

</style>

</html>
