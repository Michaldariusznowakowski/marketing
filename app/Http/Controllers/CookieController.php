<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public static function allow()
    {
        session()->put('cookies', true);
        return \back();
    }
    public static function disallow()
    {
        return redirect()->away('https://google.com');
    }
}
