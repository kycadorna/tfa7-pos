<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Membership Management')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 35px 20px;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #bbf7d0, transparent 25%),
                radial-gradient(circle at bottom right, #c7d2fe, transparent 28%),
                linear-gradient(135deg, #f0fdf4, #f8fafc, #eef2ff);
            font-family: Arial, sans-serif;
            color: #1f2937;
        }

        .site-header {
            max-width: 980px;
            margin: 0 auto 35px;
            padding: 25px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            border-radius: 16px;
            background: linear-gradient(135deg, #166534, #22c55e);
            color: white;
            box-shadow: 0 8px 20px #16653444;
        }

        .site-header h1 {
            margin: 0;
            color: white;
            font-size: 34px;
        }

        .site-header p {
            margin: 8px 0 0;
            color: #dcfce7;
        }

        .header-button,
        .button {
            display: inline-block;
            padding: 11px 17px;
            border: none;
            border-radius: 8px;
            background: #166534;
            color: white;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .header-button {
            background: white;
            color: #166534;
        }

        .header-button:hover {
            background: #dcfce7;
        }

        .page-container {
            max-width: 980px;
            margin: auto;
        }

        .card {
            margin-bottom: 25px;
            padding: 28px;
            border-radius: 16px;
            background: #ffffffee;
            box-shadow: 0 10px 25px #64748b22;
        }

        .card h2 {
            margin-top: 0;
            color: #1e3a8a;
        }

        .success-message {
            padding: 14px 18px;
            margin-bottom: 22px;
            border-left: 5px solid #22c55e;
            border-radius: 8px;
            background: #ecfdf3;
            color: #166534;
            font-weight: bold;
            text-align: center;
        }

        .search-form {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 10px;
            margin-bottom: 22px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #f8fafc;
            font-size: 15px;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #22c55e;
            background: white;
            box-shadow: 0 0 0 3px #bbf7d0;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #334155;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .button-secondary {
            background: #64748b;
        }

        .button-warning {
            background: #d97706;
        }

        .button-danger {
            background: #dc2626;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            background: white;
        }

        th {
            padding: 14px;
            background: #166534;
            color: white;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f0fdf4;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .profile-row {
            display: flex;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .profile-label {
            font-weight: bold;
            color: #475569;
        }

        .error-message {
            margin-bottom: 15px;
            color: #dc2626;
        }

        @media (max-width: 700px) {
            .site-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .page-container {
                overflow-x: auto;
            }

            table {
                min-width: 750px;
            }

            .profile-row {
                display: block;
            }
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div>
            <h1>Membership Management</h1>
            <p>Manage members and membership levels.</p>
        </div>

        <a href="{{ route('members.index') }}" class="header-button">
            All Members
        </a>
    </header>

    <main class="page-container">
        @yield('content')
    </main>
</body>
</html>