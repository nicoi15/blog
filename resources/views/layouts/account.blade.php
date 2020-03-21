<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.head')
</head>
<body>
    @include('components.header')
    @include('accounts.users.account')
        
    @include('components.footer')
    @include('components.script')
</body>
</html>
