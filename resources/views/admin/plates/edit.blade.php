@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO DB | ' . $plate->name)

@section('content')

<div class="container">
    @if ($plate->user_id == Auth::id())    
        <h1>Edit</h1>

        <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- name --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$plate->name) }}" placeholder="Insert plate name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- ingredients --}}
            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" rows="3" placeholder="Enter the ingredients separated by ','">
                    {{ old('ingredients',$plate->ingredients) }}
                </textarea>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- price --}}
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price',$plate->price) }}" placeholder="Insert price in this format: xx.xx">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- visibility --}}
            <div class="form-group">
                <select class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example" name="visibility" id="visibility">
                    <option selected>Open this select menu</option>
                    <option {{old('visibility',$plate->visibility) ? 'selected' : ''}} value="0">Not visible</option>
                    <option {{old('visibility',$plate->visibility) ? 'selected' : ''}} value="1">Visible</option>
                </select>
            </div>
            @error('visibility')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- image --}}
            <div class="form-group">
                <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">
                    <input accept="image/*" placeholder="Immagine Piatto" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $plate->image) }}" autofocus>

                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="container px-0 py-3">
                <button type="submit" class="btn btn-primary px-4">Edit plate</button>
            </div>

        </form>
    @endif
@endsection