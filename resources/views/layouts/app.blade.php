<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.head')
</head>
<body>
    @include('components.header')
        <main>
            @yield('content')
        </main>
    @include('components.footer')
    @include('components.script')
</body>
</html>