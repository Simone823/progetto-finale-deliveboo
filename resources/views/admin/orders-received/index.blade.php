@extends('layouts.app')

@section('metaTitle', 'deliveboo - Ordini')

@section('content')
    @if(count($orders) < 1 )
        <h2>Non hai ricevuto ordini</h2>
    @else
    {{-- Section plates index--}}
    <div id="section_plates_index" class="wrapper_cards_plate container pt-4 pb-4">
        {{-- Title --}}
        <h3 class="mb-4 text-violet fw-bold fs-3">Elenco ordini ricevuti</h3>
        {{-- Row --}}
        <div class="row gy-5">

            {{-- Foreach plates --}}
            @foreach ($orders as $order)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    {{-- Card --}}
                    <div class="card bkg-white_1 shadow-lg h-100">
                        <figure class="plate_image">
                            <img src="{{asset('img/placeholder_plate.png')}}" alt="default">
                        </figure>
                        {{-- Description card body --}}
                        <div class="description card-body pt-2 text-violet fw-bolder d-flex flex-column">
                            
                            <h4 class="card-title fw-bold mb-4">Ordine n°{{ $order->id }}</h4>

                            <div class="card-text flex-grow-1 mt-2 mb-2"> 
                                <div class="d-flex mt-4 fs-5 align-items-center">
                                    <span class="flex-grow-1">Effettuato da:</span>
                                    <span class="fs-6"><span class="fs-6">{{ $order->guest_name . ' ' . $order->guest_surname }}</span>
                                </div>

                                <div class="d-flex fs-5 mb-2 align-items-center">
                                    <span class="flex-grow-1">Il</span>
                                    <span class="fs-6">{{ $order->created_at }}</span>
                                </div>

                                <div class="d-flex fs-4 align-items-center">
                                    <span class="flex-grow-1">Tot.</span>
                                    <span>{{ $order->total_price }}&euro;</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection