<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmationMail;
use App\Mail\PaymentConfirmationMail;
use App\Mail\ShipmentConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function adminOrders(Request $request)
    {
        if ($request->input('status') !== null) {
            Request()->validate([
                'status' => 'required|integer',
            ]);
            $order =  Order::where('status', $request->input('status'))->orderBy('created_at', 'desc')->get();
        } else {
            $order = Order::orderBy('created_at', 'desc')->get();
        }
        return view('admin.orders', ['orders' => $order]);
    }
    public function updateOrderStatus(Request $request)
    {
        Request()->validate([
            'id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        if ($request->input('status') < 0 || $request->input('status') > 3) {
            return redirect()->route('admin.orders')->with('error', 'Nieprawidłowy status zamówienia.');
        }
        $order = Order::find($request->input('id'));
        if ($order->status === $request->input('status')) {
            return redirect()->route('admin.orders')->with('error', 'Status zamówienia jest już ustawiony na ' . $request->input('status') . '.');
        }
        if ($request->input('status') < $order->status) {
            return redirect()->route('admin.orders')->with('error', 'Nie można cofnąć statusu zamówienia.');
        }
        if ($request->input('status') === 2) {
            $status = self::sendPaymentConfirmationEmail($order);
            if (!$status) {
                return redirect()->route('admin.orders')->with('error', 'Wystąpił błąd podczas wysyłania wiadomości.');
            }
        }
        if ($request->input('status') === 3) {
            Request()->validate([
                'tracking_number' => 'required|string|max:255',
            ]);
            $status = self::sendShipmentConfirmationEmail($order, $request->input('tracking_number'));
            if (!$status) {
                return redirect()->route('admin.orders')->with('error', 'Wystąpił błąd podczas wysyłania wiadomości.');
            }
        }
        $order->status = $request->input('status');
        $order->save();
        return redirect()->route('admin.orders')->with('success', 'Status zamówienia został zmieniony.');
    }
    public function sendPaymentConfirmationEmail($order)
    {
        $status = Mail::send(new PaymentConfirmationMail($order));
        return $status;
    }
    public function sendShipmentConfirmationEmail($order, $trackingNumber)
    {
        $status = Mail::send(new ShipmentConfirmationMail($order, $trackingNumber));
        return $status;
    }
}
