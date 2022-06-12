<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">


<div class="card">

    {{-- Logo deliveboo --}}
    <figure class="logo_deliveboo">
        <img src="{{asset('img/logo_white.svg')}}" alt="">
    </figure>

    {{-- description order --}}
    <div class="description">
        <h1>Ordine N° {{$order->id}}</h1>
        <h3>Effettuato da: {{$order->guest_name}} {{$order->guest_surname}}</h3>
        <p>In data: {{$order->created_at}}</p>
    </div>

    {{-- Order plate --}}
    <div class="order_plate">
        <ul class="list_plates">
            @foreach ($order->plates as $plate)
                <li class="plate">
                    <p>{{$plate->name}}</p>
                    <p>{{$plate->quantity}}</p>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Total price --}}
    <div class="total_price">
        <p>{{$order->total_price}}</p>
    </div>
</div>


<style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }

    img {
        width: 100%;
        display: block;
    }

    .card {
        max-width: 500px;
        margin: 0 auto;
        padding: 15px 10px;
        background-color: #D0EB99;
        color: black;
        text-align: center;
        border-radius: 10px;
    }

    .logo_deliveboo {
        width: 180px;
        margin: 0 auto;
        margin-bottom: 25px;
    }

    .description {
        margin-bottom: 25px;
    }

    .description > h3 {
        margin-bottom: 8px;
    }

    .description > p {
        font-weight: 600;
    }

    .list_plates {
        list-style: none;
    }
</style>