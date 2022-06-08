@extends('layouts.app')

@section('metaTitle', 'Deliveboo - Registrazione')

@section('content')
<div class="col-12 register-wrapper container-md pt-4 d-block d-md-flex">
    <div class="col-10 col-sm-8 col-md-6 m-auto m-md-0">

        {{-- TURN BACK --}}
        <div class="pb-3 align-self-end">
            <a href="{{url('/')}}" class="text-reset text-decoration-none">
                <i class="fa-solid fa-arrow-left-long"></i>
                <span class="text-hover-purple">Torna alla homepage</span>
            </a>
        </div>
        
        <h1 class="fw-bold mb-4">Diventa un partner di Deliveboo</h1>
        
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            
            {{-- Business name --}}
            <div class="form w-100 mb-3">                
                
                <input required id="business_name" type="text" class="form__input @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" placeholder=" " autocomplete="off">

                <label for="business_name" class="form__label">Nome del ristorante</label>
                    
                @error('business_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror               
            </div>

            
            {{-- Business address --}}
            <div class="form w-100 mb-3">

                <input required id="business_address" type="text" class="form__input @error('business_address') is-invalid @enderror" name="business_address" value="{{ old('business_address') }}" placeholder=" " autocomplete="off">

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
                    <input required placeholder=" " id="business_city" type="text" class="form__input @error('business_city') is-invalid @enderror" name="business_city" value="{{ old('business_city') }}" autocomplete="off">

                    <label for="business_city" class="form__label">Città o paese</label>
        
                    @error('business_city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
                {{-- Business cap --}}
                <div class="form col-12 col-sm-5 flex-grow-1">
                    <input required placeholder=" " id="business_cap" type="number" class="form__input @error('business_cap') is-invalid @enderror" name="business_cap" value="{{ old('business_cap') }}" autocomplete="off">

                    <label for="business_cap" class="form__label">CAP</label>
                    
                    @error('business_cap')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            {{-- Partita iva --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" " id="p_iva" type="text" class="form__input @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" autocomplete="off">

                <label for="p_iva" class="form__label">Partita IVA</label>
    
                @error('p_iva')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
              

            {{-- Tipologia ristorante --}}
            <div class="types row pt-2 mb-3">
                {{-- Info--}}
                <h6 class="fw-bolder">Tipo di cucina (min 1)</h6>
                {{-- Form checkbox --}}

                <div class="btn-type d-flex flex-wrap" role="group">
                    @foreach($types as $index => $type)
                        <input type="checkbox" class="btn-check" id="types-{{$type->id}}" value="{{$type->id}}" name="types[{{$index}}]"autocomplete="off">

                        <label class="btn btn-outline-primary mb-2 me-1 flex-grow-1" for="types-{{$type->id}}">{{$type->type_name}}</label>
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
            <div class="d-block d-sm-flex mb-3 w-100 gap-3">                
                {{-- Name --}}
                <div class="form col-12 col-sm-5 mb-3 mb-sm-0 flex-grow-1">
            
                    <input required placeholder=" " id="name" type="text" class="form__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off">

                    <label for="name" class="form__label">Nome</label>
        
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 
                </div>
            
                {{-- Surname --}}
                <div class="form col-12 col-sm-5 flex-grow-1">
            
                    <input required placeholder=" " id="surname" type="text" class="form__input @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="off">

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
                <input required placeholder=" " id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off">

                <label for="email" class="form__label">Email</label>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        
            {{-- Passowrd --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" " id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" autocomplete="off">

                <label for="password" class="form__label">Password</label>
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            
        
            {{-- Password confirm --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" " id="password-confirm" type="password" class="form__input" name="password_confirmation" autocomplete="off">

                <label for="password_confirmation" class="form__label">Conferma Password</label>
            </div>
        
        
            {{-- Business image input--}}
            <div class="form-group mb-3">
                <h6 class="fw-bold">Immagine del ristorante</h6>
        
                <div class="col-lg-8">
                    <input accept="image/*" placeholder="Immagine Ristorante" id="business_image" type="file" class="form-control @error('business_image') is-invalid @enderror" name="business_image" value="{{ old('business_image') }}">
        
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

    <div class="video-modify-1 d-none d-md-flex col-6 justify-content-center align-items-center">
        {{-- video --}}
        <iframe
        src="https://player.vimeo.com/video/341514802?h=12d8780e12&amp;title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;autopause=0&amp;controls=0&amp;loop=1&amp;background=1&amp;app_id=122963" width="426" height="240" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="width: 100%;height: 100%;">
        </iframe>
        {{-- filigrana --}}
        <div class="filigrana-wrapper">
            <img src="{{ asset('img/deliveboo_filigrana.png') }}" alt="">
        </div>
    </div>

</div>

<div class="video-modify-2 container-fluid d-flex d-md-none justify-content-center align-items-center">
    {{-- video --}}
    <div class="video-2">
        <iframe
        src="https://player.vimeo.com/video/341514802?h=12d8780e12&amp;title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;autopause=0&amp;controls=0&amp;loop=1&amp;background=1&amp;app_id=122963" width="770" height="430" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" style="display: block;">
        </iframe>
        
        {{-- filigrana --}}
        <div class="filigrana-wrapper">
            <img src="{{ asset('img/deliveboo_filigrana.png') }}" alt="">
        </div>
    </div>
</div>
@endsection
