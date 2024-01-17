<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie zamówienia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Zamówienie zostało anulowane!</h2>

        <p>Szanowny/a {{ $order->imie }} {{ $order->nazwisko }},</p>

        <p>Twoje zamówienie o numerze {{ $order->id }} zostało anulowane.</p>

        <p>Jeżeli uwazasz, że to pomyłka, skontaktuj się z nami.</p>

        <p>Za utrudnienia przepraszamy!</p>
    </div>
</body>

</html>
