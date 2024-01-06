@section('content')
    <div class="mt-10 w-full">
        {{--        <p class="mt-15 w-full light text-gray-900 text-center">Brak produktów w koszyku</p>--}}
        <div class="flex justify-center ">
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
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Kawa arabica
                            </th>
                            <td class="px-6 py-4">
                                <form class="max-w-xs mx-auto">
                                    <div class="relative flex items-center">
                                        <button type="button" id="decrement-button"
                                                data-input-counter-decrement="counter-input"
                                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                            </svg>
                                        </button>
                                        <input type="text" id="counter-input" data-input-counter
                                               class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                               placeholder="" value="2" required>
                                        <button type="button" id="increment-button"
                                                data-input-counter-increment="counter-input"
                                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                40 zł
                            </td>
                            <td class="px-6 py-4">
                                20 zł
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                   class="font-medium text-orange-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr class="font-semibold text-gray-900">
                            <th scope="row" class="px-6 py-3 text-base">Podsumowanie</th>
                            <td class="px-6 py-3">2</td>
                            <td class="px-6 py-3">40 zł</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div>
                    <div class="border-b">
                        <button class="accordion-header py-4 px-5 w-full text-left">
                            Złóż zamówienie Kliknij tutaj!
                        </button>
                        <div
                            class="accordion-content overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
                            <div class="p-5 border border-b-0 border-gray-200">
                                <form class="max-w-sm mx-auto">
                                    <div class="mb-5">
                                        <label for="name"
                                               class="block mb-2 text-sm font-medium text-gray-900">Imię</label>
                                        <input id="name"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                               placeholder="name@flowbite.com" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="surname"
                                               class="block mb-2 text-sm font-medium text-gray-900">Nazwisko</label>
                                        <input id="surname"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                               placeholder="name@flowbite.com" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="address"
                                               class="block mb-2 text-sm font-medium text-gray-900">Adres</label>
                                        <input id="address"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                               placeholder="name@flowbite.com" required>
                                    </div>
                                    <div class="mb-5">
                                        <label for="email"
                                               class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                        <input type="email" id="email"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                               placeholder="name@flowbite.com" required>
                                    </div>
                                    <button type="submit"
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
    </div>
    <script>
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
    </script>
@endsection
@include('_show')
