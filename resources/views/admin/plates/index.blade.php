@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO DB | PIATTI')

@section('content')
{{-- Wrapper cards plate --}}
<div class="wrapper_cards_plate container py-5 px-3">

    {{-- Title --}}
    <h3 class="mb-4 text-violet fw-bold fs-3">Elenco dei piatti del ristorante: {{$user->business_name}}</h3>

    {{-- Row --}}
    <div class="row gy-5">
        
        {{-- Foreach plates --}}
        @foreach ($plates as $plate)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                {{-- Card --}}
                <div class="card bkg-white_1 shadow-lg h-100">
                    <img class="card-img-top" src="https://picsum.photos/1920/1080" alt="">

                    {{-- Description card body --}}
                    <div class="description card-body text-violet fw-bolder">
                        <h5 class="card-title fw-bold">{{$plate->name}}</h5>
                        <p class="card-text">{{$plate->ingredients}}</p>
                        <p class="card-text">Visibile: {{$plate->visibility == 1 ? 'SI' : 'NO'}}</p>
                    </div>
                    
                    {{-- Buttons --}}
                    <div class="btn_wrapper d-flex flex-wrap gap-3 justify-content-center mb-4">
                        <a class="btn btn-green_1 btn-hover-violet" href="{{ route('admin.plates.show', $plate->id) }}">Visualizza</a>
                        <a class="btn btn-green_1 btn-hover-violet" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                        <form onsubmit="return confirm('Sei sicuro di voler eliminare ({{$plate->name}}) dal tuo database?')" action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-green_1 btn-hover-violet" type="submit">
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection