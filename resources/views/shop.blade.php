{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8 offset-md-2">--}}
{{--            @if (session('success'))--}}
{{--                <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                    <strong>{{ session('success') }}</strong>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if (session('error'))--}}
{{--                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                    <strong>{{ session('error') }}</strong>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @include('_cart')--}}
{{--            <h2>Nasza oferta</h2>--}}
{{--            @if ($coffees->isEmpty())--}}
{{--                <p>Brak dostępnych ofert kaw.</p>--}}
{{--            @else--}}
{{--                <ul class="list-group">--}}
{{--                    @foreach ($coffees as $coffee)--}}
{{--                        <li class="list-group-item">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-2">--}}
{{--                                    <img src="{{ $coffee->img }}" alt="{{ $coffee->nazwa }}"--}}
{{--                                        class="img-thumbnail img-fluid" style="max-width: 100px;">--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-10">--}}
{{--                                    <h4>{{ $coffee->nazwa }}</h4>--}}
{{--                                    <p>{{ $coffee->opis }}</p>--}}
{{--                                    <p><strong>Cena: </strong>{{ $coffee->cena }} zł</p>--}}
{{--                                    <a href={{ route('addToCart', ['coffeeId' => $coffee->id]) }}--}}
{{--                                        class="btn btn-primary">Dodaj--}}
{{--                                        do koszyka</a>--}}
{{--                                </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@include('_show')--}}

@section('content')
    <div class="mt-10">
        @if (session('success'))
            <div class="w-full">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if (session('error'))
            <div class="w-full">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        <h2 class="mb-10 mt-4 text-4xl w-full text-center tracking-tight font-extrabold text-gray-900">Nasza oferta</h2>
        @if ($coffees->isEmpty())
            <p class="text-lg w-full text-center">Brak dostępnych ofert kaw.</p>
        @else
            <div class="flex justify-center ">
                <div class="inline-grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($coffees as $coffee)
                        <div class="bg-white border border-gray-200 rounded-lg shadow overflow-hidden flex flex-col">
                            <a href="{{ route('about') }}" class="flex flex-col">
                                <div class="relative h-72 overflow-hidden">
                                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ $coffee->img }}"
                                         alt="{{ $coffee->nazwa }}"/>
                                </div>
                                <div class="flex flex-col justify-center flex-1 p-2 text-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $coffee->nazwa }}</h5>
                                    <p class="mb-1 text-gray-700 font-bold text-lg">Cena: {{ $coffee->cena }} zł</p>
                                    <p class="text-sm text-gray-500">Najniższa cena z 30 dni przed
                                        obniżką: {{ $coffee->cena }} zł</p>
                                    <div class="text-center">
                                        <a href="{{ route('addToCart', ['coffeeId' => $coffee->id]) }}"
                                           class="mt-4 inline-flex px-3 py-2 text-sm font-medium text-white bg-orange-700 rounded-lg
                               hover:bg-orange-800">
                                            Do koszyka
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
@include('_show')
