@extends('layouts.app')

@section('metaTitle', 'Deliveboo - Nuovo piatto')

@section('content')

<div class="register-wrapper modify-wrapper container-md pt-4 d-flex justify-content-center">
    <div class="col-10 col-sm-8 col-md-6 m-auto m-md-0">

        {{-- TURN BACK --}}
        <div class="pb-3 align-self-end">
            <a href="{{route('admin.homepage')}}" class="text-reset text-decoration-none">
                <i class="fa-solid fa-arrow-left-long"></i>
                <span class="text-hover-purple">Torna alla dashboard</span>
            </a>
        </div>
        
        <h1 class="fw-bold mb-4">Crea un nuovo Piatto</h1>
        
        <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
            {{-- Key --}}
            @csrf

            {{-- NOME PIATTO --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" "
                id="name" type="text" class="form__input
                @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}"
                autocomplete="off">

                <label for="name" class="form__label">Nome del piatto</label>
                
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 



            {{-- IGREDIENTI --}}
            <div class="form form-area w-100 mb-3">
                <textarea placeholder="Inserisci gli ingredienti separandoli con una virgola"
                id="ingredients" type="text" class="form__input @error('ingredients') is-invalid @enderror" rows="3" required
                name="ingredients">{{ old('ingredients') }}</textarea>

                <label for="ingredients" class="form__label form-area__label">Ingredienti</label>
                
                @error('ingredients')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>                



            {{-- Prezzo --}}
            <div class="form w-100 mb-3">
                <input required placeholder=" "
                id="price" type=number step=0.01 min="0.20" class="form__input
                @error('price') is-invalid @enderror"
                name="price" value="{{ old('price') }}"
                autocomplete="off">

                <label for="price" class="form__label">Prezzo</label>
                
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 



            {{-- visibile --}}
            <div class="form-group mb-3">
                <h6 class="fw-bold">Disponibile</h6>          
  
                <div class="radio-visibility @error('visibility') is-invalid @enderror">
                    <input class="radio-yes" label="Si" type="radio" id="si" name="visibility" value="1" checked>
                    <input class="radio-no" label="No" type="radio" id="no" name="visibility" value="0">
                </div>

                @error('visibility')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            {{-- plate image input--}}
            <div class="form-group mb-3">
                <h6 class="fw-bold">Immagine del piatto</h6>
        
                <div class="col-lg-8">
                    <input accept="image/*" placeholder="Immagine del piatto" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
        
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

        
            {{-- Button --}}
            <div class="form-group mb-0 pb-5">
                <button type="submit" class="btn-standard btn-green_1">
                    Aggiungi
                </button>
            </div>            

        </form>
    </div>
</div>

@endsection
