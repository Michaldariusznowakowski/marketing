<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order, string $unique_access_token)
    {
        $this->order = $order;
        $this->order->unique_access_token = $unique_access_token;
    }

    public function build()
    {
        $this->subject('Potwierdzenie zamówienia');
        $this->to($this->order->email, $this->order->imie . ' ' . $this->order->nazwisko);
        return $this->view('emails.order_confirmation');
    }
}
