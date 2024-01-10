@extends('admin._show')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>Dostępni użytkownicy</h1>

    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
        <p>Role: {{ $user->role }}</p>

        <form action="{{ route('admin.users.updateRole') }}" method="POST">
            @csrf
            <select name="role">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit">Change Role</button>
        </form>

        <form action="{{ route('admin.users.updatePassword') }}" method="POST">
            @csrf
            <input type="password" name="password" placeholder="New Password">
            <input type="password" name="password2" placeholder="Confirm New Password">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit">Change Password</button>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>

        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete User</button>
        </form>

        <hr>
    @endforeach

    <form action="{{ route('admin.users.add') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Confirm Password">
        <select name="role">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Add User</button>
    </form>
@endsection
