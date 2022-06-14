@php
    // dalla stringa degli ingredienti mi creo un array con i singoli ingredienti
    $plate_ingredients = explode(',',$plate->ingredients);
@endphp

@extends('layouts.app')

@if($plate->user_id == Auth::id())
    

@section('metaTitle', 'Deliveboo - '. $plate->name)

    @section('content')


    <div class="register-wrapper modify-wrapper container-md pt-4 d-flex gap-4">

        <div class="show-plate col-10 col-sm-8 col-md-6 m-auto m-md-0">

            {{-- TURN BACK --}}
            <div class="pb-3 align-self-end">
                <a href="{{route('admin.plates.index')}}" class="text-reset text-decoration-none">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    <span class="text-hover-purple">Torna alla lista dei piatti</span>
                </a>
            </div>
            
            <h1 class="fw-bold mb-4">{{$plate->name}}</h1>

            {{--Image wrapper plate image --}}
            <div class="wrapper_image d-flex justify-content-center d-md-none">
                <figure class="image_business figure rounded overflow-hidden">
                    <img class="img-thumbnail" src="{{$plate->image ? asset('storage/'.$plate->image) : asset('img/placeholder_plate.png')}}" alt="plate">
                </figure>
            </div>

            <div class="card-text flex-grow-1 mt-2 mb-2 mt-5">
                <div class="icon"><i class="fa-solid fa-wheat-awn"></i></div>
                @php
                    $ingredients = explode(",", $plate->ingredients);
                @endphp
               
               <ul class="pt-2 ms-2">
                @foreach ($ingredients as $ingredient)
                    <li>
                        {{ $ingredient }}
                    </li>                                
                @endforeach
               </ul>
               
               <div class="plate_price">
                   <h4>{{ $plate->price }}€</h4>                   
                </div>
                
            </div>
            
            <div class="d-flex gap-1">
                <h6 class="fw-bold">Disponibile:</h6>
                <img class="plate-available {{ $plate->visibility == 1 ? '' : 'd-none' }}" src="{{ asset('img/check.png') }}" alt="check">
                <img class="plate-available {{ $plate->visibility == 1 ? 'd-none' : '' }}" src="{{ asset('img/cross.png') }}" alt="check">
            </div>

            {{-- Button --}}
            <div class="form-group mb-0 mt-4 d-flex gap-3 pb-5">
                <form onsubmit="return confirm('Sei sicuro di voler eliminare ({{$plate->name}}) dal tuo database?')" action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button class="btn-standard btn-delete-red" type="submit">
                        Elimina
                    </button>
                </form>

                <a href="{{ route('admin.plates.edit', $plate->id) }}">
                    <button class="btn-standard btn-green_1" type="submit">
                        Modifica
                    </button>
                </a>
            </div> 
        </div>

        <div class="image-modify col-6 d-none d-md-flex justify-content-center align-items-center">
            {{-- Image wrapper plate image --}}
            <figure class="image_business figure rounded overflow-hidden">
                <img class="img-thumbnail" src="{{$plate->image ? asset('storage/'.$plate->image) : asset('img/placeholder_plate.png')}}" alt="palte">
            </figure>
        </div>

    </div>

        
    @endsection

    @else

        @section('metaTitle', '403 ACCESSO NEGATO')

        @section('content')
            <section class="not_found fw-bold d-flex align-items-center justify-content-center flex-column text-center">
                <figure class="logo_alert">
                    <img src="{{asset('img/alert.png')}}" alt="">
                </figure>
                <h2 class="fs-2">403</h2>
                <p class="fs-3 text-uppercase">Accesso negato</p>
            </section>
        @endsection

@endif