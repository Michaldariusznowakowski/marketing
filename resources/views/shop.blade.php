@section('content')
    <div class="mt-10">
        @if (session('success'))
            <div class="flex w-full justify-center">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-3/6 text-center"
                    role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="flex w-full justify-center">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-3/6 text-center"
                    role="alert">
                    <strong class="font-bold">{{ session('error') }}</strong>
                </div>
            </div>
        @endif
        <h2 class="mb-10 mt-4 text-4xl w-full text-center tracking-tight font-extrabold text-gray-900">Nasza oferta</h2>
        @if ($coffees->isEmpty())
            <p class="text-lg w-full text-center">Brak dostępnych ofert kaw.</p>
        @else
            <div class="flex justify-center ">
                <div class="inline-grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($coffees as $coffee)
                        @if ($coffee->ilosc != 0)
                            <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden flex flex-col">
                                <a href="{{ route('product', ['coffeeId' => $coffee->id]) }}" class="flex flex-col">
                                    <div class="relative h-72 overflow-hidden">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ $coffee->img }}"
                                            alt="{{ $coffee->nazwa }}" />
                                    </div>
                                    <div class="flex flex-col justify-center flex-1 p-2 text-center">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                            {{ $coffee->nazwa }}
                                        </h5>
                                        <p class="mb-1 text-gray-700 font-bold text-lg">Cena: {{ $coffee->cena }} zł</p>
                                        <p class="text-sm text-gray-500">Najniższa cena z 30 dni przed
                                            obniżką: {{ $coffee->cena }} zł</p>
                                        <div class="text-center">
                                            <a href="{{ route('addToCart', ['coffeeId' => $coffee->id]) }}"
                                                class="@if ($coffee->ilosc < 1) disabled @endif mt-4 inline-flex px-3 py-2 text-sm font-medium text-white bg-orange-700 rounded-lg
                               hover:bg-orange-800">
                                                Do koszyka
                                            </a>

                                        </div>
                                    </div>
                                </a>
                                @if ($coffee->ilosc < 5)
                                    <div class="flex w-full justify-center">
                                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative w-3/6 text-center mb-2"
                                            role="alert">
                                            <strong class="font-bold">Zostały tylko {{ $coffee->ilosc }}
                                                sztuk{{ $coffee->ilosc == 1 ? 'a' : 'i' }}
                                                tego produktu!</strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
            background-color: grey;
        }
    </style>
@endsection
@include('_show')
