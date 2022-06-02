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
        <div class="container-md">
            {{-- LOGO --}}
            <a class="ms-3 ms-md-0 navbar-brand" href="{{ url('/') }}">
                <img id="header_logo_deliveboo" src="{{ asset('img/logo_white.svg') }}" alt="Deliveboo">
            </a>

            {{-- cart e burger versione tablet - mobile --}}
            <div class="me-3 cart-burger d-flex align-items-center">
                @if (Route::has('login'))
                @guest
                {{-- cart --}}
                <div class="nav-item">
                    <a class="nav-link" href="">
                        <button class="btn-standard btn-white opacity-100">
                            <i class="icon-color fa-solid fa-cart-shopping"></i>                          
                        </button>
                    </a>
                </div>
                @endguest
                @endif    
    
                {{-- BURGER ICON --}}
                <div id="burger-icon" class="d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <label for="check">
                        <input type="checkbox" id="check"/> 
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>        
                </div>
            </div>


            {{-- MENU ESTESO --}}
            <div class="d-none d-md-flex justify-content-end">
                <ul class="navbar-nav flex-md-row gap-2">            
                    
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
                    
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin/homepage') }}">
                                    <button class="btn-standard btn-white">
                                        <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                        Dashboard                                 
                                    </button>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <button class="btn-standard btn-white">
                                        <i class="icon-color me-2 fa-solid fa-home"></i>
                                        Accedi          
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button class="btn-standard btn-white">
                                        Diventa nostro partner     
                                    </button>
                                </a>
                            </li>
                            {{-- cart --}}
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <button class="btn-standard btn-tr-white">
                                        <i class="fa-solid fa-cart-shopping"></i>                          
                                    </button>
                                </a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>



            {{-- MENU BURGER --}}
            <div class="nav-burger collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item text-center dropdown bg-purple">
                        <a class="nav-link text-reset" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Collabora con noi
                            <i class="ms-2 fa-solid fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item text-center" href="#">
                                    <i class="icon-color me-2 fa-solid fa-utensils"></i>
                                    Ristoranti
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-center" href="#">
                                    <i class="icon-color me-2 fa-solid fa-briefcase"></i>
                                    Lavora con noi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-center" href="#">
                                    <i class="icon-color me-2 fa-solid fa-building"></i>
                                    Deliveroo for Work
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item bg-orange">
                                <a class="nav-link text-center text-reset" href="{{ url('/admin/homepage') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item text-center m-3">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <button class="btn-standard btn-violet fw-bold">
                                        <i class="me-2 fa-solid fa-right-from-bracket"></i>
                                        {{ __('Logout') }}
                                    </button>
                                </a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="nav-item bg-orange">
                                <a class="nav-link text-center text-reset" href="{{ route('login') }}">
                                    Accedi
                                </a>
                            </li>
                            <li class="nav-item bg-violet">
                                <a class="nav-link text-center text-reset" href="{{ route('register') }}">
                                    Diventa nostro partner     
                                </a>
                            </li>
                        @endauth
                    @endif                    
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