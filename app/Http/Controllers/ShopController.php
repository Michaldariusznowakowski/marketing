<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;

class ShopController extends Controller
{
    public function show()
    {
        $coffees = Coffee::all();

        return view('shop', compact('coffees'));
    }
}
