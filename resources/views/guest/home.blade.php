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

          <button class="d-md-none btn-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon-color fa-solid fa-bars"></i>
            Menu            
          </button>



          <div class="d-none d-md-block justify-content-end">
            <ul class="navbar-nav">

            

              <li class="nav-item">
                <a class="nav-link">
                    <button class="btn-white">
                        <i class="icon-color me-2 fa-solid fa-house"></i>
                        Registrati o accedi
                    </button>
                </a>
              </li>
              
            </ul>
          </div>



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








    {{-- Container --}}
    <div class="container">

        {{-- Link login register home --}}
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