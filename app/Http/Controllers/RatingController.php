<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Ramsey\Uuid\Type\Integer;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function show()
    {
        $ratings = DB::table('ratings')->simplePaginate(10);
        $ratings_with_order_data = [];
        foreach ($ratings as $rating) {
            $order = Order::find($rating->order_id);
            $ratings_with_order_data[] = [
                'id' => $rating->id,
                'imie' => $order->imie,
                'produkty' => json_decode($order->produkty),
                'rating' => $rating->rating,
                'comment' => $rating->comment,
            ];
        }
        return view('ratings.ratings', compact('ratings_with_order_data'));
    }
    public function adminShow()
    {
        $ratings = Rating::all();
        $ratings_with_order_data = [];
        foreach ($ratings as $rating) {
            $order = Order::find($rating->order_id);
            $ratings_with_order_data[] = [
                'id' => $rating->id,
                'imie' => $order->imie,
                'produkty' => json_decode($order->produkty),
                'rating' => $rating->rating,
                'comment' => $rating->comment,
            ];
        }
        return view('admin.ratings', compact('ratings_with_order_data'));
    }
    // get unique_access_token from get request
    public function showForm($unique_access_token)
    {
        $token = $unique_access_token;
        $order = Order::where('unique_order_access_key', $token)->first();
        if (!$order) {
            return redirect()->route('ratings')->with('error', 'Nie znaleziono zamówienia.');
        }
        return view('ratings.ratings_form', compact('token'));
    }
    public function generateUniqueAccessToken()
    {
        $orders = Order::all();
        $max = 0;
        while (true) {
            $unique_access_token = bin2hex(random_bytes(32));
            $found = false;
            foreach ($orders as $order) {
                if ($order->unique_order_access_key == $unique_access_token) {
                    $found = true;
                    break;
                }
            }
            $max++;
            if (!$found) {
                return $unique_access_token;
            }
            if ($max > 1000) {
                throw new \Exception('Cannot generate unique access token.');
            }
        }
    }
    public function create(Request $request)
    {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
            'unique_access_token' => 'required|string|max:255',
        ]);


        $order = Order::where('unique_order_access_key', $request->input('unique_access_token'))->first();
        if (!$order) {
            return redirect()->route('ratings')->with('error', 'Nie znaleziono zamówienia.');
        }

        $rating = Rating::where('order_id', $order->id)->first();
        if ($rating) {
            return redirect()->route('ratings')->with('error', 'Komentarz do tego zamówienia już istnieje.');
        }

        $rating = Rating::create([
            'order_id' => $order->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('ratings')->with('success', 'Komentarz został dodany.');
    }
    public function delete($id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('ratings')->with('error', 'Nie masz uprawnień do wykonania tej akcji.');
        }
        $rating = Rating::find($id);
        if (!$rating) {
            return redirect()->route('ratings')->with('error', 'Nie znaleziono komentarza.');
        }
        $rating->delete();
        return redirect()->route('ratings')->with('success', 'Komentarz został usunięty.');
    }

    public function purge()
    {
        if (auth()->user()->role != 'admin') {
            return redirect()->route('ratings')->with('error', 'Nie masz uprawnień do wykonania tej akcji.');
        }
        Rating::truncate();
        return redirect()->route('ratings')->with('success', 'Komentarze zostały usunięte.');
    }
}
