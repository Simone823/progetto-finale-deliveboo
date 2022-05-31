@php
    // dalla stringa degli ingredienti mi creo un array con i singoli ingredienti
    $plate_ingredients = explode(',',$plate->ingredients);
@endphp

@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO DB | '. $plate->name)

@section('content')
    <div id="section_plate_show" class="container px-3">

        <div class="row justify-content-center">

            {{-- Card plate  --}}
            <div class="card col-12 col-md-8 shadow-lg bkg-white_1 text-center text-violet">
    
                {{-- Image wrapper plate image --}}
                <div class="wrapper_image d-flex justify-content-center px-3">
                    <figure class="plate_image shadow-lg">
                        <img src="https://picsum.photos/1920/1080" alt="">
                    </figure>
                </div>
    
                {{-- Card body --}}
                <div class="card-body fw-bolder">
                    <h2 class="card-title fw-bold">{{$plate->name}}</h2>
                    <p class="card-text fs-5 mb-1">Ingredienti / Descrizione:</p>
                    <ul class="ingredients mb-3">
                        {{-- ciclo l'array per stamparmi un elenco di ingredienti --}}
                        @foreach ($plate_ingredients as $ingredient)
                        <li>{{ $ingredient }}</li>
                        @endforeach
                    </ul>
                    <p class="card-text mb-3 fs-5">Prezzo: <span>{{ $plate->price }}&euro;</span></p>
    
                    {{-- Buttons --}}
                    <div class="buttons d-flex flex-wrap gap-2 justify-content-center align-items-center">
                        <a class="btn btn-warning" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                        <form onsubmit="return confirm('Sei sicuro di voler eliminare ({{$plate->name}}) dal tuo database?')" action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
    
                            <button class="btn btn-danger" type="submit">
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      

    </div>
@endsection