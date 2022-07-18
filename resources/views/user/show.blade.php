@extends('layouts.panel')

@section('title')
    {{ ucfirst($user->fullName) }} | Show | Panel | {{ config('app.name') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/show.css') }}">
@endsection

@section('content')
    <li id="users" class="tab-content opened">
        <section class="grid gap-4">
            <header class="content-title">
                <h2>User</h2>
            </header>

            <main class="content-form pb-4 mx-4">
                <form action="/users/show" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('POST')

                    <main class="grid lg:grid-cols-2 gap-4">
                        <section class="input-group grid lg:col-span-2 gap-4">
                            <label for="property-name" class="input-name Work-Sans">Nombre:</label>

                            <input class="form-input input-field" type="text" name="name" id="property-name" placeholder="Example" value="{{ old('name') }}">
                            
                            <span class="Work-Sans support support-box support-name {{ !$errors->has("name") ? "hidden" : "visible" }}">
                                @if($errors->has("name"))
                                    {{ $errors->first("name") }}
                                @endif
                            </span>
                        </section>

                        <section class="text-center xl:text-right lg:col-start-2">
                            <button type="submit" class="form-submit property-form btn btn-background btn-red py-2 px-4">
                                <span>Confirmar</span>
                            </button>
                        </section>
                    </main>
                </form>
            </main>
        </section>
    </li>
@endsection

@section('js')
    <script>
        const user = {};
    </script>

    <script type="module" src="{{ asset('js/user/show.js') }}"></script>
@endsection