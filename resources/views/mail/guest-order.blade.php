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
        <p>Grazie per aver acquistato da: {{$user->business_name}}</p>
        <ul class="list_plates">
            @foreach ($order->plates as $plate)
                <li class="plate">
                    <figure class="plate_image">
                        <img src="{{asset('storage/'.$plate->image)}}" alt="">
                    </figure>

                    <p>{{$plate->name}}</p>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Total price --}}
    <div class="total_price">
        <p>Prezzo totale: {{$order->total_price}}€</p>
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
        margin-top: 30px;
        background-color: #D0EB99;
        color: black;
        text-align: center;
        border-radius: 10px;
        filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.411));
    }

    .logo_deliveboo {
        width: 220px;
        margin: 0 auto;
        margin-bottom: 25px;
        filter: drop-shadow(0 0 8px rgba(0, 0, 0, 0.349));
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

    .order_plate {
        margin: 0 auto;
        margin-bottom: 10px;
    }
    .order_plate > p {
        font-weight: 600;
        margin-bottom: 10px;
    }
    .list_plates {
        list-style: none;
        max-width: max-content;
        margin: 0 auto;
    }



    .plate {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        font-weight: 600;
    }

    .plate:not(:last-child) {
        margin-bottom: 10px;
    }
    .plate_image {
        width: 40px;
        height: 40px;
        border-radius: 3px;
        overflow: hidden;
    }

    .plate_image > img {
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .total_price {
        font-weight: 600;
    }
</style>