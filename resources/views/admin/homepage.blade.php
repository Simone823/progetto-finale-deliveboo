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
            <div>
            </div>


            {{-- TIPOLOGIE --}}
            <div class="pt-3">
                <div class="business_header-wrapper">
                    <h5 class="fw-bold mb-0">Tipo di cucina:</h5>
                </div>

                {{-- lista --}}
                <ul class="list_types list-unstyled d-flex ">
                    @foreach ($user->types as $type)
                        <li class="m-2">
                            {{$type->type_name}}
                        </li>
                    @endforeach
                </ul>
            </div>


            {{-- PLATES --}}
            <div class="business_header-wrapper">
                <h5 class="fw-bold mb-0">Piatti</h5>
            </div>




            <div class="d-flex py-2">
                <div id="homepage_card" class="card me-2 rounded-0" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title fs-3 text">Anagrafica:</h5>
                      <h6 class="card-subtitle mb-2 fw-bold">{{$user->name}}  {{$user->surname}}</h6>
                      <h6 class="card-subtitle mb-2 ">{{$user->email}} </h6>
                      <h6 class="card-subtitle mb-2 fs-6">P.iva: {{$user->p_iva}} </h6>
                    
                        <div class="d-flex justify-center align-center">
                            <h6 class="card-subtitle mb-2 me-2 fw-bold">{{$user->business_city}} </h6>
                            <h6 class="card-subtitle mb-2 ">{{$user->business_cap}} </h6>
                        </div>
                      <h6 class="card-subtitle  ">{{$user->business_address}} </h6>            
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