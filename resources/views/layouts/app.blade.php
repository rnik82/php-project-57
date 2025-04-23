<body>
@include('partials.header')
    <main>
        @yield('content')
    </main>
@include('flash::message')
</body>
