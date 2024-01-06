<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie zamówienia</title>
</head>

<body>
    <h2>Dziękujemy za złożenie zamówienia!</h2>

    <p>Szanowny/a {{ $order->imie }} {{ $order->nazwisko }},</p>

    <p>Twoje zamówienie o numerze {{ $order->id }} zostało pomyślnie złożone.</p>

    <h3>Szczegóły zamówienia:</h3>
    <ul>
        {{-- json order --}}
        @foreach (json_decode($order->produkty, true) as $item)
            <li>{{ $item['nazwa'] }} (Ilość: {{ $item['quantity'] }})</li>
        @endforeach
    </ul>

    <p>Całkowita kwota zamówienia: {{ $order->suma }} zł</p>

    <p>Prosimy o dokonanie płatności na konto bankowe: xxxxxxxx, w terminie 7 dni od daty złożenia zamówienia.</p>

    <p>Dziękujemy za zakupy!</p>
</body>

</html>
