@section('content')
    <div class="md:mt-20 mt-10 grid md:grid-cols-6">
        <div class="block col-span-1 md:col-span-2 ml-10">
            <div>
                <p class="font-bold mb-1 mt-4 text-xl uppercase">Sklep stacjonarny</p>
                <p>Kawka On-Line<br>Kawowa 21 / 20<br>73-194, Żydowo</p>
            </div>
            <div>
                <p class="font-bold text-xl mt-8 mb-1 uppercase">Skontaktuj się</p>
                <p class="text-sm mb-1">Kontakt telefoniczny dostępny:<br>Poniedziałek - Piątek: 9:00 - 17:00</p>
                <p class="text-xl mb-1"><a href="tel:+48 123 456 789">+48 123 456 789</a></p>
                <p class="text-xl mb-2"><a href="tel:+48 284 931 355">+48 284 931 355</a></p>
            </div>
            <div>
                <p class="text-sm mb-1">Lub napisz pod jeden z podanych maili:</p>
                <p class="text-xl mb-1 hover:underline"><a href="mailto:kawkaonline@pomoc.pl">kawkaonline@pomoc.pl</a></p>
                <p class="text-xl hover:underline"><a href="mailto:kawkaonline-social@gmail.com">kawkaonline-social@gmail.com</a></p>
            </div>
        </div>
        <div class="col-span-1 md:col-span-4">
            <section class="bg-white dark:bg-gray-900">
                <div class="px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Potrzebujesz pomocy? Napisz już teraz!</h2>
                    <p class="mb-4 lg:mb-8 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Masz pytania w związku z wyborem kawy? A może zastanawiasz się skąd pochodzi nasza kawa? Wystarczy krótka wiadomość i postaramy się odpisać jak szybko to będzie możliwe :)</p>
                    <form action="#" class="space-y-8">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Twój email</label>
                            <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="example@mail.com" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Treść wiadomości</label>
                            <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Treść..."></textarea>
                        </div>
                        <div>
                            <button type="submit" class="py-3 px-5 text-sm text-gray-600 font-medium text-center text-white rounded-lg bg-gray-700 sm:w-fit hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300">Send message</button>
                        </div>
                         </form>
                </div>
            </section>
        </div>
    </div>
@endsection
@include('_show')
