<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGuestOrderMail extends Mailable
{
    use Queueable, SerializesModels;


    // Ordine
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $_order)
    {
        $this->order = $_order;
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
