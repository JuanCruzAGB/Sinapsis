@extends("layouts.app")

@section("head")
    {{-- Layout CSS --}}
    <link rel="stylesheet" href="{{ asset('css/layouts/panel.css') }}">

    {{-- Section CSS --}}
    @yield("css")

    <title>@yield("title")</title>
@endsection

@section("body")
    <main id="panel-tab-menu" class="tab-menu vertical">
        <header class="tab-header md:hidden">
            <a href="#panel-sidebar" class="sidebar-button panel-sidebar open left">
                <i class="fas fa-bars"></i>
            </a>

            <a href="/home">
                <img src="{{ asset('img/resources/logo/01-white.png') }}" 
                    alt="Path Logo"/>

                <h1 class="hidden">Path</h1>
            </a>
        </header>

        @component('components.sidebars.panel', [
            'role' => $role,
        ])@endcomponent

        <section class="tab-content-list">
            <ul class="list overflow-x-hidden">
                @yield("content")
            </ul>
        </section>
    </main>
@endsection

@section("extras")
    {{-- Layout JS --}}
    <script type="module" src="{{ asset('js/layouts/panel.js') }}"></script>

    {{-- Section JS --}}
    @yield("js")
@endsection