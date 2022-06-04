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
                    <h5 class="fw-bold mb-0">Tipo di cucina</h5>
                </div>

                {{-- lista --}}
                <div class="d-flex justify-content-between gap-2 m-3 mb-4 flex-wrap">
                    @foreach ($user->types as $type)
                    <button class="btn-standard btn-gradient fw-bold">
                        {{$type->type_name}}
                    </button>
                    @endforeach
                </div>
            </div>


            {{-- PLATES --}}
            <div class="plates-wrapper mb-3">
                <div class="business_header-wrapper mb-3">
                    <h5 class="fw-bold mb-0">Ultimi piatti</h5>
                </div>

                {{-- CAROUSEL --}}
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>Some representative placeholder content for the first slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>Some representative placeholder content for the second slide.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/200/300" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>Some representative placeholder content for the third slide.</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>


            </div>



        </div>


        {{-- STATISTICHE --}}
        <div class="references-statistiche col-12 col-md-6">
            <h1 class="text-center">STATISTICHE</h1>
        </div>
    </div>
    
@endsection