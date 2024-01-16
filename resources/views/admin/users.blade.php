@extends('admin._show')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1 class="text-2xl font-bold mb-4">Dostępni użytkownicy</h1>

    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
        <p>Role: {{ $user->role }}</p>

        <form action="{{ route('admin.users.updateRole') }}" method="POST">
            @csrf
            <select name="role" class="border border-gray-300 rounded-md p-2">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Change Role</button>
        </form>

        <form action="{{ route('admin.users.updatePassword') }}" method="POST">
            @csrf
            <input type="password" name="password" placeholder="New Password" class="border border-gray-300 rounded-md p-2">
            <input type="password" name="password2" placeholder="Confirm New Password"
                class="border border-gray-300 rounded-md p-2">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Change Password</button>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>

        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Delete User</button>
        </form>

        <hr class="my-4">
    @endforeach

    <form action="{{ route('admin.users.add') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" class="border border-gray-300 rounded-md p-2">
        <input type="password" name="password" placeholder="Password" class="border border-gray-300 rounded-md p-2">
        <input type="password" name="password2" placeholder="Confirm Password"
            class="border border-gray-300 rounded-md p-2">
        <select name="role" class="border border-gray-300 rounded-md p-2">
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Add User</button>
    </form>
@endsection
