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
                <img class="user_image" src="{{asset('storage/'.$user->business_image)}}" alt="user_img">
            </figure>
            
            
            {{-- BUSINESS NAME --}}
            <div class="business_name-wrapper d-flex justify-content-between">
                <h3 class="fw-bold">{{$user->business_name}}</h3>

                {{-- Modifica dati utente --}}
                <a href="{{route('admin.user.edit', $user)}}" class="align-self-end">
                    <i class="fa-solid fa-pen"></i>
                    Modifica
                </a>
            </div>





            <div class="d-flex py-2">
                <div id="homepage_card" class="card me-2 rounded-0" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title fs-3 text">Anagrafica:</h5>
                      <h6 class="card-subtitle mb-2 fw-bold">{{$user->name}}  {{$user->surname}}</h6>
                      <h6 class="card-subtitle mb-2 ">{{$user->email}} </h6>
                      <h6 class="card-subtitle mb-2 fs-6">P.iva: IT{{$user->p_iva}} </h6>
                    
                        <div class="d-flex justify-center align-center">
                            <h6 class="card-subtitle mb-2 me-2 fw-bold">{{$user->business_city}} </h6>
                            <h6 class="card-subtitle mb-2 ">{{$user->business_cap}} </h6>
                        </div>
                      <h6 class="card-subtitle  ">{{$user->business_address}} </h6>            
                    </div>
                </div>
            </div>



            {{-- User Info --}}
            <div id="homepage_card" class="card me-2 rounded-0" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title fs-3 text">Tipologie Ristorante:</h5>
                    <div class="card-subtitle mb-2 fw-bold">
                    <ul class="list_types list-unstyled d-flex ">
                        @foreach ($user->types as $type)
                            <li id="homepage_user_type" class="type_name rounded-pill p-1 me-2 fs-6">{{$type->type_name}}</li>
                        @endforeach
                    </ul>
                    </div> 
                </div>
            </div>


        </div>


        {{-- STATISTICHE --}}
        <div class="references-statistiche col-12 col-md-6">
            <h1 class="text-center">STATISTICHE</h1>
        </div>

    </div>
    
@endsection