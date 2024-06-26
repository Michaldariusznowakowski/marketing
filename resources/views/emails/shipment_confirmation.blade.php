<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wysłano zamówienie</title>
</head>

<body>

    <h2>Szanowny/a {{ $order->imie }} {{ $order->nazwisko }},</h2>

    <p>Twoje zamówienie o numerze {{ $order->id }} zostało wysłane.</p>

    <p>Numer przesyłki: {{ $trackingNumber }}</p>

    <h3> Oceń nasz sklep</h3>
    <a href="{{ route('ratingsForm', ['unique_access_token' => $unique_access_token]) }}">Oceń</a>

    <p>Dziękujemy za zakupy!</p>
</body>

</html>
