<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/front.css')}}">
    <title>Document</title>
</head>
<body>

    {{-- Container --}}
    <div class="container">

        {{-- Link login register home --}}
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/admin/homepage') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
    
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>
   

    {{-- faccio il div con l'id per Vue --}}
    <div id="root"></div>
    {{-- collego il file js --}}
    <script src="{{ asset('js/front.js') }}"></script>
</body>
</html>