<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboo - Log in</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        @extends('layouts.header')
    </header>  

    <main>

        {{-- SECTION PRINCIPALE --}}
        <section class="login-content d-flex flex-column flex-md-row">
            
            <div class="col-12 col-md-6 p-3 d-flex justify-content-center align-items-center">
                <div class="form-wrapper">

                    {{-- TURN BACK --}}
                    <div class="pb-3 align-self-end">
                        <a href="{{url('/')}}" class="text-reset text-decoration-none">
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <span class="text-hover-purple">Torna alla homepage</span>
                        </a>
                    </div>
                    
                    <h1 class="fw-bold">Ti diamo il benvenuto su Deliveboo</h1>
                    <p>Sfrutta i dati a disposizione per far crescere il tuo business. Monitora le vendite, controlla i tuoi progressi e attira nuovi clienti con offerte speciali.</p>
                    
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
            
                        
                        {{-- Email --}}
                        <div class="form w-100 mb-3">
                            <input placeholder=" " id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">

                            <label for="email" class="form__label">Email</label>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        
                        {{-- Passowrd --}}
                        <div class="form w-100 mb-3">
                            <input placeholder=" " id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" autocomplete="off">

                            <label for="password" class="form__label">Password</label>
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        
                        
                        {{-- Remember check --}}
                        <div class="form-group mb-3 flex-column align-items-center">
                            <div class="col-md-7">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Login btn --}}
                        <div class="form-group mb-3">
                            <button type="submit" class="fw-bold btn-standard login-button btn-green_1">
                                {{ __('Log in') }}
                            </button>                            
                        </div>

                        {{-- PASSWORD DIMENTICATA --}}
                        <div class="forgot-psw">
                            @if (Route::has('password.request'))
                            <a class="text-reset text-decoration-none text-hover-underline" href="{{ route('password.request') }}">
                                {{ __('Password dimenticata?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
                
                
                <div class="col-12 col-md-6 login-img">
                    <div class="img-wrapper">
                        <img src="{{ asset('img/del_login.svg') }}" alt="">
                    </div>
                    
                    <div class="login-background">
                        
                    </div>                
                </div>
                
        </section>

    </main>
</body>
</html>