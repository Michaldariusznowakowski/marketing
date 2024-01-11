@section('content')
    <h1 class="w-full text-center mt-12 mb-4 text-4xl font-extrabold">Poznaj nas i naszą historię!</h1>
    <div class="grid md:grid-cols-6 gap-4 mt-10">
        <div class="col-span-1 md:col-span-2 grid md:justify-items-end justify-items-center">
            <img class="size-80 rounded-2xl" src="{{ asset('employee-1.jpg') }}" alt=""/>
        </div>
        <div class="col-span-1 md:col-span-3 flex items-center">
            <div>
                <h2 class="mb-2 text-lg tracking-tight font-bold text-gray-900">Anna Kowalska</h2>
                <p>Współzałożycielka i Mistrzyni Kawy
                    Anna, z wykształcenia barista i pasjonatka kawy, ma ponad 10 lat doświadczenia w branży kawowej. Jej
                    przygoda zaczęła się od pracy w małej palarni, gdzie odkryła swoją miłość do rzemiosła i tajników
                    przygotowywania doskonałej kawy. Anna jest odpowiedzialna za selekcję ziaren, tworzenie autorskich
                    mieszanków oraz szkolenie personelu. Jej wiedza i umiejętności są kluczowe w zapewnianiu najwyższej
                    jakości produktów w naszym sklepie.</p>
            </div>
        </div>

        <div class="md:col-span-2 col-span-1 grid md:justify-items-end justify-items-center">
            <img class="size-80 rounded-2xl" src="{{ asset('employee-2.jpg') }}" alt=""/>
        </div>
        <div class="block md:col-span-3 col-span-1 flex items-center">
            <div>
                <h2 class="mb-2 text-lg tracking-tight font-bold text-gray-900">Tomasz Nowak</h2>
                <p>Menadżer Operacyjny
                    Tomasz, z bogatym doświadczeniem zarówno w zarządzaniu, jak i obsłudze klienta, jest sercem naszego
                    zespołu. Odpowiada za sprawne funkcjonowanie sklepu, zarządzanie zamówieniami i dostawami, a także
                    dba o
                    to, aby każdy klient czuł się wyjątkowo w naszym sklepie. Jego pozytywne nastawienie i
                    profesjonalizm są
                    doceniane zarówno przez klientów, jak i współpracowników.</p>
            </div>
        </div>

        <div class="md:col-span-2 col-span-1 grid md:justify-items-end justify-items-center">
            <img class="size-80 rounded-2xl" src="{{ asset('employee-3.jpg') }}" alt=""/>
        </div>
        <div class="md:col-span-3 col-span-1 flex items-center">
            <div>
                <h2 class="mb-2 text-lg tracking-tight font-bold text-gray-900">Magda Lewandowska</h2>
                <p>Specjalistka ds. Marketingu i Mediów Społecznościowych
                    Magda, z wykształcenia specjalistka marketingu, odpowiada za promocję naszego sklepu w mediach
                    społecznościowych i innych kanałach. Jej kreatywne pomysły i nowoczesne podejście do marketingu
                    przyczyniają się do rosnącej popularności naszego sklepu. Magda jest także odpowiedzialna za
                    organizację
                    wydarzeń i warsztatów kawowych, które zbliżają nas do społeczności miłośników kawy.</p>
            </div>
        </div>
    </div>
    <div class="mt-6 text-gray-500 text-sm">
        <h2 class="text-center">Strona jest tylko stroną edukacyjną, dane moga zostać usunięte w każdej chwili u dołu
            ekranu
            pod przyciskiem "pseudoadmin".</h2>
        <h3 class="text-center">Nie sprzedajemy kawy, nie mamy sklepu, nie mamy magazynu, nie mamy nic.</h3>
        <h3 class="text-center">Zgłoszenie zamówienia jest tylko symulacją.</h3>
        <h4 class="text-center">Autor Michał Nowakowski</h4>
        <h4 class="text-center">NM49353</h4>
    </div>
@endsection
@include('_show')
