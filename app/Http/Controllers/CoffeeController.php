<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;

class CoffeeController extends Controller
{
    public function show()
    {
        $coffees = Coffee::all();
        $cart = session()->get('cart', []);

        return view('shop', compact('coffees', 'cart'));
    }
    public function addToCart(Request $request, $coffeeId)
    {
        $coffee = Coffee::find($coffeeId);

        if (!$coffee) {
            return redirect()->route('shop')->with('error', 'Produkt nie istnieje.');
        }

        $cart = $request->session()->get('cart', []);
        // Jeśli produkt istnieje w koszyku, zwiększ jego ilość
        if (isset($cart[$coffee->id])) {
            $cart[$coffee->id]['quantity']++;
            $request->session()->put('cart', $cart);

            return redirect()->route('shop')->with('success', 'Produkt dodany do koszyka.');
        }
        // Dodaj produkt do koszyka
        $cart[$coffee->id] = [
            'id' => $coffee->id,
            'nazwa' => $coffee->nazwa,
            'opis' => $coffee->opis,
            'img' => $coffee->img,
            'cena' => $coffee->cena,
            'quantity' => 1,
        ];

        $request->session()->put('cart', $cart);

        return redirect()->route('shop')->with('success', 'Produkt dodany do koszyka.');
    }
    public function removeFromCart(Request $request, $coffeeId)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$coffeeId])) {
            unset($cart[$coffeeId]);
            $request->session()->put('cart', $cart);
        }

        return redirect()->route('shop')->with('success', 'Produkt usunięty z koszyka.');
    }
}
