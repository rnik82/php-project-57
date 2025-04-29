<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="YckZ778BwICEkkKWKjMCBHxwGybWUUIoeF1e7XYP">
    <meta name="csrf-param" content="_token" />

    <title>Менеджер задач</title>

    <!-- Scripts -->
    <link rel="preload" as="style" href="https://php-task-manager-ru.hexlet.app/build/assets/app.4885a691.css" />
    <link rel="modulepreload" href="https://php-task-manager-ru.hexlet.app/build/assets/app.42df0f0d.js" />
    <link rel="stylesheet" href="https://php-task-manager-ru.hexlet.app/build/assets/app.4885a691.css" />
    <script type="module" src="https://php-task-manager-ru.hexlet.app/build/assets/app.42df0f0d.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('partials.header')
        <!-- flash-сообщения -->
        @if(session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')

    </div>
</body>
</html>
