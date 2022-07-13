@extends("layouts.app")

@section("head")
    {{-- Layout CSS --}}
    <link rel="stylesheet" href="{{ asset('css/layouts/default.css') }}">

    {{-- Section CSS --}}
    @yield("css")

    <title>@yield("title")</title>
@endsection

@section("extras")
    {{-- Layout JS --}}
    <script type="module" src="{{ asset('js/layouts/default.js') }}"></script>

    {{-- Section JS --}}
    @yield("js")
@endsection