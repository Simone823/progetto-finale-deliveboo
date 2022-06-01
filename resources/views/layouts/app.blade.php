<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('metaTitle')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <nav id="navbar_auth" class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                {{-- LOGO --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="header_logo_deliveboo" src="{{ asset('img/logo_turchese.png') }}" alt="Deliveboo">
                </a>
    
                {{-- BURGER ICON --}}
                <div id="burger-icon" class="d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <label for="check">
                        <input type="checkbox" id="check"/> 
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>        
                </div>
    
                {{-- MENU ESTESO --}}
                <div class="d-none d-md-flex justify-content-end">
                    <ul class="navbar-nav flex-md-row gap-4">            
                        
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <button class="btn-standard btn-transparent">
                                        Accedi
                                    </button>
                                </a>
                            </li>
                            
                            @if (Route::has('register'))

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="btn-standard btn-green_1 fw-bold">
                                        Diventa nostro partner
                                    </button>
                                </a>
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

                
    
                {{-- MENU BURGER --}}
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="me-2 fa-solid fa-house"></i>
                                gggg                            
                            </a>
                        </li>
                        
                    </ul>
                </div>
    
            </div>
        </nav>
    </header>
    
    
    
    

    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
