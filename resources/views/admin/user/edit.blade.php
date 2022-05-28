@extends('layouts.app')

@section('metaTitle')
    DELIVEBOO DB | {{$user->name}} {{$user->surname}}
@endsection

@section('content')
    {{-- @dd($user); --}}
<div class="container py-5 px-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card fw-bolder drop-shadow-black-22 letter-spacing-2">

                {{-- Titolo sezione modifica --}}
                <div class="card-header fs-6">
                    <h4 class="mb-0">Modifica dati {{$user->name}}</h4>
                </div>

                <div class="card-body bkg-white_1">

                    <form method="POST" action="{{ route('admin.user.update', $user) }}" enctype="multipart/form-data">

                        {{-- Key --}}
                        @csrf

                        {{-- Method --}}
                        @method('PUT')

                        {{-- Image wrapper business_image --}}
                        <div class="wrapper_image">
                            <figure class="image_business figure rounded overflow-hidden">
                                <img class="img-thumbnail" src="{{asset('storage/'.$user->business_image)}}" alt="">
                            </figure>
                        </div>

                        {{-- Business image --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="business_image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>

                            <div class="col-md-6">
                                <input accept="image/*" placeholder="Immagine Ristorante" id="business_image" type="file" class="form-control @error('business_image') is-invalid @enderror" name="business_image" value="{{ old('business_image', $user->business_image) }}" autofocus>

                                @error('business_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Name --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Inserisci il tuo Nome" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $user->name)}}" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Surname --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Inserisci il tuo Cognome" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname', $user->surname) }}" autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Indirizzo Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business name --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Nome Ristorante" id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name', $user->business_name) }}" autofocus>

                                @error('business_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Partita iva --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva*') }}</label>

                            <div class="col-md-6">
                                <input disabled placeholder="Partita Iva" id="p_iva" type="number" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva', $user->p_iva) }}" autofocus>

                                @error('p_iva')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business city --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="business_city" class="col-md-4 col-form-label text-md-right">{{ __('Città*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Città" id="business_city" type="text" class="form-control @error('business_city') is-invalid @enderror" name="business_city" value="{{ old('business_city', $user->business_city) }}" autofocus>

                                @error('business_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business cap --}}
                        <div class="form-group row mb-3 flex-column align-items-center text-center">
                            <label for="business_cap" class="col-md-4 col-form-label text-md-right">{{ __('CAP*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="CAP" id="business_cap" type="number" class="form-control @error('business_cap') is-invalid @enderror" name="business_cap" value="{{ old('business_cap', $user->business_cap) }}" autofocus>

                                @error('business_cap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Business address --}}
                        <div class="form-group row mb-4 flex-column align-items-center text-center">
                            <label for="business_address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Indirizzo Ristorante" id="business_address" type="text" class="form-control @error('business_address') is-invalid @enderror" name="business_address" value="{{ old('business_address', $user->business_address) }}" autofocus>

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
                                        <input {{$user->types->contains($type) ? 'checked' : '' }} type="checkbox" class="form-check-input @error('types.{{$index}}') is-invalid @enderror" value="{{$type->id}}" name="types[{{$index}}]" id="types-{{$type->id}}">
                                        <label class="form-check-label" for="types-{{$type->id}}">{{$type->name}}</label>
                                    </li>
                                @endforeach
                            </ul>
                            {{-- Errors types --}}
                            @error('types')
                            <span class="alert alert-danger">{{ $message . ' min: 1' }}</span>
                            @enderror
                        </div>

                        {{-- Button edit --}}
                        <div class="form-group mb-0">
                            <div class="col-md-6 mx-auto text-center">
                                <button type="submit" class="btn btn-green_1 btn-hover-violet fw-bolder letter-spacing-2">
                                    Modifica
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