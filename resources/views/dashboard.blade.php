@extends('layouts.default')

@section('title')
    Dashboard | {{ config('app.name') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('body')
    @if (array_search(Auth::user()->id_user, [ 1, 2, ]) !== false)
        <h1>Administradores</h1>
        <ul>
            <li><a href="/users/administrator/list">Lista</a></li>
            <li><a href="/users/administrator/create">Crear</a></li>
            <li><a href="/users/administrator/{{ \App\Models\User::administrators()->get()->random()->slug }}/show">Ver / Editar</a></li>
        </ul>
    @endif
    <h1>Correctores</h1>
    <ul>
        <li><a href="/users/corrector/list">Lista</a></li>
        <li><a href="/users/corrector/create">Crear</a></li>
        <li><a href="/users/corrector/{{ \App\Models\User::correctors()->get()->random()->slug }}/show">Ver / Editar</a></li>
    </ul>
    <h1>Adheridos</h1>
    <ul>
        <li><a href="/users/associated/list">Lista</a></li>
        <li><a href="/users/associated/create">Crear</a></li>
        <li><a href="/users/associated/{{ \App\Models\User::associates()->get()->random()->slug }}/show">Ver / Editar</a></li>
        <li><a href="/users/{{ \App\Models\User::associates()->get()->random()->slug }}/profile">Perfíl</a></li>
    </ul>
    <h1>Candidatos</h1>
    <ul>
        <li><a href="/users/candidate/list">Lista</a></li>
        <li><a href="/users/candidate/create">Crear</a></li>
        <li><a href="/users/candidate/{{ \App\Models\User::candidates()->get()->random()->slug }}/show">Ver / Editar</a></li>
    </ul>
    <h1>Exámenes</h1>
    <ul>
        <li><a href="/exams/list">Lista</a></li>
        <li><a href="/exams/create">Crear</a></li>
        <li><a href="/exams/{{ \App\Models\Exam::get()->random()->slug }}/show">Ver / Editar</a></li>
    </ul>
    <h1>Landings</h1>
    <ul>
        <li><a href="/evaluations/list">Evaluaciones lista</a></li>
        <li><a href="/cart">Carrito</a></li>
    </ul>
@endsection

@section('js')
    <script>
        const evaluations = [];
    </script>

    <script type="module" src="{{ asset('js/dashboard.js') }}"></script>
@endsection