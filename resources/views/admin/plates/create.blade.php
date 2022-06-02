@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO DB | CREA NUOVO PIATTO')

@section('content')

<div class="container py-5 px-3">

    {{-- Title --}}
    <h1>Crea nuovo Piatto</h1>

    <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- name --}}
        <div class="form-group">
            <label for="name">Nome Piatto</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Insert plate name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- ingredients --}}
        <div class="form-group">
            <label for="ingredients">Ingredienti / Descrizione</label>
            <textarea type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" rows="3" placeholder="Enter the ingredients separated by ','">
                {{ old('ingredients') }}
            </textarea>
            @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- price --}}
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Inserisci il prezzo in formato: XX.XX">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- visibility --}}
        <div class="form-group">
            <label for="visibility">Visibilità</label>
            <select class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example" name="visibility" id="visibility">
                <option selected disabled>Seleziona una visibilità</option>
                <option {{ old('visibility') == '0' ? 'selected' : '' }} value="0">Non Visibile</option>
                <option {{ old('visibility') == '1' ? 'selected' : '' }} value="1">Visibile</option>
            </select>
            @error('visibility')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- image --}}
        <div class="form-group">
            <label for="image" class="col-md-4 col-form-label text-md-right">Immagine</label>
            <div class="col-md-6">
                <input accept="image/*" placeholder="Immagine Ristorante" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autofocus>

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Button --}}
        <div class="container px-0 py-3">
            <button type="submit" class="btn btn-green_1 btn-hover-violet px-4">Aggiungi</button>
        </div>

    </form>
@endsection