@extends('layouts.app')

@section('metaTitle', 'Deliveboo - new plate')

@section('content')

<div class="register-wrapper modify-wrapper container-md pt-4 d-flex justify-content-center">
    <div class="col-10 col-sm-8 col-md-6 m-auto m-md-0">
        
        <h1 class="fw-bold mb-4">Crea un nuovo Piatto</h1>
        
        <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
            {{-- Key --}}
            @csrf

            {{-- NOME PIATTO --}}
            <div class="form-group row mb-2 flex-column">
                <h6 class="fw-bold">Nome del piatto</h6>
                <div>
                    <input placeholder="Nome del piatto"
                    id="name" type="text" class="form-control
                    @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}"
                    autocomplete="name">
                    
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
            </div>


            {{-- IGREDIENTI --}}
            <div class="form-group row mb-2 flex-column">
                <h6 class="fw-bold">Ingredienti</h6>
                <div>
                    <textarea placeholder="Inserisci gli ingredienti separandoli con una virgola"
                    id="ingredients" type="text" class="form-control 
                    @error('ingredients') is-invalid @enderror" rows="3"
                    name="ingredients">
                    {{ old('ingredients') }}
                    </textarea>
                    
                    @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>                
            </div>


            {{-- Prezzo --}}
            <div class="form-group row mb-2 flex-column">
                <h6 class="fw-bold">Prezzo</h6>
                <div>
                    <input placeholder="Inserisci il prezzo in formato: XX.XX"
                    id="price" type="text" class="form-control
                    @error('price') is-invalid @enderror"
                    name="price" value="{{ old('price') }}"
                    autocomplete="price">
                    
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
            </div>


            {{-- visibile --}}
            <div class="form-group mb-2">
                <h6 class="fw-bold">Disponibile</h6>          
  
                <div class="radio @error('visibility') is-invalid @enderror">
                    <input class="radio-yes" label="Si" type="radio" id="si" name="visibility" value="1" checked>
                    <input class="radio-no" label="No" type="radio" id="no" name="visibility" value="0">
                </div>

                @error('visibility')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            {{-- plate image input--}}
            <div class="form-group mb-4">
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
            <div class="form-group mb-0 pb-5 d-flex gap-3">
                <button type="submit" class="btn-standard btn-green_1">
                    Aggiungi
                </button>
            </div>
        </form>
    </div>
</div>

@endsection