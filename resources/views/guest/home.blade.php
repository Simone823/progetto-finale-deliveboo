<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/front.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Deliveboo</title>
</head>
<body>
    <nav id="navbar_guest" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            {{-- LOGO --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                <img id="header_logo_deliveboo" src="{{ asset('img/logo_white.svg') }}" alt="Deliveboo">
            </a>

            {{-- BURGER ICON --}}
            <button class="d-md-none btn-standard btn-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon-color me-2 fa-solid fa-bars"></i>
                Menu            
            </button>

            {{-- MENU ESTESO --}}
            <div class="d-none d-md-flex justify-content-end">
                <ul class="navbar-nav flex-md-row gap-4">            
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <button class="btn-standard btn-white">
                                <i class="icon-color me-2 fa-solid fa-caret-down"></i>
                                Collabora con noi
                            </button>
                        </a>

                        <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                    Ristoranti
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-color me-2 fa-solid fa-briefcase"></i>
                                    Lavora con noi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="icon-color me-2 fa-solid fa-building"></i>
                                    Deliveroo for Work
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link" href="{{ url('/admin/homepage') }}">
                                    <button class="btn-standard btn-white">
                                        <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                        Dashboard                                 
                                    </button>
                                </a>
                            @else
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="btn-standard btn-white">
                                        <i class="icon-color me-2 fa-solid fa-home"></i>
                                        Registrati o accedi                                
                                    </button>
                                </a>
                            @endauth
                        @endif
                    </li>

                </ul>
            </div>

            {{-- MENU BURGER --}}
            <div class="nav-burger collapse navbar-collapse" id="navbarNav">
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










    <div class="container">


        @if (Route::has('login'))
        
        <div class="top-right links">
            @auth
                <a href="{{ url('/admin/homepage') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
    
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
        @endif
    </div> 
   

    {{-- faccio il div con l'id per Vue --}}
    <div id="root"></div>
    {{-- collego il file js --}}
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>