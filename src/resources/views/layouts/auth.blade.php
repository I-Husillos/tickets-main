<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary shadow">

            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
