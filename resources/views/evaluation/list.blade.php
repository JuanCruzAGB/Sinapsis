@extends('layouts.default')

@section('title')
    Evaluations list | {{ config('app.name') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/evaluation/list.css') }}">
@endsection

@section('body')
    <section class="grid gap-4">
        <header class="content-title">
            <h2>Evaluations</h2>
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
@endsection

@section('js')
    <script>
        const evaluations = [];
    </script>

    <script type="module" src="{{ asset('js/evaluation/list.js') }}"></script>
@endsection