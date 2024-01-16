@extends('admin._show')
@section('content')
    <div class="flex items-center">
        <h1 class="text-1xl font-bold">Zaimportuj nowe produkty</h1>
        <a href="{{ route('admin.items.import') }}" class="bg-green-500 text-white px-4 py-2 ml-2">Import</a>
    </div>
    <h1 class="text-3xl font-bold">Zarządzaj produktami</h1>
    <form action="{{ route('admin.items.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col">
            <label for="nazwa">Nazwa</label>
            <input type="text" name="nazwa" id="nazwa" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col">
            <label for="opis">Opis</label>
            <input type="text" name="opis" id="opis" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col">
            <label for="cena">Cena</label>
            <input type="text" name="cena" id="cena" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col">
            <label for="ilosc">Ilość</label>
            <input type="text" name="ilosc" id="ilosc" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <div class="flex flex-col">
            <label for="img">Zdjęcie</label>
            <input type="file" name="img" id="img" class="border border-gray-300 px-2 py-1 mt-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Dodaj</button>
    </form>
    @foreach ($items as $item)
        <div class="item bg-gray-200 p-4 mb-4">
            <div class="w-32 h-32">
                <img class="w-full h-full object-contain" src="{{ asset('storage/' . $item->img) }}"
                    alt="{{ $item->nazwa }}" />
            </div>
            <form action="{{ route('admin.items.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="flex flex-col">
                    <label for="nazwa">Nazwa</label>
                    <input type="text" name="nazwa" id="nazwa" class="border border-gray-300 px-2 py-1 mt-2"
                        value="{{ $item->nazwa }}">
                </div>
                <div class="flex flex-col">
                    <label for="opis">Opis</label>
                    <input type="text" name="opis" id="opis" class="border border-gray-300 px-2 py-1 mt-2"
                        value="{{ $item->opis }}">
                </div>
                <div class="flex flex-col">
                    <label for="cena">Cena</label>
                    <input type="text" name="cena" id="cena" class="border border-gray-300 px-2 py-1 mt-2"
                        value="{{ $item->cena }}">
                </div>
                <div class="flex flex-col">
                    <label for="ilosc">Ilość</label>
                    <input type="text" name="ilosc" id="ilosc" class="border border-gray-300 px-2 py-1 mt-2"
                        value="{{ $item->ilosc }}">
                </div>
                <div class="flex flex-col">
                    <label for="img">Zdjęcie</label>
                    <input type="file" name="img" id="img" class="border border-gray-300 px-2 py-1 mt-2">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Edytuj</button>
            </form>
        </div>
    @endforeach
@endsection
