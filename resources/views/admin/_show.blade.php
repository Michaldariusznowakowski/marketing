<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KawkaOn-Line Panel administratora</title>
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    {{--        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-col h-screen">
        @include('admin._nav')
        @include('_info')
        <div class="mt-10 flex-grow">
            @yield('content')
        </div>
        @include('admin._footer')
    </div>
</body>
