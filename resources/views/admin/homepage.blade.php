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
      <div class="business_header-wrapper d-flex justify-content-between align-items-center">
        <h3 class="text-uppercase fw-bold">{{$user->business_name}}</h3>

        {{-- Modifica dati utente --}}
        <a href="{{route('admin.user.edit', $user)}}" class="align-self-end animated-button1 text-reset">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <i class="fa-solid fa-pen"></i>
        </a>

        </div>

        {{-- OTHER INFO --}}
        <div class="card-body">              
          <table class="table">
            <tbody>
              <tr>
                <td class="fw-bold">Nome - Cognome</td>
                <td>{{$user->name}}  {{$user->surname}}</td>
              </tr>
              <tr>
                <td class="fw-bold">E-mail</td>
                <td>{{ $user->email }}</td>
              </tr>
              <tr>
                <td class="fw-bold">P.iva</td>
                <td class="text-uppercase">{{$user->p_iva}}</td>
              </tr>
              <tr>
                <td class="fw-bold">Nome ristorante</td>
                <td>{{ $user->business_name }}</td>
              </tr>
              <tr>
                <td class="fw-bold">Città</td>
                <td>{{ $user->business_city }}</td>
              </tr>
              <tr>
                <td class="fw-bold">Indirizzo</td>
                <td>{{ $user->business_address }}</td>
              </tr>
              <tr>
                <td class="fw-bold">CAP</td>
                <td>{{ $user->business_cap }}</td>
              </tr>
            </tbody>
          </table>
        </div>


        {{-- TIPOLOGIE --}}
        <div>
          <div class="business_header-wrapper d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Tipo di cucina</h5>

            {{-- Modifica dati utente --}}
              <a href="{{route('admin.user.edit', $user)}}" class="align-self-end animated-button1 text-reset">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <i class="fa-solid fa-pen"></i>
              </a>
          </div>

          {{-- lista --}}
          <div class="d-flex justify-content-between gap-2 m-3 mb-4 flex-wrap">
            @foreach ($user->types as $type)

            <a href="#" class="animated-button1 text-reset">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              {{$type->type_name}}
            </a>

            @endforeach
          </div>
        </div>


        {{-- PLATES --}}
        <div class="plates-wrapper mb-5 pt-2">
          <div class="business_header-wrapper mb-3 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0">Ultimi piatti</h5>

            @if(count($user->plates) != 0)
            
            {{-- ADD PLATES --}}
            <a href="{{route('admin.plates.create')}}" class="align-self-end animated-button1 text-reset">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <i class="fa-solid fa-pen"></i>
            </a>

            @endif
          </div>

          {{-- CAROUSEL se sono presenti piatti da visualizzare--}}
          @if(count($user->plates) != 0)
          
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">  

              @foreach ($lastPlates->take(5) as $key=>$plate)
                          
              <div class="carousel-item {{ $key == count($lastPlates) - 1 ? 'active' : ''}}">

                <img src="{{asset('storage/'.$plate->image)}}" class="d-block w-100">
                
                <div class="carousel-caption">
                  <h5 class="caption-text">{{ $plate->name }}</h5>
                </div>

              </div>
              @endforeach

            </div>

              {{-- BTN PRE --}}
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>

              {{-- BTN NEXT --}}
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

            @else

            {{-- div se non ci sono piatti --}}
            <div class="no-plates-wrapper d-flex flex-wrap justify-content-center align-items-center">
              <h4 class="col-12 align-self-end fw-bold ps-4 pe-4 text-center">NON SONO PRESENTI PIATTI DA VISUALIZZARE</h4>

              <div class="align-self-start m-2">
                <a href="{{route('admin.plates.create')}}">
                  <button class="btn-standard btn-green_1 fw-bold">
                      Crea nuovo piatto
                  </button>
                </a>

              </div>
            </div>
            @endif
          </div>
      </div>


      {{-- STATISTICHE --}}
      <div class="references-statistiche col-12 col-md-6">
          <h1 class="text-center">STATISTICHE</h1>
      </div>
  </div>
    
@endsection