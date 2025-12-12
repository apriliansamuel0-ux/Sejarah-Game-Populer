<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('header', 'Dashboard')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        header {
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        header h2 {
            margin: 0;
            font-size: 24px;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        /* Tombol */
        .btn {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            user-select: none;
            border: none;
        }
        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }
        .btn-edit {
            background-color: #3b82f6;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-delete {
            background-color: #ef4444;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        /* Tabel */
        table.crud-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table.crud-table th,
        table.crud-table td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        table.crud-table thead tr {
            background-color: #3b82f6;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h2>@yield('header', 'Dashboard')</h2>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
