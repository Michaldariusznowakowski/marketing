<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\String\b;

class UserController extends Controller
{
    public function login(Request $request): View|RedirectResponse
    {
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required|min:3',
        ]);

        $user = User::where('name', $request->input('login'))->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.index')->withErrors(['login' => 'Błędne dane logowania']);
        }

        return view('admin.login');
    }
    public function logout(): View
    {
        Auth::logout();
        return view('admin.index');
    }
}
