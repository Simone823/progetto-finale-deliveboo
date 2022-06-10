@extends('layouts.app')

@section('metaTitle', 'deliveboo - Piatti')

@section('content')

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

                    {{-- Description card body --}}
                    <div class="description card-body pt-2 text-violet fw-bolder d-flex flex-column">
                        
                        <h4 class="card-title fw-bold mb-4">Id dell'ordine: {{ $order->id }}</h4>

                        <div class="card-text flex-grow-1 mt-2 mb-2"> 
                            <p>Effettuato da: {{ $order->guest_name . ' ' . $order->guest_surname }}</p>
                            <p>Il: {{ $order->created_at }}</p>
                            <p class="fs-4">Tot. {{ $order->total_price }}&euro;</p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection