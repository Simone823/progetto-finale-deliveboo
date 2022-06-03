<nav id="navbar_auth" class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-md">

        {{-- LOGO --}}
        <a class="ms-3 ms-md-0 navbar-brand" href="{{ url('/') }}">
            <img id="header_logo_deliveboo" src="{{ asset('img/logo_turquoise.svg') }}" alt="Deliveboo">
        </a>

        {{-- BURGER ICON --}}
        <div id="burger-icon" class="me-3 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <label for="check">
                <input type="checkbox" id="check"/> 
                <span></span>
                <span></span>
                <span></span>
            </label>        
        </div>

        {{-- MENU ESTESO --}}
        <div class="d-none d-md-flex justify-content-end align-items-center">
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
                    <div class="link_wrapper d-flex align-items-center">
                            
                        {{-- List link --}}
                        <ul class="lists_link list-unstyled d-flex align-items-center gap-4">
                            <li>
                                <a class="@if(Route::is('admin.homepage'))active @endif text-decoration-none" href="{{route('admin.homepage')}}">
                                    <span class="@if(Route::is('admin.homepage')) active @endif navbar_dashboard">
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class=" text-decoration-none" href="{{route('admin.plates.index')}}">
                                    <span class="@if(Route::is('admin.plates.index'))active @endif navbar_dashboard">
                                        Tutti i Piatti
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class=" text-decoration-none" href="{{route('admin.plates.create')}}">
                                    <span class="@if(Route::is('admin.plates.create'))active @endif navbar_dashboard">
                                        Crea nuovo piatto
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- Dropdown logout --}}
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <button class="btn-standard btn-green_1 fw-bold">
                                {{ Auth::user()->name }}
                                <i class="ms-2 fa-solid fa-caret-down"></i>
                            </button>
                        </a>
    
                        {{-- Drop item --}}
                        <ul class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-color me-2 fa-solid fa-right-from-bracket"></i>
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
        <div class="nav-burger collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">            
                
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item text-center @if(Route::is('login')) bg-purple @endif">
                        <a class="nav-link text-reset" href="{{ route('login') }}">
                            <span class="@if(Route::is('login')) active @endif navbar_dashboard">
                                Accedi
                            </span>  
                        </a>
                    </li>
                    
                @if (Route::has('register'))

                    <li class="nav-item text-center mb-2 @if(Route::is('register')) bg-purple @endif">
                        <a class="nav-link text-reset" href="{{ route('register') }}">
                            <span class="@if(Route::is('register')) active @endif navbar_dashboard">
                                Diventa nostro partner
                            </span>                                    
                        </a>
                    </li>
                    
                @endif
                    
                @else
                    {{-- List link --}}
                    <li class="nav-item text-center p-2 @if(Route::is('admin.homepage')) bg-purple @endif">
                        <a class="text-decoration-none" href="{{route('admin.homepage')}}">
                            <span class="@if(Route::is('admin.homepage')) active @endif navbar_dashboard">
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item text-center p-2 @if(Route::is('admin.plates.index')) bg-purple @endif">
                        <a class="text-decoration-none" href="{{route('admin.plates.index')}}">
                            <span class="@if(Route::is('admin.plates.index')) active @endif navbar_dashboard">
                                Tutti i Piatti
                            </span>
                        </a>
                    </li>
                    <li class="nav-item text-center p-2  @if(Route::is('admin.plates.create')) bg-purple @endif">
                        <a class=" text-decoration-none" href="{{route('admin.plates.create')}}">
                            <span class="@if(Route::is('admin.plates.create'))active @endif navbar_dashboard">
                                Crea nuovo piatto
                            </span>
                        </a>
                    </li>
                    <li class="nav-item text-center m-3">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button class="btn-standard btn-green_1 fw-bold">
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
                @endguest    
            </ul>
        </div>

    </div>
</nav>