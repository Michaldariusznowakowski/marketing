<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie zamówienia</title>
</head>

<body>
    <h2>Poprawnie opłacono zamówienie!</h2>

    <p>Szanowny/a {{ $order->imie }} {{ $order->nazwisko }},</p>

    <p>Twoje zamówienie o numerze {{ $order->id }} zostało opłacone.</p>

    <p>Wkrótce zamówienie zostanie wysłane.</p>

    <p>Dziękujemy za zakupy!</p>
</body>

</html>
