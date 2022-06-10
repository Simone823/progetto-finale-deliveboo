@extends('layouts.app')

@section('metaTitle', 'deliveboo - Piatti')

@section('content')
    {{-- <h1>qui andranno gli ordini ricevuti</h1> --}}
    {{-- @dd($orders) --}}
    <div>
        @foreach ($orders as $order)
            <p>Id dell'ordine: {{ $order->id }}</p>
            <p>Effettuato da: {{ $order->guest_name . ' ' . $order->guest_surname }}</p>
        @endforeach
    </div>
@endsection