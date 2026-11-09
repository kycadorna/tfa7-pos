<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>
    <h1>Create Customer</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="{{ old('full_name') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <button type="submit">Save Customer</button>
    </form>

    <br>
    <a href="{{ route('customers.index') }}">Back to Customers</a>
</body>
</html>