<?php

namespace Database\Seeders;

use App\Models\Coffee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $coffees = [
            ['img' => 'kawa1.jpg', 'nazwa' => 'Kawa Arabica', 'opis' => 'Najwyższej jakości kawa Arabica.', 'cena' => 20],
            ['img' => 'kawa2.jpg', 'nazwa' => 'Kawa Robusta', 'opis' => 'Intensywna kawa Robusta dla miłośników mocnego smaku.', 'cena' => 40],
            ['img' => 'kawa3.jpg', 'nazwa' => 'Kawa Świąteczna z Goździkami', 'opis' => 'Specjalna mieszanka z nutą świątecznych goździków.', 'cena' => 25],
            ['img' => 'kawa4.jpg', 'nazwa' => 'Kawa Waniliowa', 'opis' => 'Delikatna kawa z dodatkiem aromatycznej wanilii.', 'cena' => 30],
            ['img' => 'kawa5.jpg', 'nazwa' => 'Kawa Cynamonowa', 'opis' => 'Bogata w smaku kawa z subtelnym dodatkiem cynamonu.', 'cena' => 28],
            ['img' => 'kawa6.jpg', 'nazwa' => 'Kawa Migdałowa', 'opis' => 'Kawa z nutą migdałów, idealna dla miłośników orzechowych smaków.', 'cena' => 32],
            ['img' => 'kawa7.jpg', 'nazwa' => 'Kawa Karmelowa', 'opis' => 'Kawa z dodatkiem słodkiego karmelu, doskonała na popołudniową przyjemność.', 'cena' => 35],
            ['img' => 'kawa8.jpg', 'nazwa' => 'Kawa Ziołowa z Lawendą', 'opis' => 'Unikalna kawa z lawendą, idealna do relaksu.', 'cena' => 38],
            ['img' => 'kawa9.jpg', 'nazwa' => 'Kawa Imbirowa', 'opis' => 'Energetyzująca kawa z dodatkiem imbiru, doskonała na zimowe dni.', 'cena' => 30],
            ['img' => 'kawa10.jpg', 'nazwa' => 'Kawa z Nutą Pomarańczy', 'opis' => 'Kawa z delikatnym aromatem pomarańczy, idealna na śniadanie.', 'cena' => 28],
            ['img' => 'kawa11.jpg', 'nazwa' => 'Kawa Miodowa', 'opis' => 'Kawa z dodatkiem naturalnego miodu, delikatnie słodka.', 'cena' => 33],
            ['img' => 'kawa12.jpg', 'nazwa' => 'Kawa Czekoladowa', 'opis' => 'Bogata w smaku kawa z intensywnym aromatem czekolady.', 'cena' => 35],
            ['img' => 'kawa13.jpg', 'nazwa' => 'Kawa z Likierem Orzechowym', 'opis' => 'Wykwintna kawa z nutą likieru orzechowego, idealna na wieczór.', 'cena' => 40],
            ['img' => 'kawa14.jpg', 'nazwa' => 'Kawa Kokosowa', 'opis' => 'Kawa z egzotycznym smakiem kokosa, świetna dla miłośników tropikalnych doznań.', 'cena' => 32],
            ['img' => 'kawa15.jpg', 'nazwa' => 'Kawa Malinowa', 'opis' => 'Kawa z dodatkiem świeżych malin, idealna na letnie popołudnie.', 'cena' => 30],
            ['img' => 'kawa16.jpg', 'nazwa' => 'Kawa z Mlecznym Karmelem', 'opis' => 'Kawa z delikatnym smakiem mlecznego karmelu, doskonała z mlekiem.', 'cena' => 36],
            ['img' => 'kawa17.jpg', 'nazwa' => 'Kawa Eggnog', 'opis' => 'Kawa inspirowana klasycznym eggnogiem, idealna na okres świąteczny.', 'cena' => 38],
            ['img' => 'kawa18.jpg', 'nazwa' => 'Kawa z Borówkami', 'opis' => 'Kawa z dodatkiem soczystych borówek, doskonała dla miłośników owocowych smaków.', 'cena' => 34],
            ['img' => 'kawa19.jpg', 'nazwa' => 'Kawa Marchewkowa', 'opis' => 'Kawa z nutą marchewki, doskonała dla miłośników oryginalnych smaków.', 'cena' => 32],
            ['img' => 'kawa20.jpg', 'nazwa' => 'Kawa z Malagą', 'opis' => 'Kawa z nutą słodkiego wina Malaga, idealna na wieczorne spotkania.', 'cena' => 42],
            ['img' => 'kawa21.jpg', 'nazwa' => 'Kawa Piernikowa', 'opis' => 'Kawa inspirowana smakiem piernika, doskonała na zimowe dni.', 'cena' => 37],
            ['img' => 'kawa22.jpg', 'nazwa' => 'Kawa Mango Tango', 'opis' => 'Kawa z tropikalnym smakiem mango, idealna na letnie upały.', 'cena' => 33],
            ['img' => 'kawa23.jpg', 'nazwa' => 'Kawa z Pralinką', 'opis' => 'Kawa z dodatkiem pralinki, doskonała dla łasuchów.', 'cena' => 39],
            ['img' => 'kawa24.jpg', 'nazwa' => 'Kawa Red Velvet', 'opis' => 'Kawa z inspiracją smakiem Red Velvet, doskonała na specjalne okazje.', 'cena' => 45],
            ['img' => 'kawa25.jpg', 'nazwa' => 'Kawa Gruszkowa', 'opis' => 'Kawa z nutą soczystej gruszki, idealna na jesienne wieczory.', 'cena' => 31],
            ['img' => 'kawa26.jpg', 'nazwa' => 'Kawa Irish Cream', 'opis' => 'Kawa z nutą klasycznego likieru Irish Cream, idealna na wieczór przy kominku.', 'cena' => 40],
            ['img' => 'kawa27.jpg', 'nazwa' => 'Kawa Mocca', 'opis' => 'Kawa połączona z aromatycznym smakiem czekolady i kawy.', 'cena' => 38],
            ['img' => 'kawa28.jpg', 'nazwa' => 'Kawa Tiramisu', 'opis' => 'Kawa z nutą klasycznego tiramisu, doskonała dla miłośników deserów.', 'cena' => 42],
            ['img' => 'kawa29.jpg', 'nazwa' => 'Kawa Pistacjowa', 'opis' => 'Kawa z dodatkiem kremowej pistacji, idealna dla fanów orzechowych smaków.', 'cena' => 36],
            ['img' => 'kawa30.jpg', 'nazwa' => 'Kawa z Malinowym Syropem', 'opis' => 'Kawa z dodatkiem syropu malinowego, idealna na słodkie chwile.', 'cena' => 32],
        ];

        foreach ($coffees as $coffee) {
            Coffee::create($coffee);
        }
    }
}
