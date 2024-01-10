{{-- if route != cart --}}
@if (Route::currentRouteName() != 'cart')
    @if (session('cart') && count(session('cart')) > 0)
        <div id="popup"
            class="fixed top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-gray-800 p-3 rounded-md shadow-lg z-30 hidden">
            <p class="text-lg
            text-gray-700">Hej, tylko krok dzieli ciebie od pysznej kawy o poranku.</p>
            <p class="text-sm text-gray-500">Dokończ zakupy już teraz w koszyku.</p>
            <a href="{{ route('cart') }}" class="mt-5 bg-blue-500 text-white px-1 py-1 rounded">Przejdź do koszyka</a>
            <button onclick="closePopup()" class="mt-5 bg-red-500 text-white px-1 py-1 rounded">Zamknij</button>
        </div>
        <script>
            function closePopup() {
                document.getElementById('popup').style.display = 'none';
            }
            setTimeout(showPopup, 10000);

            function showPopup() {
                document.getElementById('popup').style.display = 'block';
                setTimeout(closePopup, 10000);
            }
        </script>
    @endif
@endif
