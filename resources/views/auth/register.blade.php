@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card fw-bolder">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Inserisci il tuo Nome" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Surname --}}
                        <div class="form-group row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Inserisci il tuo Cognome" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Indirizzo Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Passowrd --}}
                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password confirm --}}
                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Conferma Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- Business name --}}
                        <div class="form-group row mb-3">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Nome Ristorante" id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name" autofocus>

                                @error('business_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Partita iva --}}
                        <div class="form-group row mb-3">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Partita Iva" id="p_iva" type="number" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                @error('p_iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business city --}}
                        <div class="form-group row mb-3">
                            <label for="business_city" class="col-md-4 col-form-label text-md-right">{{ __('Città*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Città" id="business_city" type="text" class="form-control @error('business_city') is-invalid @enderror" name="business_city" value="{{ old('business_city') }}" required autocomplete="business_city" autofocus>

                                @error('business_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business cap --}}
                        <div class="form-group row mb-3">
                            <label for="business_cap" class="col-md-4 col-form-label text-md-right">{{ __('CAP*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="CAP" id="business_cap" type="number" class="form-control @error('business_cap') is-invalid @enderror" name="business_cap" value="{{ old('business_cap') }}" required autocomplete="business_cap" autofocus>

                                @error('business_cap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business address --}}
                        <div class="form-group row mb-4">
                            <label for="business_address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Indirizzo Ristorante" id="business_address" type="text" class="form-control @error('business_address') is-invalid @enderror" name="business_address" value="{{ old('business_address') }}" required autocomplete="business_address" autofocus>

                                @error('business_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Tipologia ristorante --}}
                        <div class="types row mb-3">
                            {{-- Info--}}
                            <h5 class="fw-bolder text-center mb-3">Tipologie Ristorante* (Minimo 1)</h5>
                            {{-- Form checkbox --}}
                            <ul class="form-group d-flex flex-wrap gap-2">
                                @foreach($types as $index => $type)
                                    <li class="form-group form-check">
                                        <input type="checkbox" class="form-check-input @error('types.{{$index}}') is-invalid @enderror" value="{{$type->id}}" name="types[{{$index}}]" id="types-{{$type->id}}">
                                        <label class="form-check-label" for="types-{{$type->id}}">{{$type->name}}</label>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- Errors types --}}
                            @error('types')
                                <span class="alert alert-danger">{{ $message . ' min: 1' }}</span>
                            @enderror
                        </div>

                        {{-- Business image --}}
                        <div class="form-group row mb-3">
                            <label for="business_image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Immagine Ristorante" id="business_image" type="file" class="form-control @error('business_image') is-invalid @enderror" name="business_image" value="{{ old('business_image') }}" autocomplete="business_image" autofocus>

                                @error('business_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Button register --}}
                        <div class="form-group mb-0">
                            <div class="col-md-6 mx-auto text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
