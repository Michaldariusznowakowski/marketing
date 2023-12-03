@extends('_show')
@section('content')
    @foreach ($orders as $order)
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2>Zamówienie nr {{ $order->id }}</h2>
                    <p><strong>Imię i nazwisko: </strong>{{ $order->imie }} {{ $order->nazwisko }}</p>
                    <p><strong>Adres: </strong>{{ Str::substr($order->adres, 0, 8) }}********</p>
                    <p><strong>E-mail: </strong>Ukryto</p>
                    <p><strong>Suma: </strong>{{ $order->suma }} zł</p>
                    <p><strong>Produkty: </strong></p>
                    <ul>
                        @foreach (json_decode($order->produkty, true) as $item)
                            <li>{{ $item['nazwa'] }} (Ilość: {{ $item['quantity'] }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Powrót --}}
    {{-- purgeorders --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="{{ route('purgeOrders') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Wyczyść zamówienia</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <a href="{{ route('index') }}" class="btn btn-primary">Powrót</a>
            </div>
        </div>
    </div>
@endsection
