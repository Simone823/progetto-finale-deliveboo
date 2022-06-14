<!DOCTYPE html>
<html lang="en">
<head>
    <title>Deliveboo - Pagamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
</head>
<body>
    @php
    $stripe_key = 'pk_test_51L8o3jAgtEHU3c7wR29MLZ7iOgbKxmU9K2zrDNxiOPXlcU80qyEzHQRBzdvBb4OHDwZgeFhY5YVhIBakhgwKhPS900hABDCJ8U';

    @endphp

    <main class="d-flex justify-content-center align-items-center">

        <div class="main-background"></div>
        <div class="container" style="margin-top:10%;margin-bottom:10%">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-8">
                    <div class="fw-bolder mb-3">
                        <h5>Totale da pagare: {{$total}}€</h5>
                    </div>
                    <div class="card p-2 p-sm-4">
                        <form action="{{route('checkout.credit-card')}}" method="post" id="payment-form">
                            @csrf
                            <div class="form-group">
                                <div class="fw-bold text-center ps-2 pe-2">
                                    <label for="card-element" class="fs-4">
                                        Inserisci i dati della tua carta di credito
                                    </label>
                                </div>
                                <div class="card-footer border-0">
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                    <input type="hidden" name="plan" value="" />
                                </div>
                            </div>
                            <div class="button">
                                <button id="card-button" class="btn-standard btn-green_1 w-100" type="submit" data-secret="{{ $intent }}">Paga</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d'
                , lineHeight: '18px'
                , fontFamily: '"", Helvetica, sans-serif'
                , fontSmoothing: 'antialiased'
                , fontSize: '16px'
                , '::placeholder': {
                    color: '#aab7c4'
                }
            }
            , invalid: {
                color: '#fa755a'
                , iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', {
            locale: 'en'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.handleCardPayment(clientSecret, cardElement, {
                    payment_method_data: {
                        //billing_details: { name: cardHolderName.value }
                    }
                })
                .then(function(result) {
                    console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log(result);
                        form.submit();
                    }
                });
        });

    </script>


    <style>

        main {
            height: 100vh;
        }
        .main-background{
            position: absolute;
            right: 0;
            left: -20%;
            height: 100%;
            top: 0;
            z-index: -999;
            background-image: url('img/bg_users.svg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

    </style>
</body>
</html>
