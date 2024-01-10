<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_address;
    public $message_form;

    public function __construct(string $email, string $message)
    {
        $this->email_address = $email;
        $this->message_form = $message;
    }

    public function build()
    {
        $this->subject('Zapytanie od klienta, ' . $this->email_address);
        $this->to(env('MAIL_FROM_ADDRESS'), "Formularz kontaktowy");
        return $this->view('emails.contact_form', [
            'email' => $this->email_address,
            'message_form' => $this->message_form,
        ]);
    }
}
