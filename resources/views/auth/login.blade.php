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

            <div class="col-12 col-md-6 d-flex justify-content-center">
                <div class="form-wrapper">

                    <h1 class="fw-bold">Ti diamo il benvenuto su Deliveboo</h1>
                    <p>Sfrutta i dati a disposizione per far crescere il tuo business. Monitora le vendite, controlla i tuoi progressi e attira nuovi clienti con offerte speciali.</p>

                    
                    {{-- Email --}}
                    <div class="form-group mb-3 flex-column">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail*') }}</label>

                        <div class="">
                            <input placeholder="Indirizzo E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Passowrd --}}
                    <div class="form-group mb-3 flex-column">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                        <div class="">
                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                    <div class="form-group">
                        <button type="submit" class="btn btn-green_1 btn-hover-violet fw-bolder letter-spacing-2">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link fw-bolder" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
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