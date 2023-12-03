<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function purge()
    {
        DB::table('orders')->truncate();
        return redirect()->route('shop')->with('success', 'Zamówienia zostały usunięte.');
    }
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders', compact('orders'));
    }
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Koszyk jest pusty.');
        }
        $request->validate([
            'imie' => 'required|string|max:255',
            'nazwisko' => 'required|string|max:255',
            'adres' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        $suma = 0;
        foreach ($cart as $coffee) {
            $suma += $coffee['quantity'] * $coffee['cena'];
        }
        $cart = json_encode($cart);
        DB::beginTransaction();
        $order = Order::create([
            'imie' => $request->input('imie'),
            'nazwisko' => $request->input('nazwisko'),
            'adres' => $request->input('adres'),
            'email' => $request->input('email'),
            'produkty' => $cart,
            'suma' => $suma,
        ]);
        if (self::sendEmail($order)) {
            // Wyczyść koszyk po pomyślnym zakupie
            DB::commit();
            $request->session()->forget('cart');
            return redirect()->route('shop')->with('success', 'Zamówienie złożone pomyślnie.');
        } else {
            DB::rollBack();
            return redirect()->route('shop')->with('error', 'Wystąpił błąd podczas składania zamówienia.');
        }
    }
    public function sendEmail($order)
    {
        $status = Mail::send(new OrderConfirmationMail($order));
        return $status;
    }
}
