<div class="row mt-5">
    <div class="col-md-8 offset-md-2 mb-5">
        <h2>Koszyk</h2>
        <ul class="list-group" id="cart-items">
            @if (empty($cart))
                <li class="list-group-item">Brak produktów w koszyku</li>
            @else
                @foreach ($cart as $item)
                    <li class="list-group-item">
                        {{ $item['nazwa'] }} (Ilość: {{ $item['quantity'] }})
                        <strong>{{ $item['quantity'] * $item['cena'] }}
                            zł</strong>
                        <a href="{{ route('removeFromCart', ['coffeeId' => $item['id']]) }}"
                            class="btn btn-danger btn-sm float-end">Usuń</a>
                    </li>
                @endforeach
                <?php $suma = 0;
                foreach ($cart as $item) {
                    $suma += $item['quantity'] * $item['cena'];
                } ?>
                <li class="list-group-item"><strong>Suma: </strong>{{ $suma }} zł</li>
            @endif
        </ul>
        @if (empty($cart))
        @else
            <div class="accordion mt-2" id="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" style="color: green" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Złóż zamówienie Kliknij tutaj!
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <form method="POST" action="{{ route('checkout') }}" id="checkout-form">
                                @csrf
                                <div class="form-group">
                                    <label for="imie">Imię</label>
                                    <input type="text" class="form-control" id="imie" name="imie"
                                        placeholder="Imię" value="{{ old('imie') }}">
                                    @error('imie')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="nazwisko">Nazwisko</label>
                                    <input type="text" class="form-control" id="nazwisko" name="nazwisko"
                                        placeholder="Nazwisko" value="{{ old('nazwisko') }}">
                                    @error('nazwisko')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="adres">Adres</label>
                                    <input type="text" class="form-control" id="adres" name="adres"
                                        placeholder="Adres" value="{{ old('adres') }}">
                                    @error('adres')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="email">Adres e-mail</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Adres e-mail" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" id="checkout-button" class="btn btn-success mt-2">Zakończ
                                    zakup</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endif
@if (empty($cart))
@else
    <script>
        document.getElementById('checkout-button').addEventListener('click', function(e) {
            gtag('event', 'purchase', {
                "transaction_id": Math.random().toString(36).substring(7),
                "affiliation": "Kawka On-Line",
                <?php $suma = 0;
                foreach ($cart as $item) {
                    $suma += $item['quantity'] * $item['cena'];
                } ?> "value": <?php echo $suma; ?>,
                "currency": "PLN",
                "tax": 0,
                "shipping": 0,
                "items": [
                    @foreach ($cart as $item)
                        {
                            "item_id": "{{ $item['id'] }}",
                            "item_name": "{{ $item['nazwa'] }}",
                            "quantity": "{{ $item['quantity'] }}",
                            "price": "{{ $item['cena'] }}",
                        },
                    @endforeach
                ]
            });

            alert('Dziękujemy za zakupy!');
        });
    </script>
@endif