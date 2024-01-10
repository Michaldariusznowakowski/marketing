<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        if (Auth::check()) {
            return view('admin.index');
        } else {
            return view('admin.login');
        }
    }

    public function logout(): View
    {
        Auth::logout();
        return view('admin.login');
    }
}
