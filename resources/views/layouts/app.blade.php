<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <title>{{ __('messages.task_manager') }}</title>

    <!-- Scripts -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
        integrity="sha384-2tERh8OqJZCsnKoCZUhNgnrmZ/fvPpeLh6iwObfbPYAlDmyRPmJBygGE4cG1XK3y"
        crossorigin="anonymous">
    <script
        src="https://cdn.jsdelivr.net/npm/rails-ujs@5.2.8-1/lib/assets/compiled/rails-ujs.min.js"
        integrity="RqkX8GJYfMdGNXE2DrpYOzDYZkDGyzNsD3HHAz1ck6MqNevW0sC8cFCgmEDXwbKk"
        crossorigin="anonymous">
    </script>
    <link
        rel="preload"
        as="style"
        href="https://php-task-manager-ru.hexlet.app/build/assets/app.4885a691.css"
    />
    <link
        rel="modulepreload"
        href="https://php-task-manager-ru.hexlet.app/build/assets/app.42df0f0d.js"
    />
    <link
        rel="stylesheet"
        href="https://php-task-manager-ru.hexlet.app/build/assets/app.4885a691.css"
    />
    <script
        type="module"
        src="https://php-task-manager-ru.hexlet.app/build/assets/app.42df0f0d.js"
        integrity="aC1sLDHLgLiXMuiFeR3M4CmgZTr3l/GH5nBh4jzdmoTW/DbuvXqrHwnMPvJdjRP4"
        crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('partials.header')
        <main class="max-w-screen-xl mx-auto px-4 pt-4">
            @include('flash::message')
            @yield('content')
        </main>
    </div>
</body>
</html>
