@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO DB | LOGIN')

@section('content')
<div class="container py-5 px-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card fw-bolder drop-shadow-black-22 letter-spacing-2">

                <div class="card-header fs-6">{{ __('Login') }}</div>

                <div class="card-body bkg-white_1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Indirizzo E-mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Passowrd --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Remember check --}}
                        <div class="form-group row mb-3 flex-column align-items-center">
                            <div class="col-md-7">
                                <div class="form-check d-flex justify-content-center gap-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Login btn --}}
                        <div class="form-group mb-0">
                            <div class="col-md-8 m-auto text-center">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
