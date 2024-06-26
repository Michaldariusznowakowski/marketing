{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" --}}
{{--    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> --}}
{{-- </script> --}}

{{-- <span class="mt-5"></span> --}}
{{-- <footer class="footer mt-auto py-3 bg-light"> --}}
{{--    <div class="container"> --}}
{{--        <span class="text-muted">KawkaOn-Line &copy; 2023</span> --}}
{{--        <a href="{{ route('orders') }}" class="btn btn-info float-end">Zamówienia - PseudoAdmin</a> --}}

{{--    </div> --}}
{{-- </footer> --}}
<footer class="bg-white dark:bg-gray-900">
    <div class="w-full max-w-screen-xl mx-auto p-2">
        <hr class="my-2 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-4" />
        <span class="text-sm text-gray-500 dark:text-gray-400 block w-text-gray-500 sm:text-center">KawkaOn-Line &copy;
            2023. All Rights Reserved.</span>
        <ul class="block w-full mt-3 mb-2 flex flex-wrap items-center mt-3 space-x-3 justify-center">
            <li class="rounded-2xl hover:bg-gray-300 p-1">
                {{-- facebook icon --}}
                <a href="{{ route('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="stroke-gray-600 icon icon-tabler icon-tabler-brand-facebook" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                </a>
            </li>
            <li class="rounded-2xl hover:bg-gray-300 p-1">
                {{-- twitter icon --}}
                <a href="{{ route('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="stroke-gray-600 icon icon-tabler icon-tabler-brand-twitter" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                    </svg>
                </a>
            </li>
            <li class="rounded-2xl hover:bg-gray-300 p-1">
                {{-- instagram icon --}}
                <a href="{{ route('index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="stroke-gray-600 icon icon-tabler icon-tabler-brand-instagram" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                    </svg>
                </a>
            </li>
        </ul>
        <span class="text-sm text-gray-500 dark:text-gray-400 block hover:underline sm:text-center"><a
                href="{{ route('admin.index') }}">Administrator</a></span>
    </div>
</footer>
