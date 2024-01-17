@extends('admin._show')
@section('content')
    @if ($errors->any() || session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Błąd!</strong>
            <span class="block sm:inline">Wystąpiły błędy podczas przetwarzania formularza!</span>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @if (session('error'))
                    <li>{{ session('error') }}</li>
                @endif
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex flex-col items-center">
        <h1 class="text-2xl font-bold">Zamówienia</h1>
        <p>Wybierz, które zamówienia chcesz wyświetlić:</p>
        <form action="{{ route('admin.orders') }}" method="GET" class="flex items-center mt-2">
            <select name="status" class="mr-2">
                <option value="">Wszystkie</option>
                <option value="0" {{ request('status') == 0 ? 'selected' : '' }}>Oczekujące na płatność</option>
                <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Opłacone</option>
                <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Wysłane</option>
            </select>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Filtruj</button>
        </form>
        <div class="mt-4">
            @foreach ($orders as $order)
                <div class="border border-gray-300 rounded p-4 mb-4">
                    <p class="font-bold">ID: {{ $order->id }}</p>
                    <p>Imię: {{ $order->imie }}</p>
                    <p>Nazwisko: {{ $order->nazwisko }}</p>
                    <p>Produkty:</p>
                    <ul>
                        @foreach (json_decode($order->produkty) as $produkt)
                            <li>{{ $produkt->nazwa }} - {{ $produkt->cena }} zł - Ilość: {{ $produkt->ilosc }}</li>
                        @endforeach
                    </ul>
                    <p>Koszt całkowity: {{ $order->suma }}</p>
                    <p>Email: {{ $order->email }}</p>
                    <p>Adres: {{ $order->adres }}</p>
                    <p>Status:
                        @if ($order->status == 0)
                            Oczekujące na płatność
                        @elseif($order->status == 1)
                            Opłacone
                        @else
                            Wysłane
                        @endif
                    </p>
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST"
                        class="flex items-center mt-2">
                        @csrf
                        <select name="status" onchange="handleStatusChange(this, {{ $order->id }})" class="mr-2">
                            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Oczekujące na płatność
                            </option>
                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Opłacone</option>
                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Wysłane</option>
                        </select>
                        <div id="trackingNumberInput{{ $order->id }}" class="mr-2" hidden>
                            <input type="text" name="tracking_number" placeholder="Numer przesyłki"
                                class="border border-gray-300 px-2 py-1">
                        </div>
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zmień
                            status</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function handleStatusChange(selectElement, orderId) {
            var trackingNumberInput = document.getElementById('trackingNumberInput' + orderId);

            if (selectElement.value === '2') {
                trackingNumberInput.style.display = 'block';
            } else {
                trackingNumberInput.style.display = 'none';
            }
        }
    </script>
@endsection
