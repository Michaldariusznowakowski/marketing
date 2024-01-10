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
    <h2 class="mb-10 mt-4 text-4xl w-full text-center tracking-tight font-extrabold text-gray-900">Oceń nas!</h2>
    <form method="POST" action="{{ route('ratingsCreate') }}">
        @csrf
        <div class="form-group row">
            <label for="ocena">Ocena</label>
            <select class="form-control" id="ocena" name="rating">
                <option value="1">1 gwiazdka</option>
                <option value="2">2 gwiazdki</option>
                <option value="3">3 gwiazdki</option>
                <option value="4">4 gwiazdki</option>
                <option value="5">5 gwiazdek</option>
            </select>
            @error('rating')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="comment">Komentarz</label>
            <textarea class="form-control" id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="hidden" name="unique_access_token" value="{{ $token }}">
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
@endsection
@include('_show')
