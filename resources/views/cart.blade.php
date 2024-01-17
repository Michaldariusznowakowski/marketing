@section('content')
    <div class="mt-10 w-full">
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
        @if (empty($cart) || count($cart) == 0)
            <p class="mt-15 w-full light text-gray-900 text-center">Brak produktów w koszyku</p>
        @else
            @include('_confirmDelete')
            <div class="flex justify-center ">
                {{--            Basket --}}
                <div class="md:w-4/6">
                    <h3 class="text-xl mb-4 font-bold ml-2">Zawartość twojego koszyka</h3>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                                        Nazwa produktu
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ilość
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cena Całkowita
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cena Produktu
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-e-lg">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $coffee)
                                    <tr class="bg-white">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $coffee['nazwa'] }}
                                        <td class="px-6 py-4">
                                            <form class="max-w-xs mx-auto">
                                                <div class="relative flex items-center">
                                                    <a type="button" id="decrement-button"
                                                        href="{{ route('decrementCart', ['coffeeId' => $coffee['id']]) }}"
                                                        data-input-counter-decrement="counter-input"
                                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 2">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                        </svg>
                                                    </a>
                                                    <input type="text" id="counter-input" data-input-counter
                                                        class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                                        placeholder="" value="{{ $coffee['ilosc'] }}">
                                                    <a id="increment-button" data-input-counter-increment="counter-input"
                                                        href="{{ route('incrementCart', ['coffeeId' => $coffee['id']]) }}"
                                                        class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 18 18">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M9 1v16M1 9h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $coffee['cena'] * $coffee['ilosc'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $coffee['cena'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button value="{{ route('removeFromCart', ['coffeeId' => $coffee['id']]) }}"
                                                class="font-medium text-orange-600 hover:underline delete-button">Usuń
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900">
                                    <th scope="row" class="px-6 py-3 text-base">Podsumowanie</th>
                                    <td class="px-6 py-3">{{ $totalQuantity }}</td>
                                    <td class="px-6 py-3">{{ $totalPrice }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div>
                        <div class="border-b mt-10">
                            <button
                                class="accordion-header py-2 px-3 w-full font-bold text-left bg-green-400 hover:bg-green-500 rounded-lg text-center {{ $errors->any() ? 'bg-green-500 hover:bg-green-600 bg-red-400 hover:bg-red-500' : '' }}">
                                Złóż zamówienie Kliknij tutaj! {{ $errors->any() ? 'Wypełnij wszystkie pola!' : '' }}
                            </button>
                            <div
                                class="accordion-content overflow-hidden max-h-0 mt-4 transition-all duration-300 ease-in-out">
                                <div class="p-5 border border-b-0 rounded-lg border-gray-200">
                                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('checkout') }}">
                                        @csrf @method('POST')
                                        <div class="mb-5">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900">Imię</label>
                                            <input id="name" name="name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Ania" required value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <label for="surname"
                                                class="block mb-2 text-sm font-medium text-gray-900">Nazwisko</label>
                                            <input id="surname" name="surname"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="Przykładowa" required value="{{ old('surname') }}">
                                            @error('surname')
                                                <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <label for="address"
                                                class="block mb-2 text-sm font-medium text-gray-900">Adres</label>
                                            <input id="address" name="address"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="ul. Pocztowa 3/5, 55-300 Sosnowiec" required
                                                value="{{ old('address') }}">
                                            @error('address')
                                                <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                placeholder="ania@gmail.com" required value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" id="checkout-button"
                                            class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                            Zakończ zakup
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script>
        @if ($errors->any())
            document.querySelector('.accordion-content').style.maxHeight = document.querySelector('.accordion-content')
                .scrollHeight + "px";
        @endif
        document.querySelectorAll('.accordion-header').forEach(button => {
            button.addEventListener('click', () => {
                const accordionContent = button.nextElementSibling;
                if (accordionContent.style.maxHeight) {
                    accordionContent.style.maxHeight = null;
                } else {
                    accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
                }
            });
        });
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('confirmationModal').classList.remove('hidden');
                document.getElementById('confirmButton').value = button.value;

            });
        });

        document.getElementById('cancelButton').addEventListener('click', () => {
            document.getElementById('confirmationModal').classList.add('hidden');
        });

        document.getElementById('confirmButton').addEventListener('click', () => {
            $path = document.getElementById('confirmButton').value;
            window.location.href = $path
            document.getElementById('confirmationModal').classList.add('hidden');
        });
    </script>
    @if (empty($cart))
    @else
        <script>
            document.getElementById('checkout-button').addEventListener('click', function(e) {
                gtag('event', 'purchase', {
                    "transaction_id": Math.random().toString(36).substring(7),
                    "affiliation": "Kawka On-Line",
                    "value": "{{ $totalPrice }}",
                    "currency": "PLN",
                    "tax": 0,
                    "shipping": 0,
                    "items": [
                        @foreach ($cart as $item)
                            {
                                "item_id": "{{ $item['id'] }}",
                                "item_name": "{{ $item['nazwa'] }}",
                                "quantity": "{{ $item['ilosc'] }}",
                                "price": "{{ $item['cena'] }}",
                            },
                        @endforeach
                    ]
                });
            });
        </script>
    @endif
@endsection
@include('_show')
