<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class DeletedOrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $trackingNumber;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $this->subject('Zamówienie nr ' . $this->order->id . ' zostało anulowane');
        $this->to($this->order->email, $this->order->imie . ' ' . $this->order->nazwisko);
        return $this->view('emails.deleted_order');
    }
}
