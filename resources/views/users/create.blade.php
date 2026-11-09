<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="{{ old('full_name') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <button type="submit">Save User</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">Back to Users</a>
</body>
</html>