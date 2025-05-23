<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <!-- Tailwind CSS
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <title>{{ __('messages.task_manager') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/rails-ujs@5.2.8-1/lib/assets/compiled/rails-ujs.min.js"></script>
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
        <main class="max-w-screen-xl mx-auto px-4 pt-4">
            @include('flash::message')
            @yield('content')
        </main>
    </div>
</body>
</html>
