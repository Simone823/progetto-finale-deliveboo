@php
    // dalla stringa degli ingredienti mi creo un array con i singoli ingredienti
    $plate_ingredients = explode(',',$plate->ingredients);
@endphp

@extends('layouts.app')

@section('metaTitle', $plate->name)

@section('content')
    <div class="container">
        <h1>{{ $plate->name }}</h1>
        <p class="m=0">Ingredients:</p>
        <ul>
            {{-- ciclo l'array per stamparmi un elenco di ingredienti --}}
            @foreach ($plate_ingredients as $ingredient)
                <li>{{ $ingredient }}</li>
            @endforeach
        </ul>
        <span>Prezzo: {{ $plate->price }}&euro;</span>
    </div>
@endsection