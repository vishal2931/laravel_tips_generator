<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? env("APP_NAME") }}</title>
        @vite('resources/css/app.css')
        <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    </head>
    <body>
        {{ $slot }}
    </body>
    @yield('custom_javascript')
</html>
