<?php

namespace Database\Seeders;

use App\Models\Coffee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/items');
        Storage::makeDirectory('public/items');
        // Storage::copy('database/seeders/imgs', 'storage/app/public/items');
        File::copyDirectory('database/seeders/imgs', 'storage/app/public/items');

        $coffees = [
            ['img' => 'items/kawa1.jpg', 'nazwa' => 'Kawa Arabica', 'opis' => 'Najwyższej jakości kawa Arabica.', 'cena' => 20, 'ilosc' => 10],
            ['img' => 'items/kawa2.jpg', 'nazwa' => 'Kawa Robusta', 'opis' => 'Intensywna kawa Robusta dla miłośników mocnego smaku.', 'cena' => 40, 'ilosc' => 5],
            ['img' => 'items/kawa3.jpg', 'nazwa' => 'Kawa Świąteczna z Goździkami', 'opis' => 'Specjalna mieszanka z nutą świątecznych goździków.', 'cena' => 25, 'ilosc' => 15],
            ['img' => 'items/kawa4.jpg', 'nazwa' => 'Kawa Waniliowa', 'opis' => 'Delikatna kawa z dodatkiem aromatycznej wanilii.', 'cena' => 30, 'ilosc' => 20],
            ['img' => 'items/kawa5.jpg', 'nazwa' => 'Kawa Cynamonowa', 'opis' => 'Bogata w smaku kawa z subtelnym dodatkiem cynamonu.', 'cena' => 28, 'ilosc' => 25],
            ['img' => 'items/kawa6.jpg', 'nazwa' => 'Kawa Migdałowa', 'opis' => 'Kawa z nutą migdałów, idealna dla miłośników orzechowych smaków.', 'cena' => 32, 'ilosc' => 30],
            ['img' => 'items/kawa7.jpg', 'nazwa' => 'Kawa Karmelowa', 'opis' => 'Kawa z dodatkiem słodkiego karmelu, doskonała na popołudniową przyjemność.', 'cena' => 35, 'ilosc' => 35],
            ['img' => 'items/kawa8.jpg', 'nazwa' => 'Kawa Ziołowa z Lawendą', 'opis' => 'Unikalna kawa z lawendą, idealna do relaksu.', 'cena' => 38, 'ilosc' => 40],
            ['img' => 'items/kawa9.jpg', 'nazwa' => 'Kawa Imbirowa', 'opis' => 'Energetyzująca kawa z dodatkiem imbiru, doskonała na zimowe dni.', 'cena' => 30, 'ilosc' => 45],
            ['img' => 'items/kawa10.jpg', 'nazwa' => 'Kawa z Nutą Pomarańczy', 'opis' => 'Kawa z delikatnym aromatem pomarańczy, idealna na śniadanie.', 'cena' => 28, 'ilosc' => 50],
            ['img' => 'items/kawa11.jpg', 'nazwa' => 'Kawa Miodowa', 'opis' => 'Kawa z dodatkiem naturalnego miodu, delikatnie słodka.', 'cena' => 33, 'ilosc' => 55],
            ['img' => 'items/kawa12.jpg', 'nazwa' => 'Kawa Czekoladowa', 'opis' => 'Bogata w smaku kawa z intensywnym aromatem czekolady.', 'cena' => 35, 'ilosc' => 3],
            ['img' => 'items/kawa13.jpg', 'nazwa' => 'Kawa z Likierem Orzechowym', 'opis' => 'Wykwintna kawa z nutą likieru orzechowego, idealna na wieczór.', 'cena' => 40, 'ilosc' => 2],
            ['img' => 'items/kawa14.jpg', 'nazwa' => 'Kawa Kokosowa', 'opis' => 'Kawa z egzotycznym smakiem kokosa, świetna dla miłośników tropikalnych doznań.', 'cena' => 32, 'ilosc' => 1],
            ['img' => 'items/kawa15.jpg', 'nazwa' => 'Kawa Malinowa', 'opis' => 'Kawa z dodatkiem świeżych malin, idealna na letnie popołudnie.', 'cena' => 30, 'ilosc' => 0],
            ['img' => 'items/kawa16.jpg', 'nazwa' => 'Kawa z Mlecznym Karmelem', 'opis' => 'Kawa z delikatnym smakiem mlecznego karmelu, doskonała z mlekiem.', 'cena' => 36, 'ilosc' => 0],
            ['img' => 'items/kawa17.jpg', 'nazwa' => 'Kawa Eggnog', 'opis' => 'Kawa inspirowana klasycznym eggnogiem, idealna na okres świąteczny.', 'cena' => 38, 'ilosc' => 0],
            ['img' => 'items/kawa18.jpg', 'nazwa' => 'Kawa z Borówkami', 'opis' => 'Kawa z dodatkiem soczystych borówek, doskonała dla miłośników owocowych smaków.', 'cena' => 34, 'ilosc' => 0],
            ['img' => 'items/kawa19.jpg', 'nazwa' => 'Kawa Marchewkowa', 'opis' => 'Kawa z nutą marchewki, doskonała dla miłośników oryginalnych smaków.', 'cena' => 32, 'ilosc' => 0],
            ['img' => 'items/kawa20.jpg', 'nazwa' => 'Kawa z Malagą', 'opis' => 'Kawa z nutą słodkiego wina Malaga, idealna na wieczorne spotkania.', 'cena' => 42, 'ilosc' => 5],
            ['img' => 'items/kawa21.jpg', 'nazwa' => 'Kawa Piernikowa', 'opis' => 'Kawa inspirowana smakiem piernika, doskonała na zimowe dni.', 'cena' => 37, 'ilosc' => 15],
            ['img' => 'items/kawa22.jpg', 'nazwa' => 'Kawa Mango Tango', 'opis' => 'Kawa z tropikalnym smakiem mango, idealna na letnie upały.', 'cena' => 33, 'ilosc' => 25],
            ['img' => 'items/kawa23.jpg', 'nazwa' => 'Kawa z Pralinką', 'opis' => 'Kawa z dodatkiem pralinki, doskonała dla łasuchów.', 'cena' => 39, 'ilosc' => 35],
            ['img' => 'items/kawa24.jpg', 'nazwa' => 'Kawa Red Velvet', 'opis' => 'Kawa z inspiracją smakiem Red Velvet, doskonała na specjalne okazje.', 'cena' => 45, 'ilosc' => 45],
            ['img' => 'items/kawa25.jpg', 'nazwa' => 'Kawa Gruszkowa', 'opis' => 'Kawa z nutą soczystej gruszki, idealna na jesienne wieczory.', 'cena' => 31, 'ilosc' => 55],
            ['img' => 'items/kawa26.jpg', 'nazwa' => 'Kawa Irish Cream', 'opis' => 'Kawa z nutą klasycznego likieru Irish Cream, idealna na wieczór przy kominku.', 'cena' => 40, 'ilosc' => 65],
            ['img' => 'items/kawa27.jpg', 'nazwa' => 'Kawa Mocca', 'opis' => 'Kawa połączona z aromatycznym smakiem czekolady i kawy.', 'cena' => 38, 'ilosc' => 75],
            ['img' => 'items/kawa28.jpg', 'nazwa' => 'Kawa Tiramisu', 'opis' => 'Kawa z nutą klasycznego tiramisu, doskonała dla miłośników deserów.', 'cena' => 42, 'ilosc' => 85],
            ['img' => 'items/kawa29.jpg', 'nazwa' => 'Kawa Pistacjowa', 'opis' => 'Kawa z dodatkiem kremowej pistacji, idealna dla fanów orzechowych smaków.', 'cena' => 36, 'ilosc' => 95],
            ['img' => 'items/kawa30.jpg', 'nazwa' => 'Kawa z Malinowym Syropem', 'opis' => 'Kawa z dodatkiem syropu malinowego, idealna na słodkie chwile.', 'cena' => 35, 'ilosc' => 33],
        ];
        // user
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        foreach ($coffees as $coffee) {
            Coffee::create($coffee);
        }

        User::create([
            'name' => 'administrator',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
