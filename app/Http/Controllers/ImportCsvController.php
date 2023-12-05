<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use Illuminate\Support\Facades\Validator;

class ImportCsvController extends Controller
{
    public function show()
    {
        return view('import_csv');
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
        return view('import_csv', compact('csv', 'file', 'separator'));
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
            $coffee->img = 'kawa1.jpg';
            $coffee->save();
        }
        return redirect()->route('shop')->with('success', 'Produky dodane do bazy danych.');
    }
}
