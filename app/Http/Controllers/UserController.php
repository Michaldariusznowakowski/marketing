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
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.index');
    }

    public function users(): View
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required|min:3',
            'password2' => 'required|min:3',
        ]);

        if ($request->input('password') === $request->input('password2')) {
            $user = User::find($request->input('id'));
            $user->password = Hash::make($request->input('password'));
            $user->save();
        } else {
            return redirect()->route('admin.users')->with('error', 'Hasła nie są takie same.');
        }

        return redirect()->route('admin.users')->with('success', 'Hasło zostało zmienione.');
    }
    public function deleteUser(Request $request): RedirectResponse
    {
        $user = User::find($request->input('id'));
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Użytkownik został usunięty.');
    }
    public function addUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:3',
            'password2' => 'required|min:3',
            'role' => 'required|in:admin,employee',
        ]);

        if ($request->input('password') === $request->input('password2')) {
            $user = new User();
            $user->name = $request->input('name');
            $user->password = Hash::make($request->input('password'));
            $user->role = $request->input('role');
            $user->save();
        } else {
            return redirect()->route('admin.users')->with('error', 'Hasła nie są takie same.');
        }

        return redirect()->route('admin.users')->with('success', 'Użytkownik został dodany.');
    }
    public function updateRole(Request $request): RedirectResponse
    {
        $request->validate([
            'role' => 'required|in:admin,employee',
            'id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->input('id'));
        if ($user->role === $request->input('role')) {
            return redirect()->route('admin.users')->with('error', 'Nie można zmienić roli na tą samą.');
        }
        if ($user->role == NULL) {
            return redirect()->route('admin.users')->with('error', 'Nieznana rola.');
        }
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Rola została zmieniona.');
    }
}
