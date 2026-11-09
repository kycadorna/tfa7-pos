<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>
    <h1>User Accounts</h1>

    <a href="/users/create">Create User</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach ($users as $user)
        <hr>

        @if ($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}"
                 alt="Avatar"
                 width="100"
                 height="100">
        @else
            <p>No avatar uploaded</p>
        @endif

        <h3>{{ $user->full_name ?? $user->name }}</h3>
        <p>Username: {{ $user->username }}</p>
        <p>Email: {{ $user->email }}</p>

        <a href="/users/{{ $user->id }}/edit">Edit</a>
    @endforeach
</body>
</html>