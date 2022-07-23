<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
