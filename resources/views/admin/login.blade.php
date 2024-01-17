@extends('admin._show')
@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl font-bold mb-4">Zaloguj się</h1>
        <form method="POST" action="{{ route('admin.login') }}" class="w-64">
            @csrf

            <div class="mb-4">
                <label for="login" class="block">Login</label>
                <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-md">

                @error('login')
                    <span role="alert" class="text-red-500">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md">

                @error('password')
                    <span role="alert" class="text-red-500">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="mb-4">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="mr-2">
                <label for="remember">Remember Me</label>
            </div> --}}

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Login</button>
            </div>
        </form>
    </div>
@endsection
