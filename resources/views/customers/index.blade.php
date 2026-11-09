<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
</head>
<body>
    <h1>Customer Accounts</h1>

    <a href="/customers/create">Create Customer</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach ($customers as $customer)
        <hr>
        <h3>{{ $customer->full_name }}</h3>
        <p>Email: {{ $customer->email }}</p>
        <a href="/customers/{{ $customer->id }}/edit">Edit</a>
    @endforeach
</body>
</html>