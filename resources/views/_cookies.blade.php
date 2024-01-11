{{-- cookies --}}
{{-- ifset session cookies --}}
@if (session('cookies') == null)
{{--    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--        <strong>Cookie</strong>--}}
{{--        <p class="text-center">Ta strona używa ciasteczek (cookies), dzięki którym nasz serwis może działać lepiej.</p>--}}
{{--        <p class="text-center">Korzystając ze strony wyrażasz zgodę na używanie cookies, zgodnie z aktualnymi--}}
{{--            ustawieniami przeglądarki.</p>--}}
{{--        <p class="text-center">Jeżeli nie wyrażasz zgody, ustawienia dotyczące cookies możesz zmienić w swojej--}}
{{--            przeglądarce.</p>--}}
{{--        <a href="{{ route('cookiesAllow') }}" class="btn btn-primary">Zgoda</a>--}}
{{--        <a href="{{ route('cookiesDisallow') }}" class="btn btn-primary">Nie zgoda</a>--}}
{{--    </div>--}}
    <div id="cookie-banner" tabindex="-1" class="fixed top-0 start-0 z-50 flex flex-col justify-between w-full p-4 border-b border-green-200 md:flex-row bg-green-50">
        <div class="mb-4 md:mb-0 md:me-4">
            <h2 class="mb-1 text-base font-semibold text-gray-900">Ta strona używa ciasteczek (cookies), dzięki którym nasz serwis może działać lepiej.</h2>
            <p class="flex items-center text-sm font-normal text-gray-500">Korzystając ze strony wyrażasz zgodę na używanie cookies, zgodnie z aktualnymi
                ustawieniami przeglądarki.</p>
            <p class="flex items-center text-sm font-normal text-gray-500">Jeżeli nie wyrażasz zgody, ustawienia dotyczące cookies możesz zmienić w swojej
                przeglądarce.</p>
        </div>
        <div class="flex items-center flex-shrink-0">
            <a href="{{ route('cookiesAllow') }}" class="py-3 px-5 text-sm text-gray-600 font-medium text-center text-white rounded-lg bg-green-600 sm:w-fit hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300">Zezwól na wszystkie</a>
            <a href="{{ route('cookiesDisallow') }}" class="py-3 ml-4 px-5 text-sm text-gray-600 font-medium text-center text-white rounded-lg bg-gray-600 sm:w-fit hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300">Zezwól na niezbędne</a>
        </div>
    </div>
@endif
