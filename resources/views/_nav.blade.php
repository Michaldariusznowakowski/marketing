{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand" href="{{ route('index') }}">Kawka On-Line</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"--}}
{{--            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link @if (request()->routeIs('index')) active @endif" aria-current="page"--}}
{{--                        href="{{ route('index') }}">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link @if (request()->routeIs('shop')) active @endif"--}}
{{--                        href="{{ route('shop') }}">Oferta</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link @if (request()->routeIs('about')) active @endif" href="{{ route('about') }}">O--}}
{{--                        nas</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Kawka On-Line</span>
        </a>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('index') }}"
                       class="@if (request()->routeIs('index')) text-orange-600 @endif block py-2 px-3 text-gray-900 bg-blue-700 rounded md:bg-transparent md:hover:text-orange-700 md:p-0"
                       aria-current="page">Strona Główna</a>
                </li>
                <li>
                    <a href="{{ route('shop') }}"
                       class="@if (request()->routeIs('shop')) text-orange-600 @endif block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-orange-700
                       md:p-0">Oferta</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                       class="@if (request()->routeIs('about')) text-orange-600 @endif block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-orange-700 md:p-0">O
                        nas</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                       class="@if (request()->routeIs('contact')) text-orange-600 @endif block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-orange-700 md:p-0">Kontakt</a>
                </li>
                <li>
                    <a href="{{ route('cart') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="@if (request()->routeIs('cart')) stroke-orange-600 @endif stroke-gray-600 icon icon-tabler icon-tabler-basket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M5.001 8h13.999a2 2 0 0 1 1.977 2.304l-1.255 7.152a3 3 0 0 1 -2.966 2.544h-9.512a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304z" />
                            <path d="M17 10l-2 -6" />
                            <path d="M7 10l2 -6" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


