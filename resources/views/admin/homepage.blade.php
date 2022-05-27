@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO DB | DASHBOARD')

@section('content')
    {{-- @dd($user->types[0]); --}}

    {{-- Wrapper referenze utente (ristorante) --}}
    <div class="wrapper_references_user text-center">

        {{-- User reference --}}
        <div class="user_reference">

            {{-- Business image --}}
            <figure class="user_image">
                <img src="" alt="">
            </figure>

            {{-- User name --}}
            <h3 class="user_name">{{$user->name}}  {{$user->surname}}</h3>

            {{-- User email --}}
            <p class="user_email">{{$user->email}}</p>

            {{-- P.Iva --}}
            <p class="p_iva">{{$user->p_iva}}</p>

            {{-- Business name --}}
            <p class="business_name">{{$user->business_name}}</p>

            {{-- Business city --}}
            <p class="business_city">{{$user->business_city}}</p>

            {{-- Business cap --}}
            <p class="business_cap">{{$user->business_cap}}</p>

            {{-- Business address --}}
            <p class="business_address">{{$user->business_address}}</p>
        </div>

        {{-- Types user (restaurant) --}}
        <div class="types_wrapper">
            <h3>Tipologie Ristorante</h3>
            <ul class="list_types list-unstyled">
                @foreach ($user->types as $type)
                    <li class="type_name">{{$type->name}}</li>
                @endforeach
            </ul>
        </div>

        {{-- Modifica dati utente --}}
        <div class="btn-edit">
            <a href="{{route('admin.user.edit', $user)}}" class="btn btn-primary">
                Modifica
            </a>
        </div>
    </div>

@endsection