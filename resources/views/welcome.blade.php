@extends('_show')
@section('content')
    {{--    <div class="col-lg-8">--}}
    {{--        <h2>Strona edukacyjna, wszystkie dane są fikcyjne. Nie sprzedajemy tutaj nic :)</h2>--}}
    {{--        <h2>Nasza historia</h2>--}}
    {{--        <p>Jesteśmy na rynku od wielu lat, stale rozwijając naszą ofertę i podnosząc jakość naszych produktów. Nasza--}}
    {{--            pasja--}}
    {{--            do kawy sprawia, że każda z naszych mieszank to unikalne doświadczenie smakowe.</p>--}}
    {{--        <p>Nasza podróż rozpoczęła się od małego sklepiku z pasją do wyszukiwania najlepszych ziaren na całym świecie.--}}
    {{--            Dzięki ciężkiej pracy i zaangażowaniu naszej ekipy, dziś jesteśmy jednym z wiodących dostawców kawy na--}}
    {{--            rynku.--}}
    {{--        </p>--}}
    {{--        <p>W naszym sklepie znajdziesz nie tylko doskonałe kawy, ale także historię każdej z nich. Chcemy, abyś poczuł--}}
    {{--            się--}}
    {{--            częścią naszej kawowej podróży.</p>--}}
    {{--    </div>--}}
    {{--    <div class="row mt-5 mb-5">--}}
    {{--        <div class="col-lg-6">--}}
    {{--            <h2>Dlaczego my?</h2>--}}
    {{--            <p>Nieustannie pracujemy nad doskonaleniem naszych kaw, dbając o najwyższą jakość ziaren i procesów produkcji.--}}
    {{--                Naszym celem jest zapewnienie klientom niezapomnianych chwil przy filiżance doskonałej kawy.</p>--}}
    {{--            <p>Nasi specjaliści od kawy są pasjonatami z wykształceniem baristycznym, gotowymi podzielić się swoją wiedzą na--}}
    {{--                temat sposobów parzenia i ciekawostek na temat różnych odmian kaw.</p>--}}
    {{--            <p>Wybierając nas, wybierasz nie tylko produkt, ale także doświadczoną ekipę, gotową sprostać najwyższym--}}
    {{--                wymaganiom--}}
    {{--                miłośników kawy.</p>--}}
    {{--        </div>--}}
    {{--        <div class="col-lg-5">--}}
    {{--            <img src="{{ asset('welcome.jpg') }}" alt="Kawa" class="img-fluid">--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-lg-12 text-center mt-5 mb-5">--}}
    {{--        <a href="{{ route('shop') }}" class="btn btn-success">Przejdz do sklepu</a>--}}
    {{--    </div>--}}
    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center pt-8 pb-2 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-8 lg:px-4">
            <div class="font-light text-gray-900 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Poznaj prawdziwy
                    smak kawy</h2>
                <p class="mb-4">Jesteśmy na rynku od wielu lat, stale rozwijając naszą ofertę i podnosząc jakość naszych
                    produktów. Nasza pasja do kawy sprawia, że każda z naszych mieszank to unikalne doświadczenie
                    smakowe.</p>
                <p class="mb-4">Nasza podróż rozpoczęła się od małego sklepiku z pasją do wyszukiwania najlepszych
                    ziaren na całym świecie.
                    Dzięki ciężkiej pracy i zaangażowaniu naszej ekipy, dziś jesteśmy jednym z wiodących dostawców kawy
                    na rynku.</p>
                <p>W naszym sklepie znajdziesz nie tylko doskonałe kawy, ale także historię każdej z nich. Chcemy, abyś
                    poczuł się częścią naszej kawowej podróży.</p>
                <h2 class="mb-4 mt-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white">Dlaczego
                    my?</h2>
                <p class="mb-4">Nieustannie pracujemy nad doskonaleniem naszych kaw, dbając o najwyższą jakość ziaren i
                    procesów
                    produkcji.
                    Naszym celem jest zapewnienie klientom niezapomnianych chwil przy filiżance doskonałej kawy.</p>
                <p class="mb-4">Nasi specjaliści od kawy są pasjonatami z wykształceniem baristycznym, gotowymi
                    podzielić się swoją
                    wiedzą na
                    temat sposobów parzenia i ciekawostek na temat różnych odmian kaw.</p>
                <p class="mb-4">Wybierając nas, wybierasz nie tylko produkt, ale także doświadczoną ekipę, gotową
                    sprostać najwyższym
                    wymaganiom
                    miłośników kawy.</p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img class="w-full rounded-lg" src="{{ asset('welcome.jpg') }}" alt="coffee photo">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="{{ asset('welcome3.png') }}" alt="coffee photo">
            </div>
        </div>
        <div class="pl-4 pr-4 pt-4 mx-auto max-w-screen-xl">
            <h3 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">Spróbuj
                naszej kawy we wyselekconowanych kawiarniach</h3>
        </div>
        <div class="pl-4 pr-4 pt-4 mx-auto max-w-screen-xl grid md:grid-cols-3 justify-items-center">
            <div
                class="max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="coffeeshop-1.jpg" alt="kawiarnia 1"/>
                </a>
                <div class="p-2 text-center">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Warszawa -
                            Catcafe</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">ul. Koczowania 11/5b</p>
                    <a href="#"
                       class="inline-flex px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800">
                        Sprawdź
                    </a>
                </div>
            </div>
            <div
                class="max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="coffeeshop-2.jpg" alt="kawiarnia 1"/>
                </a>
                <div class="p-2 text-center">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bydgoszcz -
                            Trash Coffee</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">ul. Wojenna 7</p>
                    <a href="#"
                       class="inline-flex px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800">
                        Sprawdź
                    </a>
                </div>
            </div>
            <div
                class="max-w-xs bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="coffeeshop-3.jpg" alt="kawiarnia 1"/>
                </a>
                <div class="p-2 text-center">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Szczecin -
                            Altcafe</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">ul. Kamienicowa 3/21</p>
                    <a href="#"
                       class="inline-flex px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800">
                        Sprawdź
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
