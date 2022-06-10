@extends('layouts.app')

@section('metaTitle', 'deliveboo - Ordini')

@section('content')
    @if(count($orders) < 1 )
        <h2>Non hai ricevuto ordini</h2>
    @else
    {{-- Section plates index--}}
    <div id="section_orders_index" class="wrapper_orders_plate container pt-4 pb-4">
        {{-- Title --}}
        <h3 class="mb-4 text-violet fw-bold fs-3">Elenco ordini ricevuti</h3>
        {{-- Row --}}
        <div class="row gy-5">

            {{-- Foreach plates --}}
            @foreach ($orders as $order)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    {{-- Card --}}
                    <div class="card bkg-white_1 shadow-lg h-100">
                        <div class="order-card-header">
                            <figure class="order_image">
                                <img src="{{asset('img/placeholder_plate.png')}}" alt="default">
                            </figure>
                            <h4 class="card-title order-card-id fw-bold mb-4 text-center">Ordine n°{{ $order->id }}</h4>
                        </div>
                        {{-- Description card body --}}
                        <div class="description card-body pt-2 text-violet fw-bolder d-flex flex-column">

                            <div class="card-text flex-grow-1 mt-2 mb-2"> 
                                <div class="d-flex mt-4 align-items-center">
                                    <span class="fs-6 flex-grow-1">Effettuato da:</span>
                                    <span class="fs-4 text-end">{{ $order->guest_name . ' ' . $order->guest_surname }}</span>
                                </div>

                                <div class="d-flex mb-2 align-items-center">
                                    <span class="fs-6 flex-grow-1">Il:</span>
                                    <span class="order-date">{{ $order->created_at }}</span>
                                </div>

                                @if($order->status == 1)
                                <div class="d-flex mb-2 align-items-center py-2">
                                    <span class="fs-6 flex-grow-1">Stato pagamento:</span>
                                    <span class="fs-4 text-success"><i class="fa-solid fa-check"></i></span>
                                </div>
                                @else
                                <div class="d-flex mb-2 align-items-center py-2">
                                    <span class="fs-6 flex-grow-1">Stato pagamento:</span>
                                    <span class="fs-4 text-danger"><i class="fa-solid fa-xmark"></i></span>
                                </div>
                                @endif
                                <div class="d-flex align-items-center pt-2 tot-order">
                                    <span class="fs-4 flex-grow-1">Tot.</span>
                                    <span class="fs-2">{{ $order->total_price }}&euro;</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Paginate --}}
            <div class="pagination p6 d-flex justify-content-center">
                <ul>
                    @foreach ($orders->links()->elements[0] as $page=>$link)
                        
                    <a href="{{ $link }}" class="{{ $orders->links()->paginator->currentPage() == $page ? 'is-active' : '' }}"><li></li></a>
    
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
@endsection