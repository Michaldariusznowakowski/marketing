@foreach ($orders as $order)
    <p>ID: {{ $order->id }}</p>
    <p>Imię: {{ $order->first_name }}</p>
    <p>Nazwisko: {{ $order->last_name }}</p>
    <p>Produkty: {{ $order->products }}</p>
    <p>Koszt całkowity: {{ $order->total_cost }}</p>
    <p>Email: {{ $order->email }}</p>
    <p>Status: {{ $order->status }}</p>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="status" onchange="handleStatusChange(this)">
            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Oczekujące na płatność</option>
            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Wysłane</option>
            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Odebrane</option>
        </select>
        <div id="trackingNumberInput{{ $order->id }}" style="display: none;">
            <input type="text" name="tracking_number" placeholder="Numer przesyłki">
        </div>
    </form>
@endforeach

<form action="{{ route('admin.orders.index') }}" method="GET">
    <select name="status" onchange="this.form.submit()">
        <option value="">Wszystkie</option>
        <option value="0" {{ request('status') == 0 ? 'selected' : '' }}>Oczekujące na płatność</option>
        <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Wysłane</option>
        <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Odebrane</option>
    </select>
</form>

<script>
    function handleStatusChange(selectElement) {
        const trackingNumberInput = document.getElementById(`trackingNumberInput${selectElement.value}`);
        if (selectElement.value === '1') {
            trackingNumberInput.style.display = 'block';
        } else {
            trackingNumberInput.style.display = 'none';
        }
    }
</script>
