<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta --}}
        <meta name="asset" content="{{ asset("") }}">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        {{-- App CSS --}}
        <link href="{{ asset('css/app.css?v1') }}" rel="stylesheet">

        {{-- Global layout CSS --}}
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        {{-- Section CSS --}}
        @yield("head")

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        @yield("body")

        {{-- JQuery --}}
        <script src="{{ asset('js/mdb/jquery.min.js') }}"></script>

        {{-- App modules --}}
        <script src="{{ asset('js/app.js') }}"></script>

        {{-- Global layout JS --}}
        <script type="module" src="{{ asset('js/script.js') }}"></script>

        {{-- Added extras section --}}
        @yield("extras")
    </body>
</html>