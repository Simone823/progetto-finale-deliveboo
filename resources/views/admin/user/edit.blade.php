@extends('layouts.app')

@section('metaTitle')
Deliveboo - {{$user->business_name}}
@endsection

@section('content')
<div class="register-wrapper modify-wrapper container-md pt-4 d-flex">
    <div class="col-10 col-sm-8 col-md-6 m-auto m-md-0">
        
        {{-- TURN BACK --}}
        <div class="pb-3 align-self-end">
            <a href="{{route('admin.homepage')}}" class="text-reset text-decoration-none">
                <i class="fa-solid fa-arrow-left-long"></i>
                <span class="text-hover-purple">Torna alla dashboard</span>
            </a>
        </div>

        <h1 class="fw-bold mb-4">{{$user->business_name}}</h1>
        
        <form method="POST" action="{{ route('admin.user.update', $user) }}" enctype="multipart/form-data">
            {{-- Key --}}
            @csrf

            {{-- Method --}}
            @method('PUT')


            {{-- Image wrapper business_image --}}
            <div class="wrapper_image d-flex justify-content-center d-md-none">
                <figure class="image_business figure rounded overflow-hidden">
                    <img class="img-thumbnail" src="{{$user->business_image ? asset('storage/'.$user->business_image) : asset('img/placeholder_restaurants.png')}}" alt="">
                </figure>
            </div>

            {{-- Business image input--}}
            <div class="form-group mb-4">
                <h6 class="fw-bold">Immagine del ristorante</h6>
        
                <div class="col-lg-8">
                    <input accept="image/*" placeholder="Immagine Ristorante" id="business_image" type="file" class="form-control @error('business_image') is-invalid @enderror" name="business_image" value="{{ old('business_image', $user->business_image) }}">
        
                    @error('business_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            

            {{-- Business name --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" " id="business_name" type="text" class="form__input @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name', $user->business_name) }}" autocomplete="business_name" autocomplete="off">

                <label for="business_name" class="form__label">Nome del ristorante</label>
                
                @error('business_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            {{-- Business address --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" " id="business_address" type="text" class="form__input @error('business_address') is-invalid @enderror" name="business_address" value="{{ old('business_address', $user->business_address) }}" autocomplete="off">

                <label for="business_address" class="form__label">Indirizzo del ristorante</label>
            
                @error('business_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror            
            </div>


            {{-- CITY - CAP --}}
            <div class="d-block d-sm-flex mb-3 w-100 gap-3">
                {{-- Business city --}}
                <div class="form col-12 col-sm-5 mb-3 mb-sm-0 flex-grow-1">
                    <input required placeholder=" " id="business_city" type="text" class="form__input @error('business_city') is-invalid @enderror" name="business_city" value="{{ old('business_city', $user->business_city) }}" autocomplete="off">

                    <label for="business_city" class="form__label">Città o paese</label>
        
                    @error('business_city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
                {{-- Business cap --}}
                <div class="form col-12 col-sm-5 flex-grow-1">
                    <input required placeholder=" " id="business_cap" type="number" class="form__input @error('business_cap') is-invalid @enderror" name="business_cap" value="{{ old('business_cap', $user->business_cap) }}" autocomplete="off">

                    <label for="business_cap" class="form__label">CAP</label>
                    
                    @error('business_cap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            {{-- Partita iva --}}
            <div class="form w-100 mb-2">
                <input disabled placeholder=" " id="p_iva" type="text" class="text-uppercase form__input @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva', $user->p_iva) }}" autocomplete="off">

                <label for="p_iva" class="form__label">Partita IVA</label>
    
                @error('p_iva')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

              

            {{-- Tipologia ristorante --}}
            <div class="types row mb-3">
                {{-- Info--}}
                <h6 class="fw-bolder text-violet">Tipo di cucina (min 1)</h6>
                {{-- Form checkbox --}}

                <div class="btn-type d-flex flex-wrap" role="group">
                    @foreach($types as $index => $type)
                        <input {{$user->types->contains($type) ? 'checked' : '' }} type="checkbox" class="btn-check" id="types-{{$type->id}}" value="{{$type->id}}" name="types[{{$index}}]"autocomplete="off">

                        <label class="btn btn-outline-primary mb-2 me-1 flex-grow-1" for="types-{{$type->id}}">{{$type->type_name}}</label>
                    @endforeach
                </div>

                {{-- Errors types --}}
                @error('types')
                    <span class="alert alert-danger">
                        {{ $message . ' min: 1' }}
                    </span>
                @enderror
            </div>


            {{-- NOME - COGNOME --}}
            <div class="d-block d-sm-flex mb-3 w-100 gap-3">                
                {{-- Name --}}
                <div class="form col-12 col-sm-5 mb-3 mb-sm-0 flex-grow-1">
            
                    <input required placeholder=" " id="name" type="text" class="form__input @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autocomplete="off">

                    <label for="name" class="form__label">Nome</label>
        
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 
                </div>
            
                {{-- Surname --}}
                <div class="form col-12 col-sm-5 flex-grow-1">
            
                    <input required placeholder=" " id="surname" type="text" class="form__input @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname', $user->surname) }}" autocomplete="off">

                    <label for="surname" class="form__label">Cognome</label>
        
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                </div>
            </div>
        
        
            {{-- Email --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" " id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="off">

                <label for="email" class="form__label">Email</label>
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        
            {{-- Button register --}}
            <div class="form-group mb-0 pb-5">
                <button type="submit" class="btn-standard btn-green_1">
                    {{ __('Invia') }}
                </button>
            </div>
        </form>
    </div>

    <div class="image-modify col-6 d-none d-md-flex justify-content-center align-items-center">
        {{-- Image wrapper business_image --}}
        <figure class="image_business figure rounded overflow-hidden">
            <img class="img-thumbnail" src="{{$user->business_image ? asset('storage/'.$user->business_image) : asset('img/placeholder_restaurants.png')}}" alt="">
        </figure>
    </div>

</div>

@endsection