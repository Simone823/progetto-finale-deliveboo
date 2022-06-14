@if ($plate->user_id == Auth::id())
    @extends('layouts.app')

    @section('metaTitle', 'Deliveboo - ' . $plate->name)

    @section('content')


    {{-- vecchio --}}

    <div class="register-wrapper modify-wrapper container-md pt-4 d-flex">

        <div class="col-10 col-sm-8 col-md-6 m-auto m-md-0">

            {{-- TURN BACK --}}
            <div class="pb-3 align-self-end">
                <a href="{{route('admin.plates.index')}}" class="text-reset text-decoration-none">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    <span class="text-hover-purple">Torna alla lista dei piatti</span>
                </a>
            </div>
            
            <h1 class="fw-bold mb-4">{{$plate->name}}</h1>

            {{--Image wrapper plate image --}}
            <div class="wrapper_image d-flex justify-content-center d-md-none">
                <figure class="image_business figure rounded overflow-hidden">
                    <img class="img-thumbnail" src="{{$plate->image ? asset('storage/'.$plate->image) : asset('img/placeholder_plate.png')}}" alt="plate">
                </figure>
            </div>

            <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                {{-- image input --}}
                <div class="form-group mb-4">
                    <h6 class="fw-bold">Immagine del piatto</h6>
                    
                    <div class="col-lg-8">
                        <input accept="image/*" placeholder="Immagine Piatto" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $plate->image) }}">

                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                

                {{-- plate name --}}
                <div class="form w-100 mb-3">
                    <input required
                    placeholder=" " id="name" type="text"
                    class="form__input @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name',$plate->name) }}">

                    <label for="name" class="form__label">Nome del piatto</label>
                    
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>




                {{-- IGREDIENTI --}}
                <div class="form form-area w-100 mb-3">

                    <textarea placeholder="Inserisci gli ingredienti separandoli con una virgola" id="ingredients" type="text" class="form__input @error('ingredients') is-invalid @enderror" rows="3" required
                    name="ingredients">{{old('ingredients',$plate->ingredients) }}</textarea>

                    <label for="ingredients" class="form__label form-area__label">Ingredienti</label>
                    
                    @error('ingredients')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                {{-- Prezzo --}}
                <div class="form w-100 mb-3">
                    <input required placeholder=" "
                    id="price" type=number step=0.01 min="0.20" class="form__input
                    @error('price') is-invalid @enderror"
                    name="price" value="{{ old('price', $plate->price) }}">

                    <label for="price" class="form__label">Prezzo</label>
                    
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                {{-- visibile --}}
                <div class="form-group mb-3">
                    <h6 class="fw-bold">Disponibile</h6>          

                    <div class="radio-visibility @error('visibility') is-invalid @enderror">
                        <input class="radio-yes" label="Si" type="radio" id="si" name="visibility" value="1" {{old('visibility', $plate->visibility  == 1) ? 'checked' : ''}}>
                        <input class="radio-no" label="No" type="radio" id="no" name="visibility" value="0" {{old('visibility', $plate->visibility == 0) ? 'checked' : ''}} >
                    </div>

                    @error('visibility')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- Button --}}
                <div class="form-group mb-0 pb-5">
                    <button type="submit" class="btn-standard btn-green_1">
                        Modifica piatto
                    </button>
                </div> 

            </form>
        </div>

        <div class="image-modify col-6 d-none d-md-flex justify-content-center align-items-center">
            {{-- Image wrapper plate image --}}
            <figure class="image_business figure rounded overflow-hidden">
                <img class="img-thumbnail" src="{{$plate->image ? asset('storage/'.$plate->image) : asset('img/placeholder_plate.png')}}" alt="palte">
            </figure>
        </div>

    </div>










    
    @endsection

    @else

        @section('metaTitle', '403 ACCESSO NEGATO')

        @section('content')
        <section class="not_found fw-bold d-flex align-items-center justify-content-center flex-column text-center">
            <figure class="logo_alert">
                <img src="{{asset('img/alert.png')}}" alt="">
            </figure>
            <h2 class="fs-2">403</h2>
            <p class="fs-3 text-uppercase">Accesso negato</p>
        </section>
        @endsection

@endif 