<nav class="bg-blue-500 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-2xl font-bold">Admin Panel</div>
        <div>
            @if (auth()->check())
                <span class="mr-4">Cześć, {{ auth()->user()->name }}</span>
                <a href="{{ route('admin.logout') }}" class="hover:underline">Wyloguj</a>

                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
                    <a href="{{ route('admin.orders') }}" class="hover:underline">Zamówienia</a>
                    <a href="{{ route('admin.items') }}" class="hover:underline">Produkty</a>
                @endif
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.users') }}" class="hover:underline">Użytkownicy</a>
                    <a href="{{ route('admin.comments') }}" class="hover:underline">Komentarze</a>
                @endif
            @else
                <p> Zaloguj się aby zobaczyć panel administratora</p>
            @endif

        </div>
    </div>
</nav>
