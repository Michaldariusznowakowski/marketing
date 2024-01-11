@section('content')
    <div class="mt-10 w-full">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($ratings_with_order_data == null || count($ratings_with_order_data) == 0)
            <h1>Brak ocen</h1>
        @else
                <div class="card-header">
                    <h3 class="mb-4 text-2xl tracking-tight font-bold text-gray-900 text-center">Oceny</h3>
                </div>
            @foreach ($ratings_with_order_data as $rating)
                <div class="ml-10 mr-10 mb-10">
                    <div class="border-2 border-gray-500 w-full p-3 rounded-lg">
                        <div class="row">
                            <div class="text-lg font-bold">
                                <p>{{ $rating['imie'] }}</p>
                            </div>
                            <div class="col-md-2">
                                Zakupione produkty:
                                @foreach ($rating['produkty'] as $product)
                                    <p class="ml-5">- {{ $product->nazwa }}</p>
                                @endforeach
                                <div class="col-md-2 mt-2">
                                    {{-- gwiazdki --}}
                                    <p> Ilość gwiazdek:
                                        @for ($i = 0; $i < $rating['rating']; $i++)
                                            <i class="fas fa-star">⭐</i>
                                        @endfor
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <p class="mt-2 mb-2 text-gray-500">{{ $rating['comment'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection
@include('_show')
