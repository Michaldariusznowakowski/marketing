<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiadomość od klienta</title>
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

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        h2 {
            color: #666;
            font-size: 18px;
            margin-bottom: 10px;
        }

        p {
            color: #777;
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Wiadomość od klienta</h1>
        <h2>Email: {{ $email }}</h2>
        <p>{{ $message_form }}</p>
    </div>
</body>

</html>
