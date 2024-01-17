<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function show()
    {
        return view('admin.items', [
            'items' => Coffee::all(),
        ]);
    }
    public function addItem(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|max:255',
            'cena' => 'required|numeric',
            'opis' => 'required|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ilosc' => 'required|numeric',
        ]);
        $coffee = new Coffee();
        $coffee->nazwa = $request->input('nazwa');
        $coffee->cena = $request->input('cena');
        $coffee->opis = $request->input('opis');
        $coffee->ilosc = $request->input('ilosc');
        while (true) {
            $filename = uniqid() . '.' . $request->file('img')->getClientOriginalExtension();
            if (!file_exists(storage_path('public/items/' . $filename))) {
                break;
            }
        }
        $request->file('img')->storeAs('public/items', $filename);
        $coffee->img = 'items/' . $filename;

        $coffee->save();
        return redirect()->route('admin.items')->with('success', 'Produkt dodany do bazy danych.');
    }
    public function deleteItem(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);
        $coffee = Coffee::find($request->input('id'));
        if ($coffee) {
            if (file_exists(storage_path($coffee->img))) {
                if ($coffee->img != 'items/placeholder.png') {
                    unlink(storage_path('public/' . $coffee->img));
                }
            }
            $coffee->delete();
            return redirect()->route('admin.items')->with('success', 'Produkt usunięty z bazy danych.');
        } else {
            return redirect()->route('admin.items')->with('error', 'Produkt nie istnieje.');
        }
    }

    public function updateItem(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'nazwa' => 'required|max:255',
            'cena' => 'required|numeric',
            'opis' => 'required|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ilosc' => 'required|numeric',
        ]);
        $coffee = Coffee::find($request->input('id'));
        if ($coffee) {
            $coffee->nazwa = $request->input('nazwa');
            $coffee->cena = $request->input('cena');
            $coffee->opis = $request->input('opis');
            $coffee->ilosc = $request->input('ilosc');
            if ($request->hasFile('img')) {
                if (file_exists(storage_path('public/' . $coffee->img))) {
                    if ($coffee->img != 'items/placeholder.png')
                        unlink(storage_path('public/' . $coffee->img));
                }
                while (true) {
                    $filename = uniqid() . '.' . $request->file('img')->getClientOriginalExtension();
                    if (!file_exists(storage_path('public/items/' . $filename))) {
                        break;
                    }
                }
                $coffee->img = 'items/' . $filename;
                // store in storage/app/public/items
                $request->file('img')->storeAs('public/items', $filename);
            }
            $coffee->save();
            return redirect()->route('admin.items')->with('success', 'Produkt zaktualizowany.');
        } else {
            return redirect()->route('admin.items')->with('error', 'Produkt nie istnieje.');
        }
    }

    public function showImportForm()
    {
        return view('admin.import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
            'separator' => 'required|in:;,,tab,\t',
        ]);
        $file = $request->file('file') ?? null;
        $separator = $request->input('separator') ?? null;
        $csv = array_map(function ($row) use ($separator) {
            return str_getcsv($row, $separator);
        }, file($file));
        return view('admin.import', compact('csv', 'file', 'separator'));
    }
    public function importWithCols(Request $request)
    {
        $request->validate([
            'csv' => 'required|json',
            'name' => 'required|numeric',
            'price' => 'required|numeric',
            'desc' => 'required|numeric',
        ]);
        $csv = json_decode($request->input('csv'));
        $csv = array_map(function ($row) {
            return (array) $row;
        }, $csv);
        $name = $request->input('name');
        $price = $request->input('price');
        $desc = $request->input('desc');
        for ($i = 1; $i < count($csv); $i++) {
            if (empty($csv[$i][$name]) || empty($csv[$i][$price]) || empty($csv[$i][$desc])) {
                continue;
            }
            $coffee = new Coffee();
            $coffee->nazwa = $csv[$i][$name];
            $coffee->cena = $csv[$i][$price];
            $coffee->opis = $csv[$i][$desc];
            $coffee->ilosc = 0;
            $coffee->img = 'items/placeholder.png';
            $coffee->save();
        }
        return redirect()->route('admin.items')->with('success', 'Produky dodane do bazy danych.');
    }
}
