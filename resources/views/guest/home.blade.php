<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/front.css')}}">
    <title>Document</title>
</head>
<body>
    <nav id="navbar_app" class="navbar navbar-expand-md navbar-light shadow-sm d-flex align-center">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
               <img id="header_logo_deliveboo" src="{{ asset('img/logo_white.svg') }}" alt="">
            </a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto d-flex align-items-center gap-4">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        {{-- Link wrapper --}}
                        <div class="link_wrapper">

                            {{-- List link --}}
                            <ul class="lists_link list-unstyled d-flex align-items-center gap-4">
                                <li>
                                    <a class="@if(Route::is('admin.homepage'))active @endif fw-bolder text-uppercase text-decoration-none" href="{{route('admin.homepage')}}">
                                        <span class="@if(Route::is('admin.homepage')) active @endif navbar_dashboard">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="fw-bolder text-uppercase text-decoration-none" href="{{route('admin.plates.index')}}">
                                        <span class="@if(Route::is('admin.plates.index'))active @endif navbar_dashboard">
                                            Tutti i Piatti
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="fw-bolder text-uppercase text-decoration-none" href="{{route('admin.plates.create')}}">
                                        <span class="@if(Route::is('admin.plates.create'))active @endif navbar_dashboard">
                                            Crea nuovo piatto
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{-- Dropdown logout --}}
                        <div class="dropdown">
                            <button class="btn rounded-pill dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                                <span id="navbar_user_color">
                                    {{ Auth::user()->name }}
                                </span> 
                            </button>

                            {{-- Drop item --}}
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{-- faccio il div con l'id per Vue --}}
    <div id="root"></div>
    {{-- collego il file js --}}
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>