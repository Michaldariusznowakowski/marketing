{{-- cookies --}}
{{-- ifset session cookies --}}
@if (session('cookies') == null)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cookie</strong>
        <p class="text-center">Ta strona używa ciasteczek (cookies), dzięki którym nasz serwis może działać lepiej.</p>
        <p class="text-center">Korzystając ze strony wyrażasz zgodę na używanie cookies, zgodnie z aktualnymi
            ustawieniami przeglądarki.</p>
        <p class="text-center">Jeżeli nie wyrażasz zgody, ustawienia dotyczące cookies możesz zmienić w swojej
            przeglądarce.</p>
        <a href="{{ route('cookiesAllow') }}" class="btn btn-primary">Zgoda</a>
        <a href="{{ route('cookiesDisallow') }}" class="btn btn-primary">Nie zgoda</a>
    </div>
@endif
