<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\RatingController;

class CartController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        $totalQuantity = 0;
        if (!empty($cart)) {
            foreach ($cart as $coffee) {
                $totalPrice += $coffee['ilosc'] * $coffee['cena'];
                $totalQuantity += $coffee['ilosc'];
            }
        }

        return view('cart', compact('cart', 'totalPrice', 'totalQuantity'));
    }
    public function purge()
    {
        DB::table('orders')->truncate();
        return redirect()->route('shop')->with('success', 'Zamówienia zostały usunięte.');
    }
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Koszyk jest pusty.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $suma = 0;
        foreach ($cart as $coffee) {
            $suma += $coffee['ilosc'] * $coffee['cena'];
        }
        $cart = json_encode($cart);
        DB::beginTransaction();
        $token = (new RatingController)->generateUniqueAccessToken();
        $order = Order::create([
            'imie' => $request->input('name'),
            'nazwisko' => $request->input('surname'),
            'adres' => $request->input('address'),
            'email' => $request->input('email'),
            'produkty' => $cart,
            'suma' => $suma,
            'unique_order_access_key' => $token,
        ]);
        if (self::sendEmail($order, $token)) {
            // Wyczyść koszyk po pomyślnym zakupie
            DB::commit();
            $request->session()->forget('cart');
            return redirect()->route('shop')->with('success', 'Zamówienie złożone pomyślnie.');
        } else {
            DB::rollBack();
            return redirect()->route('cart')->with('error', 'Wystąpił błąd podczas składania zamówienia.');
        }
    }
    public function addToCart(Request $request, $coffeeId)
    {
        $coffee = Coffee::find($coffeeId);

        if (!$coffee) {
            return redirect()->route('shop')->with('error', 'Produkt nie istnieje.');
        }

        $urlPattern = '/shop\/[0-9]+/';
        $currentUrl = url()->previous();

        $cart = $request->session()->get('cart', []);
        // Jeśli produkt istnieje w koszyku, zwiększ jego ilość
        if (isset($cart[$coffee->id])) {
            $cart[$coffee->id]['ilosc']++;
            $request->session()->put('cart', $cart);

            if (preg_match($urlPattern, $currentUrl)) {
                return redirect()->route('product', ['coffeeId' => $coffee->id])->with('success', 'Produkt dodany do koszyka.');
            } else {
                return redirect()->route('shop')->with('success', 'Produkt dodany do koszyka.');
            }
        }
        // Dodaj produkt do koszyka
        $cart[$coffee->id] = [
            'id' => $coffee->id,
            'nazwa' => $coffee->nazwa,
            'opis' => $coffee->opis,
            'img' => $coffee->img,
            'cena' => $coffee->cena,
            'ilosc' => 1,
        ];

        $request->session()->put('cart', $cart);

        if (preg_match($urlPattern, $currentUrl)) {
            return redirect()->route('product', ['coffeeId' => $coffee->id])->with('success', 'Produkt dodany do koszyka.');
        } else {
            return redirect()->route('shop')->with('success', 'Produkt dodany do koszyka.');
        }
    }
    public function increment(Request $request, $coffeeId)
    {
        $coffee = Coffee::find($coffeeId);

        if (!$coffee) {
            return redirect()->route('shop')->with('error', 'Produkt nie istnieje.');
        }

        $cart = $request->session()->get('cart', []);
        // Jeśli produkt istnieje w koszyku, zwiększ jego ilość
        if (isset($cart[$coffee->id])) {
            $cart[$coffee->id]['ilosc']++;
            $request->session()->put('cart', $cart);

            return redirect()->route('cart');
        }
    }
    public function decrement(Request $request, $coffeeId)
    {
        $coffee = Coffee::find($coffeeId);

        if (!$coffee) {
            return redirect()->route('shop')->with('error', 'Produkt nie istnieje.');
        }

        $cart = $request->session()->get('cart', []);
        // Jeśli produkt istnieje w koszyku, zmniejsz jego ilość jeśli jest większa od 1 lub usuń jeśli jest równa 1
        if (isset($cart[$coffee->id])) {
            if ($cart[$coffee->id]['ilosc'] > 1) {
                $cart[$coffee->id]['ilosc']--;
                $request->session()->put('cart', $cart);
            } else {
                unset($cart[$coffee->id]);
                $request->session()->put('cart', $cart);
            }

            return redirect()->route('cart');
        }
    }
    public function removeFromCart(Request $request, $coffeeId)
    {
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$coffeeId])) {
            unset($cart[$coffeeId]);
            $request->session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Produkt usunięty z koszyka.');
    }
    public function sendEmail($order, $token)
    {
        $status = Mail::send(new OrderConfirmationMail($order, $token));
        return $status;
    }
    public function showOrders()
    {
        $orders = Order::all();
        return view('orders', compact('orders'));
    }
}
