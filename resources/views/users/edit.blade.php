<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST"
          action="{{ route('users.update', $user) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Username:</label><br>
        <input type="text" name="username"
               value="{{ old('username', $user->username) }}"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name"
               value="{{ old('full_name', $user->full_name ?? $user->name) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"
               value="{{ old('email', $user->email) }}"><br><br>

        <label>Profile Picture:</label><br>
        <input type="file" name="avatar" accept="image/*"><br>
        <small>Image only, maximum 2MB.</small><br><br>

        <button type="submit">Update User</button>
    </form>

    <br>
    <a href="{{ route('users.index') }}">Back to Users</a>
</body>
</html>