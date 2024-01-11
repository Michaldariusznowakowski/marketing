@section('content')
    <div class="mt-12 w-full">
        @if (session('message'))
            <div class="flex w-full justify-center">
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-3/6 text-center"
                    role="alert">
                    <strong class="font-bold">{{ session('message') }}</strong>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="flex w-full justify-center">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-3/6 text-center"
                     role="alert">
                    <strong class="font-bold">{{ session('error') }}</strong>
                </div>
            </div>
        @endif
        <div class="flex justify-center w-full">
            <div class="flex flex-col justify-items-center w-full md:w-4/6">
                <h2 class="mb-10 text-4xl w-full text-center tracking-tight font-extrabold text-gray-900">Oceń nas!</h2>
                <form method="POST" action="{{ route('ratingsCreate') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="ocena">Ocena</label>
                        <select class="form-control mb-5" id="ocena" name="rating">
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
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" name="comment" rows="3" maxlength="255"
                                      class="form-control px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                                      placeholder="Co myślisz o zakupionych produktach?">{{ old('comment') }}</textarea>
                        </div>
                        @error('comment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="unique_access_token" value="{{ $token }}">
                    <button type="submit" class="inline-flex items-center py-1.5 px-4 text-center text-white bg-orange-600 rounded-lg focus:ring-4 focus:ring-orange-200">Dodaj</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('_show')
