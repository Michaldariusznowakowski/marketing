@extends('admin._show')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (count($ratings_with_order_data) === 0)
        <div class="flex justify-center items-center h-64">
            <p class="text-gray-500 text-lg">Brak komentarzy</p>
        </div>
    @else
        <div class="flex flex-col space-y-4">
            @foreach ($ratings_with_order_data as $rating)
                <div class="bg-gray-100 p-4 rounded-md">
                    <p>{{ $rating->imie }}</p>
                    <p>{{ $rating->nazwisko }}</p>
                    <p>{{ $rating->email }}</p>
                    <p>{{ $rating->rating }}</p>
                    <p>{{ $rating->comment }}</p>
                    <div class="flex flex-col space-y-2">
                        @foreach ($rating->produkty as $product)
                            <p>{{ $product->nazwa }}</p>
                            <p>{{ $product->cena }}</p>
                            <p>{{ $product->ilosc }}</p>
                        @endforeach
                    </div>
                    <form action="{{ route('admin.ratings.delete', $rating->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Usuń komentarz</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
