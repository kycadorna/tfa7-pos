<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('customers.update', $customer) }}">
        @csrf
        @method('PUT')

        <label>Full Name:</label><br>
        <input type="text" name="full_name"
               value="{{ old('full_name', $customer->full_name) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email"
               value="{{ old('email', $customer->email) }}"><br><br>

        <button type="submit">Update Customer</button>
    </form>

    <br>
    <a href="{{ route('customers.index') }}">Back to Customers</a>
</body>
</html>