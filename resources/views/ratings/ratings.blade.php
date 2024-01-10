@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($ratings_with_order_data == null || count($ratings_with_order_data) == 0)
        <h1>No ratings found.</h1>
    @else
        @foreach ($ratings_with_order_data as $rating)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Rating</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <p>{{ $rating['imie'] }}</p>
                        </div>
                        <div class="col-md-2">
                            @foreach ($rating['produkty'] as $product)
                                <p>{{ $product->nazwa }}</p>
                            @endforeach
                            <div class="col-md-2">
                                {{-- gwiazdki --}}
                                <p>
                                    @for ($i = 0; $i < $rating['rating']; $i++)
                                        <i class="fas fa-star">⭐</i>
                                    @endfor
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>{{ $rating['comment'] }}</p>
                            </div>
                        </div>
                    </div>
        @endforeach
    @endif
@endsection
@include('_show')
