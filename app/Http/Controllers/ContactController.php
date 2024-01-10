<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }
    public static function sendEmail(string $email, string $message)
    {
        try {
            Mail::send(new ContactMail($email, $message));
            Mail::send(new ContactConfirmationMail($email));
            return true;
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                ddd($e);
            }
            return false;
        }
    }
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:255',
        ]);
        $email = $request->input('email');
        $message = $request->input('message');
        if (self::sendEmail($email, $message)) {
            return redirect()->route('contact')->with('success', 'Wiadomość wysłana pomyślnie.');
        } else {
            return redirect()->route('contact')->with('error', 'Wystąpił błąd podczas wysyłania wiadomości.');
        }
    }
}
