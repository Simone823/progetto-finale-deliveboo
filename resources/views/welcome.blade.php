@extends('layouts.app')

@section('metaTitle', 'DELIVEBOO')

@section('content')
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="types-wrapper">
            <h3>Elenco delle tipologie dei ristoranti:</h3>
            {{-- stampo nella homepage l'elenco delle tipologie dei ristoranti --}}
            <ul class="types_wrapper d-flex flex-column ">
                @foreach ($types as $type)
                <li>
                    <a href="">{{ $type->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

