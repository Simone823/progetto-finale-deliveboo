<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51L8o3jAgtEHU3c7wAOs4DgYaNeTCvDYJWGc7cOX1YJw8eAN4qgG9KpDHUXkG16i2P38TWHtr9Jdzzy0qolycHnbA00uMwa1yLf');

        $amount = 100;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'INR',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.credit-card', compact('intent'));
    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
