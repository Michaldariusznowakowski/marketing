<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class ShipmentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $trackingNumber;

    public function __construct(Order $order, string $trackingNumber)
    {
        $this->order = $order;
        $this->$trackingNumber = $trackingNumber;
    }

    public function build()
    {
        $this->subject('Wysłano zamówienie nr ' . $this->order->id);
        $this->to($this->order->email, $this->order->imie . ' ' . $this->order->nazwisko);
        return $this->view('emails.order_confirmation');
    }
}
