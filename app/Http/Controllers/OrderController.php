<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmationMail;
use App\Mail\DeletedOrderConfirmationMail;
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
        $order = Order::find($request->input('id'));
        if ($request->input('status') < $order->status) {
            return redirect()->route('admin.orders')->with('error', 'Nie można cofnąć statusu zamówienia.');
        }
        if ($request->input('status') == 1) {
            $status = self::sendPaymentConfirmationEmail($order);
            if (!$status) {
                return redirect()->route('admin.orders')->with('error', 'Wystąpił błąd podczas wysyłania wiadomości.');
            }
        } elseif ($request->input('status') == 2) {
            Request()->validate([
                'tracking_number' => 'required|string|max:255',
            ]);
            $token = $order->unique_order_access_key;
            $status = self::sendShipmentConfirmationEmail($order, $request->input('tracking_number'), $token);
            if (!$status) {
                return redirect()->route('admin.orders')->with('error', 'Wystąpił błąd podczas wysyłania wiadomości.');
            }
        } elseif ($request->input('status') == 3) {
            $status = self::sendDeletedOrderEmail($order);
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
    public function sendShipmentConfirmationEmail($order, $trackingNumber, $token)
    {
        $status = Mail::send(new ShipmentConfirmationMail($order, $trackingNumber, $token));
        return $status;
    }
    public function sendDeletedOrderEmail($order)
    {
        $status = Mail::send(new DeletedOrderConfirmationMail($order));
        return $status;
    }
}
