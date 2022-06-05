@if ($plate->user_id == Auth::id())
    @extends('layouts.app')

    @section('metaTitle', 'DELIVEBOO DB | ' . $plate->name)

    @section('content')

    <div id="section_plate_edit" class="container py-5 px-3 text-violet">

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2 class="fw-bold">Modifica {{$plate->name}}</h2>
            </div>

            <div class="card col-12 col-md-8 fw-bolder bkg-white_1 shadow-lg">
                <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Image wrapper plate image --}}
                    <div class="wrapper_image d-flex justify-content-center px-3">
                        <figure class="plate_image shadow-lg">
                            @if($plate->image == null)
                            <img src="{{asset('img/placeholder_plate.png')}}" alt="">

                            @else
                            <img src="{{asset('storage/'.$plate->image)}}" alt="">
                            @endif
                        </figure>
                    </div>

                    {{-- Card body --}}
                    <div class="card-body col-12 col-md-10 mx-auto">
                        {{-- name --}}
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="name">Nome Piatto</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$plate->name) }}" placeholder="Insert plate name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- ingredients --}}
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label class="col-form-label fs-5" for="ingredients">Ingredienti / Descrizione</label>
                            <textarea type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" placeholder="Enter the ingredients separated by ','">
                            {{old('ingredients',$plate->ingredients) }}
                            </textarea>
                            @error('ingredients')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- price --}}
                        <div class="form-group d-flex align-items-center flex-column mb-3 w-50 mx-auto">
                            <label class="col-form-label fs-5" for="price">Prezzo</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price',$plate->price) }}" placeholder="Formato prezzo: XX.XX">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- visibility --}}
                        <div class="form-group d-flex align-items-center flex-column mb-3 w-75 mx-auto">
                            <label class="col-form-label fs-5" for="visibility">Visibilità</label>
                            <select class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example" name="visibility" id="visibility">
                                <option {{old('visibility',$plate->visibility) ? 'selected' : ''}} value="0">Non Visibile</option>
                                <option {{old('visibility',$plate->visibility) ? 'selected' : ''}} value="1">Visibile</option>
                            </select>
                            @error('visibility')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- image --}}
                        <div class="form-group d-flex align-items-center flex-column mb-3">
                            <label for="image" class="col-form-label fs-5">Immagine</label>
                            <div class="col-md-6">
                                <input accept="image/*" placeholder="Immagine Piatto" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $plate->image) }}" autofocus>

                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="buttons d-flex flex-wrap gap-4 justify-content-center align-items-center">
                        <button type="submit" class="btn btn-green_1 btn-hover-violet px-4">Modifica Piatto</button>
                    </div>


                </form>
            </div>

        </div>
    </div>
    @endsection

    @else

        @section('metaTitle', '404 NOT FOUND')

        @section('content')
            <section class="not_found fw-bold d-flex align-items-center justify-content-center flex-column">
                <h2 class="fs-2">404</h2>
                <p class="fs-3 text-uppercase">PAGE NOT FOUND</p>
            </section>
        @endsection
@endif 