@extends('admin._show')
@section('content')
    @if (count($ratings_with_order_data) === 0)
        <div class="flex justify-center items-center h-64">
            <p class="text-gray-500 text-lg">Brak komentarzy</p>
        </div>
    @else
        <div class="flex flex-col items-center justify-center">
            @foreach ($ratings_with_order_data as $rating)
                <div class="bg-gray-100 p-4 rounded-md shadow-md">
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Imie</p>
                        <p class="font-bold">{{ $rating['imie'] }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Nazwisko</p>
                        <p class="font-bold">{{ $rating['nazwisko'] }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-bold">E-mail</p>
                        <p class="font-bold">{{ $rating['email'] }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Ocena</p>
                        <p class="font-bold">{{ $rating['rating'] }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-bold">Komentarz</p>
                        <p class="font-bold">{{ $rating['comment'] }}</p>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>Nazwa</th>
                                <th>Cena</th>
                                <th>Ilość</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rating['produkty'] as $product)
                                <tr>
                                    <td>{{ $product->nazwa }}</td>
                                    <td>{{ $product->cena }}</td>
                                    <td>{{ $product->ilosc }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (Auth::user()->role == 'admin')
                        <form action="{{ route('admin.ratings.delete', $rating['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Usuń
                                komentarz</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection
