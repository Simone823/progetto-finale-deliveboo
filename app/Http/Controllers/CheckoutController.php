<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Mail\SendGuestOrderMail;
use App\User;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {

        // Order
        $order = Order::orderBy('created_at', 'DESC')->first();

        // Total
        $total = $order['total_price'];

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51L8o3jAgtEHU3c7wAOs4DgYaNeTCvDYJWGc7cOX1YJw8eAN4qgG9KpDHUXkG16i2P38TWHtr9Jdzzy0qolycHnbA00uMwa1yLf');

        $amount = $total;
        $amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'EUR',
            'description' => 'Payment From Codehunger',
            'payment_method_types' => ['card'],
        ]);
        $intent = $payment_intent->client_secret;

        return view('checkout.credit-card', compact('intent', 'total'));
    }

    public function afterPayment()
    {

        // Order
        $order = Order::orderBy('created_at', 'DESC')->first();
        
        // Order status
        $order->status = 1;

        // Order save
        $order->save();

        $user = User::where('id', '=', $order->user_id)->first();

        // Send email to guest_email controller send guest order mail
        Mail::to($order->guest_email)->send(new SendGuestOrderMail($order, $user));

        return redirect()->to('/payment/success');
    }
}
