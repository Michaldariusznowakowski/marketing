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
    public $unique_access_token;

    public function __construct(Order $order, string $trackingNumber, string $unique_access_token)
    {
        $this->order = $order;
        $this->unique_access_token = $unique_access_token;
        $this->trackingNumber = $trackingNumber;
    }

    public function build()
    {
        $this->subject('Wysłano zamówienie nr ' . $this->order->id);
        $this->to($this->order->email, $this->order->imie . ' ' . $this->order->nazwisko);
        return $this->view('emails.shipment_confirmation');
    }
}
