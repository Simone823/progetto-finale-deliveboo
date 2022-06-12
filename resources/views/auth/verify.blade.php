@extends('layouts.app')

@section('metaTitle', 'Deliveboo | Verifica Email')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {{-- TURN BACK --}}
        <div class="col-11 col-sm-8 pb-3 align-self-end">
            <a href="{{url('/')}}" class="text-reset text-decoration-none">
                <i class="fa-solid fa-arrow-left-long"></i>
                <span class="text-hover-purple">Torna alla homepage</span>
            </a>
        </div>


        <div class="col-11 col-sm-8">
            <div class="card p-2 p-sm-4">
                <h2 class="fw-bold text-center ps-2 pe-2">{{ __('Verifica il tuo indirizzo Email') }}</h2>


                <div class="card-body">
                    
                    <div class="text-center fs-5">
                        {{ __('Prima di procedere, controlla la tua email per un link di verifica.') }}
                    </div>
                    
                    <div class="text-center mb-2 fs-5">
                        {{ __('Se non avete ricevuto l\' e-mail') }}
                    </div>
                    
                    <form class="" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn-standard btn-green_1 w-100">{{ __('Clicca qui per richiederne un altro') }}</button>
                    </form>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
