@extends('layouts.app')

@section('metaTitle', 'Create new plate')

@section('content')
<div class="container py-4">
    <h1>Add a new plate</h1>
</div>

<div class="container">
    <form action="{{ route('admin.plates.store') }}" method="POST">
        @csrf
        {{-- name --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Insert plate name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- ingredients --}}
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea type="text" class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" id="ingredients" rows="3" placeholder="Enter the ingredients separated by ','">
                {{ old('ingredients') }}
            </textarea>
            @error('ingredients')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- price --}}
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Insert price in this format: xx.xx">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- visibility --}}
        <div class="form-group">
            <select class="form-select @error('visibility') is-invalid @enderror" aria-label="Default select example" name="visibility" id="visibility">
                <option selected>Open this select menu</option>
                <option {{ old('visibility') == '0' ? 'selected' : '' }} value="0">Not visible</option>
                <option {{ old('visibility') == '1' ? 'selected' : '' }} value="1">Visible</option>
            </select>
            @error('visibility')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- image --}}
        <div class="form-group">
            <label for="image" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input placeholder="Immagine Ristorante" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="business_image" autofocus>

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="container px-0 py-3">
            <button type="submit" class="btn btn-primary px-4">Create plate</button>
        </div>

    </form>
@endsection