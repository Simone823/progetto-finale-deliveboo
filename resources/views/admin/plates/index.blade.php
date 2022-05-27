@extends('layouts.app')

@section('metaTitle', 'Plates')

@section('content')

<div class="container">
    <h3>Elenco dei piatti del ristorante: {{$user->business_name}}</h3>
    {{-- faccio una tabella per la gestione dei piatti del ristoratore --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Plate id</th>
                <th scope="col">Plate name</th>
                <th scope="col">Slug</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Visibility</th>
                <th scope="col">View plate</th>
                <th scope="col">Edit plate</th>
                <th scope="col">Delete plate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plates as $plate)
                <tr>
                    <th scope="row">{{ $plate->id }}</th>
                    <td>{{ $plate->name }}</td>
                    <td>{{ $plate->slug }}</td>
                    <td>{{ $plate->ingredients }}</td>
                    <td>{{ $plate->price }}&euro;</td>
                    <td>{{ $plate->image }}</td>
                    <td>{{ $plate->visibility }}</td>
                    <td><a class="btn btn-primary" href="{{ route('admin.plates.show', $plate->id) }}">view</a></td>
                    <td><a class="btn btn-warning" href="{{ route('admin.plates.edit', $plate->id) }}">edit</a></td>
                    <td>
                        <form onsubmit="return confirm('Sei sicuro di voler eliminare ({{$plate->name}}) dal tuo database?')" action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            
                            <button class="btn btn-danger" type="submit">
                                delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container py-3">
        <form>
            <a href="{{ route('admin.plates.create') }}">
                <input type="button" class="btn btn-primary" value="Create a new plate">
            </a>
        </form>
    </div>
</div>

@endsection