@extends('layouts.panel')

@section('title')
    Something | Panel | {{ config('app.name') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/list.css') }}">
@endsection

@section('tab-content-list')
    <li id="users" class="tab-content opened">
        <section class="grid gap-4">
            <header class="content-title">
                <h2>Users</h2>
            </header>

            <main class="content-table">
                <section>
                    <table class="table grid gap-4">
                        <tbody class="flex flex-wrap gap-4">
                            <tr class="flex gap-4">
                                <td>Something</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </main>
        </section>
    </li>
@endsection

@section('js')
    <script>
        const properties = @json($properties);
    </script>

    <script type="module" src="{{ asset('js/user/list.js') }}"></script>
@endsection