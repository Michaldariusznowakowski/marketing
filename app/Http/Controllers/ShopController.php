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

    public function showProduct($coffeeId)
    {
        $coffee = Coffee::find($coffeeId);

        $coffees = Coffee::all();
        $randomCoffees = $coffees->count() > 3 ? $coffees->random(3) : $coffees;

        return view('product', compact('coffee', 'randomCoffees'));
    }
}
