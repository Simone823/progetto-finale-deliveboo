@extends('layouts.app')

@section('metaTitle', 'Deliveboo - dashboard')

@section('content')
{{-- @dd($user->types[0]); --}}

{{-- Wrapper referenze utente (ristorante) --}}
<div class="wrapper_references_user container-md align-self-start d-md-flex pt-3 gap-3">
    
        {{-- INFO USER --}}
        <div class="references-info col-12 col-md-6">
            
            {{-- Business image --}}
            <figure id="user_image_wrapper">
                <img class="user_image" src="{{$user->business_image ? asset('storage/'.$user->business_image) : asset('img/placeholder_restaurants.png')}}" alt="user_img">
            </figure>
            
            
            {{-- BUSINESS NAME --}}
            <div class="business_header-wrapper d-flex justify-content-between">
                <h3 class="text-uppercase fw-bold">{{$user->business_name}}</h3>

                {{-- Modifica dati utente --}}
                <a href="{{route('admin.user.edit', $user)}}" class="align-self-end text-decoration-none">
                    <span class="modify-text">
                        <i class="fa-solid fa-pen"></i>
                        Modifica
                    </span>
                </a>
            </div>

            {{-- OTHER INFO --}}
            <div class="card-body">
              <h5 class="card-subtitle fw-bold mb-2">{{$user->name}}  {{$user->surname}}</h5>
              <h5 class="card-subtitle mb-2">{{$user->p_iva}} </h5>
              <h5 class="card-subtitle mb-2">{{$user->email}} </h5>
              <h5 class="card-subtitle mb-2">{{$user->business_address}} </h5>            
                <div class="d-flex align-center">
                    <h5 class="card-subtitle me-2">{{$user->business_city}} </h5>
                    <h5 class="card-subtitle">{{$user->business_cap}} </h5>
                </div>
            </div>


            {{-- TIPOLOGIE --}}
            <div class="pt-3">
                <div class="business_header-wrapper">
                    <h5 class="fw-bold mb-0">Tipo di cucina:</h5>
                </div>

                {{-- lista --}}
                <div class="d-flex justify-content-between gap-2 m-3 flex-wrap">
                    @foreach ($user->types as $type)
                    <h5>
                        {{$type->type_name}}
                    </h5>
                    @endforeach
                </div>
            </div>


            {{-- PLATES --}}
            <div class="business_header-wrapper">
                <h5 class="fw-bold mb-0">Piatti</h5>
            </div>



        </div>


        {{-- STATISTICHE --}}
        <div class="references-statistiche col-12 col-md-6">
            <h1 class="text-center">STATISTICHE</h1>
        </div>





    </div>
    
@endsection