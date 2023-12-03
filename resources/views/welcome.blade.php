@extends('_show')
@section('content')
    <div class="col-lg-8">
        <h2>Strona edukacyjna, wszystkie dane są fikcyjne. Nie sprzedajemy tutaj nic :)</h2>
        <h2>Nasza historia</h2>
        <p>Jesteśmy na rynku od wielu lat, stale rozwijając naszą ofertę i podnosząc jakość naszych produktów. Nasza
            pasja
            do kawy sprawia, że każda z naszych mieszank to unikalne doświadczenie smakowe.</p>
        <p>Nasza podróż rozpoczęła się od małego sklepiku z pasją do wyszukiwania najlepszych ziaren na całym świecie.
            Dzięki ciężkiej pracy i zaangażowaniu naszej ekipy, dziś jesteśmy jednym z wiodących dostawców kawy na
            rynku.
        </p>
        <p>W naszym sklepie znajdziesz nie tylko doskonałe kawy, ale także historię każdej z nich. Chcemy, abyś poczuł
            się
            częścią naszej kawowej podróży.</p>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-lg-6">
            <h2>Dlaczego my?</h2>
            <p>Nieustannie pracujemy nad doskonaleniem naszych kaw, dbając o najwyższą jakość ziaren i procesów produkcji.
                Naszym celem jest zapewnienie klientom niezapomnianych chwil przy filiżance doskonałej kawy.</p>
            <p>Nasi specjaliści od kawy są pasjonatami z wykształceniem baristycznym, gotowymi podzielić się swoją wiedzą na
                temat sposobów parzenia i ciekawostek na temat różnych odmian kaw.</p>
            <p>Wybierając nas, wybierasz nie tylko produkt, ale także doświadczoną ekipę, gotową sprostać najwyższym
                wymaganiom
                miłośników kawy.</p>
        </div>
        <div class="col-lg-5">
            <img src="{{ asset('welcome.jpg') }}" alt="Kawa" class="img-fluid">
        </div>
    </div>
    <div class="col-lg-12 text-center mt-5 mb-5">
        <a href="{{ route('shop') }}" class="btn btn-success">Przejdz do sklepu</a>
    </div>
@endsection
