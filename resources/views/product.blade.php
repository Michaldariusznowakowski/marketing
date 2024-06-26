@section('content')
    @if (session('success'))
        <div class="w-full mt-10">
            <div class="flex w-full justify-center">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-3/6 text-center"
                    role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                </div>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="w-full mt-10">
            <div class="flex w-full justify-center">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-3/6 text-center"
                    role="alert">
                    <strong class="font-bold">{{ session('error') }}</strong>
                </div>
            </div>
        </div>
    @endif
    <div
        class="xl:w-2/6 lg:w-2/5 w-80 md:flex items-start justify-center px-4 @if (session('success') || session('error')) mt-4 @else mt-20 @endif">
        <a class="font-bold rounded-lg p-2 px-4 bg-gray-200 hover:bg-gray-300" href="{{ route('shop') }}">
            ← Powrót do listy produktów
        </a>
    </div>
    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block">
            <img class="w-full" src="{{ asset('storage/' . $coffee->img) }}" alt="{{ $coffee->nazwa }}" />
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class="border-b border-gray-200 pb-6">
                <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 mt-2">
                    {{ $coffee->nazwa }}</h1>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
            </div>

            <a href="{{ route('addToCart', ['coffeeId' => $coffee->id]) }}"
                class="@if ($coffee->ilosc < 1) disabled @endif dark:bg-white rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-700 text-base flex items-center justify-center leading-none text-white bg-orange-700 w-full py-4 hover:bg-orange-800 focus:outline-none">
                Do koszyka
            </a>
            @if ($coffee->ilosc < 1)
                <p class="text-lg mt-2 text-red-600 font-bold">Brak produktu na stanie</p>
            @endif
            @if ($coffee->ilosc < 5)
                <div class="flex w-full justify-center mt-3">
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative text-center mb-2"
                        role="alert">
                        <strong class="font-bold">Zostały tylko {{ $coffee->ilosc }}
                            sztuk{{ $coffee->ilosc == 1 ? 'a' : 'i' }}
                            tego produktu!</strong>
                    </div>
                </div>
            @endif
            <div>
                <p class="xl:pr-48 text-base mb-10 lg:leading-tight leading-normal text-gray-600 mt-7">{{ $coffee->opis }}
                </p>
                <p class="text-base leading-4 mt-4 text-gray-600">Moc: {{ rand(1, 5) }}</p>
                <p class="text-base leading-4 mt-4 text-gray-600">Kwasowość: {{ rand(1, 5) }}</p>
            </div>
            <div>
                <div class="border-t border-b py-4 mt-7 border-gray-200">
                    <div data-menu class="flex justify-between items-center cursor-pointer">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Dostawa i zwrot</p>
                        <button
                            class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                            role="button" aria-label="show or hide">
                            <svg class="transform text-gray-300 dark:text-white" width="10" height="6"
                                viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300"
                        id="sect">
                        @include('_returnNote')
                    </div>
                </div>
            </div>
            <div>
                <div class="border-b py-4 border-gray-200">
                    <div data-menu class="flex justify-between items-center cursor-pointer">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Skontaktuj się</p>
                        <button
                            class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                            role="button" aria-label="show or hide">
                            <svg class="transform text-gray-300 dark:text-white" width="10" height="6"
                                viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 1L5 5L1 1" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300"
                        id="sect">W razie jakichkolwiek pytań skontaktuj się z nami na dane podane w zakładce
                        Kontakt :)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 2xl:px-20 md:px-6 px-4">
        <p class="w-full text-center font-bold text-xl mb-4">Inni klienci kupili też: </p>
        <div class="flex justify-center ">
            <div class="inline-grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($randomCoffees as $randomCoffee)
                    @if ($randomCoffee->ilosc != 0)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden flex flex-col">
                            <a href="{{ route('product', ['coffeeId' => $randomCoffee->id]) }}" class="flex flex-col">
                                <div class="relative h-72 overflow-hidden">
                                    <img class="absolute inset-0 w-full h-full object-cover"
                                        src="{{ asset('storage/' . $randomCoffee->img) }}"
                                        alt="{{ $randomCoffee->nazwa }}" />
                                </div>

                                <div class="flex flex-col justify-center flex-1 p-2 text-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $randomCoffee->nazwa }}
                                    </h5>
                                    <p class="mb-1 text-gray-700 font-bold text-lg">Cena: {{ $randomCoffee->cena }}
                                        zł</p>
                                    <p class="text-sm text-gray-500">Najniższa cena z 30 dni przed
                                        obniżką: {{ $randomCoffee->cena }} zł</p>
                                    <div class="text-center">
                                        <a href="{{ route('addToCart', ['coffeeId' => $coffee->id]) }}"
                                            class="@if ($randomCoffee->ilosc < 1) disabled @endif mt-4 inline-flex px-3 py-2 text-sm font-medium text-white bg-orange-700 rounded-lg
                               hover:bg-orange-800">
                                            Do koszyka
                                        </a>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script>
        let elements = document.querySelectorAll("[data-menu]");
        for (let i = 0; i < elements.length; i++) {
            let main = elements[i];
            main.addEventListener("click", function() {
                let element = main.parentElement.parentElement;
                let andicators = main.querySelectorAll("svg");
                let child = element.querySelector("#sect");
                child.classList.toggle("hidden");
                andicators[0].classList.toggle("rotate-180");
            });
        }
    </script>
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
            background-color: grey;
        }
    </style>
@endsection
@include('_show')
