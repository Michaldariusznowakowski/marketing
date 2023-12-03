@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
            @include('_cart')
            <h2>Nasza oferta</h2>
            @if ($coffees->isEmpty())
                <p>Brak dostępnych ofert kaw.</p>
            @else
                <ul class="list-group">
                    @foreach ($coffees as $coffee)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="{{ $coffee->img }}" alt="{{ $coffee->nazwa }}"
                                        class="img-thumbnail img-fluid" style="max-width: 100px;">
                                </div>
                                <div class="col-lg-10">
                                    <h4>{{ $coffee->nazwa }}</h4>
                                    <p>{{ $coffee->opis }}</p>
                                    <p><strong>Cena: </strong>{{ $coffee->cena }} zł</p>
                                    <a href={{ route('addToCart', ['coffeeId' => $coffee->id]) }}
                                        class="btn btn-primary">Dodaj
                                        do koszyka</a>
                                </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
@include('_show')
