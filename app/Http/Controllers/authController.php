<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(): \Illuminate\Contracts\View\View
    {
        return view('login');
    }
    public function login(): \Illuminate\Http\RedirectResponse
    {
        $credentials = request()->only('name', 'password');

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'name' => 'Podano nieprawidłowe dane logowania.',
        ]);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
