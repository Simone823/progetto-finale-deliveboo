@extends('layouts.app')

@section('metaTitle', 'deliveboo - Piatti')

@section('content')
{{-- Section plates index--}}
<div id="section_plates_index" class="wrapper_cards_plate container pt-4 pb-4">

    {{-- Title --}}
    <h3 class="mb-4 text-violet fw-bold fs-3">Elenco piatti: {{$user->business_name}}</h3>

    {{-- Row --}}
    <div class="row gy-5">

        {{-- Foreach plates --}}
        @foreach ($plates as $plate)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                {{-- Card --}}
                <div class="card bkg-white_1 shadow-lg h-100">

                    {{-- Plate image --}}
                    <figure class="plate_image">
                        @if($plate->image == null)
                            <img src="{{asset('img/placeholder_plate.png')}}" alt="default">

                            @else
                                <img src="{{asset('storage/'.$plate->image)}}" alt="img">
                        @endif
                    </figure>

                    {{-- Description card body --}}
                    <div class="description card-body pt-2 text-violet fw-bolder d-flex flex-column">
                        
                        <h4 class="card-title fw-bold mb-4">{{$plate->name}}</h4>

                        <div class="card-text flex-grow-1 mt-2 mb-2">
                            <div class="icon"><i class="fa-solid fa-wheat-awn"></i></div>
                            @php
                                $ingredients = explode(",", $plate->ingredients);
                            @endphp
                           
                           <ul class="pt-2 ms-2">
                            @foreach ($ingredients as $ingredient)
                                <li>
                                    {{ $ingredient }}
                                </li>                                
                            @endforeach
                           </ul>

                        </div>

                        <div class="d-flex gap-1">
                            <h6>Disponibile:</h6>
                            <img class="plate-available {{ $plate->visibility == 1 ? 'd-none' : '' }}" src="{{ asset('img/cross.png') }}" alt="check">
                            <img class="plate-available {{ $plate->visibility == 1 ? '' : 'd-none' }}" src="{{ asset('img/check.png') }}" alt="check">
                        </div>

                    </div>
                    
                    {{-- Buttons --}}
                    <div class="btn_wrapper d-flex flex-wrap gap-2 justify-content-center mb-3">
                        <a class="text-reset btn-standard btn-violet-gray text-decoration-none" href="{{ route('admin.plates.edit', $plate->id) }}"><i class="fa-solid fa-pen"></i></a>
                        <a class="text-reset btn-standard btn-green_1 text-decoration-none" href="{{ route('admin.plates.show', $plate->id) }}">Visualizza</a>
                    </div>


                    <form class="position-absolute form-delete-plate" action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn-plate-delete" type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        {{-- Paginate --}}
        <div class="paginate d-flex justify-content-center">
            {{$plates->links()}}
        </div>
    </div>
</div>

@endsection