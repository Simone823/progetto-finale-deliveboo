@extends('layouts.app')

@section('metaTitle', 'Plates')

@section('content')

<div class="container">
    {{-- faccio una tabella per la gestione dei piatti del ristoratore --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Plate id</th>
                <th scope="col">Plate name</th>
                <th scope="col">Slug</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Visibility</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plates as $plate)
                <tr>
                    <th scope="row">{{ $plate->id }}</th>
                    <td>{{ $plate->name }}</td>
                    <td>{{ $plate->slug }}</td>
                    <td>{{ $plate->ingredients }}</td>
                    <td>{{ $plate->price }}</td>
                    <td>{{ $plate->image }}</td>
                    <td>{{ $plate->visibility }}</td>
                </tr>
            @endforeach
        </tbody>
  </table>
</div>

@endsection