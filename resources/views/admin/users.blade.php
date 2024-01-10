<h1>Available Users</h1>

@foreach ($users as $user)
    <p>{{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->role }}</p>

    <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="role">
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
        </select>
        <button type="submit">Change Role</button>
    </form>

    <form action="{{ route('admin.users.updatePassword', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="password" name="password" placeholder="New Password">
        <button type="submit">Change Password</button>
    </form>

    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete User</button>
    </form>

    <hr>
@endforeach

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <select name="role">
        <option value="admin">Admin</option>
        <option value="employee">Employee</option>
    </select>
    <button type="submit">Add User</button>
</form>
