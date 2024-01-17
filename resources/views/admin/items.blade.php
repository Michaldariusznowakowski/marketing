@extends('admin._show')
@section('content')
    {{-- if admin --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (Auth::user()->role == 'admin')

        <div class="flex items-center justify-center">
            <h1 class="text-3xl font-bold mb-4">Zaimportuj nowe produkty</h1>
            <a href="{{ route('admin.items.import') }}" class="bg-green-500 text-white px-4 py-2 ml-2">Import</a>
        </div>
        <div class="flex items-center justify-center">
            <h1 class="text-3xl font-bold mb-4">Dodaj produkt</h1>
        </div>
    @endauth
    <form action="{{ route('admin.items.add') }}" method="POST" enctype="multipart/form-data"
        class="flex flex-col items-center">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" id="nazwa" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col mb-4">
            <label for="opis">Opis</label>
            <input type="text" name="opis" id="opis" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col mb-4">
            <label for="cena">Cena</label>
            <input type="text" name="cena" id="cena" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col mb-4">
            <label for="ilosc">Ilość</label>
            <input type="text" name="ilosc" id="ilosc" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col mb-4">
            <label for="img">Zdjęcie</label>
            <input type="file" name="img" id="img" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Dodaj</button>
    </form>

    <div class="flex items-center justify-center">
        <h1 class="text-3xl font-bold mb-4 mt-3">Edytuj produkty</h1>
    </div>
    <div class="flex flex-wrap justify-center" p-4>
        @foreach ($items as $item)
            <div class="item bg-gray-200 p-4 mb-4 mx-4">
                <div class="w-32 h-32">
                    <img class="w-full h-full object-contain" src="{{ asset('storage/' . $item->img) }}"
                        alt="{{ $item->nazwa }}" />
                </div>
                <form action="{{ route('admin.items.update') }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col items-center">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="flex flex-col mb-4">
                        <label for="nazwa">Nazwa</label>
                        <input type="text" name="nazwa" id="nazwa"
                            class="border border-gray-300 px-2 py-1 mt-2" value="{{ $item->nazwa }}">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="opis">Opis</label>
                        <input type="text" name="opis" id="opis"
                            class="border border-gray-300 px-2 py-1 mt-2" value="{{ $item->opis }}">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="cena">Cena</label>
                        <input type="text" name="cena" id="cena"
                            class="border border-gray-300 px-2 py-1 mt-2" value="{{ $item->cena }}">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="ilosc">Ilość</label>
                        <input type="text" name="ilosc" id="ilosc"
                            class="border border-gray-300 px-2 py-1 mt-2" value="{{ $item->ilosc }}">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="img">Zdjęcie</label>
                        <input type="file" name="img" id="img"
                            class="border border-gray-300 px-2 py-1 mt-2">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Edytuj</button>
                </form>
                @if (Auth::user()->role == 'admin')
                    <div class="flex items-center justify-center">
                        <form action="{{ route('admin.items.delete') }}" method="POST"
                            class="flex flex-col items-center">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-2">Usuń</button>
                    </div>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
@endsection
