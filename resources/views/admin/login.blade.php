@extends('admin._show')
@section('content')
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div>
            <label for="login">Login</label>
            <input id="login" type="text" name="login" value="{{ old('login') }}" required autofocus>

            @error('login')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Remember Me</label>
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
