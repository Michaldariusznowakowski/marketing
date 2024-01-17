<!DOCTYPE html>
<html lang="pl">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2LPDRV1M63"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'G-2LPDRV1M63');
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KawkaOn-Line</title>
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    {{--        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('_cookies')
    <div class="flex flex-col h-screen">
        @include('_popup')
        @include('_nav')
        @include('_info')
        <div class="mt-10 flex-grow">
            @yield('content')
        </div>
        @include('_footer')
    </div>
</body>
