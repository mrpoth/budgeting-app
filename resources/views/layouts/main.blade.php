<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>My Budget</title>
</head>
<body>
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item"><a class="nav-link" href="/">Main</a></li>
            <li class="nav-item"><a class="nav-link" href="/incomes">Incomes</a></li>
            <li class="nav-item"><a class="nav-link" href="/expenses">Expenses</a></li>
        </ul>
    @yield('body')
</body>
</html>
