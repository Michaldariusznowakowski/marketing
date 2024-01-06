<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function build()
    {
        $this->subject('Potwierdzenie otrzymania wiadomości');
        $this->to($this->email, "Formularz kontaktowy");
        return $this->view('emails.contact_confirmation_form', [
            'email' => $this->email,
        ]);
    }
}
