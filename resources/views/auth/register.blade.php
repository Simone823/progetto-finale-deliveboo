@extends('layouts.app')

@section('metaTitle', 'Deliveboo - Registration')

@section('content')
<div class="register-wrapper container-md pt-4">
    <div class="col-10 col-sm-8 col-md-6 m-auto m-md-0">
        
        <h1 class="fw-bold mb-4">Diventa un partner di Deliveboo</h1>
        
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            
            {{-- Business name --}}
            <div class="form-group row mb-2 flex-column">
                
                <div class="">
                    <input placeholder="Nome del ristorante" id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" autocomplete="business_name" autofocus>
                    
                    @error('business_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            {{-- Business address --}}
            <div class="form-group row mb-2 flex-column">   
                <div class="">
                    <input placeholder="Indirizzo e numero civico del ristorante" id="business_address" type="text" class="form-control @error('business_address') is-invalid @enderror" name="business_address" value="{{ old('business_address') }}" autocomplete="business_address" autofocus>
                
                    @error('business_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror            
                </div>         
            </div>

            {{-- CITY - CAP --}}
            <div class="row mb-2">
                {{-- Business city --}}
                <div class="form-group col-6">
                    <input placeholder="Città o paese" id="business_city" type="text" class="form-control @error('business_city') is-invalid @enderror" name="business_city" value="{{ old('business_city') }}" autocomplete="business_city" autofocus>
        
                    @error('business_city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
                {{-- Business cap --}}
                <div class="form-group col-6">
                    <input placeholder="CAP" id="business_cap" type="number" class="form-control @error('business_cap') is-invalid @enderror" name="business_cap" value="{{ old('business_cap') }}" autocomplete="business_cap" autofocus>
                    
                    @error('business_cap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            {{-- Partita iva --}}
            <div class="form-group row mb-2 flex-column">
        
                <div class="">
                    <input placeholder="Partita Iva" id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" autocomplete="p_iva" autofocus>
        
                    @error('p_iva')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
              

            {{-- Tipologia ristorante --}}
            <div class="types row pt-2 mb-2">
                {{-- Info--}}
                <h6 class="fw-bolder">Tipo di cucina (min 1)</h6>
                {{-- Form checkbox --}}

                <div class="btn-type" role="group">
                    @foreach($types as $index => $type)
                        <input type="checkbox" class="btn-check" id="types-{{$type->id}}" value="{{$type->id}}" name="types[{{$index}}]"autocomplete="off">

                        <label class="btn btn-outline-primary mb-2 me-1" for="types-{{$type->id}}">{{$type->type_name}}</label>
                    @endforeach
                </div>

                {{-- Errors types --}}
                @error('types')
                    <span class="text-danger fw-bold">
                        {{ $message . ' min: 1' }}
                    </span>
                @enderror
            </div>


            {{-- NOME - COGNOME --}}
            <div class="row mb-2">                
                {{-- Name --}}
                <div class="form-group col-6">
            
                    <input placeholder="Nome" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
        
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 
                </div>
            
                {{-- Surname --}}
                <div class="form-group col-6">
            
                    <input placeholder="Cognome" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>
        
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                </div>
            </div>
        
        
            {{-- Email --}}
            <div class="form-group row mb-2 flex-column">
        
                <div class="">
                    <input placeholder="Indirizzo email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
        
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            {{-- Passowrd --}}
            <div class="form-group row mb-2 flex-column">
        
                <div class="">
                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
        
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            {{-- Password confirm --}}
            <div class="form-group row mb-2 flex-column">
        
                <div class="">
                    <input placeholder="Conferma Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>
        
        
            {{-- Business image input--}}
            <div class="form-group mb-4">
                <h6 class="fw-bold">Immagine del ristorante</h6>
        
                <div class="col-lg-8">
                    <input accept="image/*" placeholder="Immagine Ristorante" id="business_image" type="file" class="form-control @error('business_image') is-invalid @enderror" name="business_image" value="{{ old('business_image') }}" autofocus>
        
                    @error('business_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        
            {{-- Button register --}}
            <div class="form-group mb-0 pb-5">
                <button type="submit" class="btn-standard btn-green_1">
                    {{ __('Invia') }}
                </button>
            </div>
        </form>

    </div>
</div>

@endsection
