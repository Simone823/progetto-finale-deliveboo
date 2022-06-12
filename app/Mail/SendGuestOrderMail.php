<?php

namespace App\Mail;

use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGuestOrderMail extends Mailable
{
    use Queueable, SerializesModels;


    // Ordine
    public $order;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $_order, User $_user)
    {
        $this->order = $_order;
        $this->user = $_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Deliveboo Ordine n°'.$this->order->id)->view('mail.guest-order');
    }
}
