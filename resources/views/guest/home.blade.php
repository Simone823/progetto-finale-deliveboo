<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/front.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Deliveboo</title>
</head>
<body>
            
   

    {{-- faccio il div con l'id per Vue --}}
    <div id="root"></div>

    {{-- controllo che l'utente sia loggato --}}
    @if (Auth::check())
        <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
    @else
        <script>window.authUser=null;</script>
    @endif
    
    {{-- collego il file js --}}
    <script src="{{ asset('js/front.js') }}"></script>

    <script>
        var button = document.querySelector("#submit-button"); braintree.dropin.create({ authorization: {{ \Braintree\ClientToken::generate() }} container: "#dropin-container" } function (createErr, instance) { button.addEventListener("click", function () { instance.requestPaymentMethod(function (err, payload) { $.get("{{ route("payment.make") }}", {payload}, function (response) { if (response.success) { alert("Payment successfull!"); } else {
        alert("Payment failed"); } }, "json"); }); }); });


    </script>


    <footer>
        @extends('layouts.footer')
    </footer> 
</body>
</html>