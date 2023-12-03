<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Kawka On-Line</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('index')) active @endif" aria-current="page"
                        href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('shop')) active @endif"
                        href="{{ route('shop') }}">Oferta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('about')) active @endif" href="{{ route('about') }}">O
                        nas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
