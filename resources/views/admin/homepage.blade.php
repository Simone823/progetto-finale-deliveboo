@extends('layouts.app')

@section('metaTitle', 'Deliveboo - dashboard')

@section('content')
    {{-- @dd($user->types[0]); --}}

    {{-- Wrapper referenze utente (ristorante) --}}
    <div id="homepage_main" class="wrapper_references_user">
        <div class="container-md">

            {{-- User reference --}}
            <div class="user_reference">
                {{-- Business image --}}
                <figure id="user_image_wrapper" class="user_image">
                    <img id="user_image" src="{{asset('storage/'.$user->business_image)}}" alt="">
                </figure>
                 {{-- User Info --}}
                <div class="d-flex py-2">
                    <div id="homepage_card" class="card me-2 rounded-0" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title fs-3 text">Anagrafica:</h5>
                          <h6 class="card-subtitle mb-2 fw-bold">{{$user->name}}  {{$user->surname}}</h6>
                          <h6 class="card-subtitle mb-2 ">{{$user->email}} </h6>
                          <h6 class="card-subtitle mb-2 fs-6">P.iva: {{$user->p_iva}} </h6>
                          <h6 class="card-subtitle mb-2 ">{{$user->business_name}} </h6>
                            <div class="d-flex justify-center align-center">
                                <h6 class="card-subtitle mb-2 me-2 fw-bold">{{$user->business_city}} </h6>
                                <h6 class="card-subtitle mb-2 ">{{$user->business_cap}} </h6>
                            </div>
                          <h6 class="card-subtitle  ">{{$user->business_address}} </h6>            
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
            </div>

            {{-- Modifica dati utente --}}
            <div class="btn-edit">
                <a href="{{route('admin.user.edit', $user)}}" id="homepage_btn_edit" class="btn btn-primary rounded-pill" >
                    Modifica
                </a>
            </div>

        </div>
    
    </div>

@endsection