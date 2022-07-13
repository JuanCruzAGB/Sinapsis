@extends('layouts.panel')

@section('title')
    {{ ucfirst($role) }} | Users list | Panel | {{ config('app.name') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/list.css') }}">
@endsection

@section('content')
    <li id="users" class="tab-content opened">
        <section class="grid gap-4">
            <header class="content-title">
                <h2 class="text-uppercase text-left mt-4 mb-3 px-2 px-md-0">Candidates</h2>
            </header>

            <main class="content-table">
                <section>
                    {{-- <div class="pointer-events mx-0 mb-3 px-2 px-md-0 d-flex align-items-center">
                        <p class="filter-title mb-0 mr-3">Order by:</p>
                        <button type="button" data-by="created_at" data-type="ASC" class="filter-candidates filter-order btn btn-two mr-3">
                            <span class="btn-text">Date</span>
                            <i class="filter-icon fas fa-chevron-down"></i>
                        </button>
                        <button type="button" data-by="full_name" data-type="DESC" class="filter-candidates filter-order btn btn-two">
                            <span class="btn-text">Name</span>
                            <i class="filter-icon fas fa-chevron-down"></i>
                        </button>
                    </div> --}}
                </section>
                <section class="table table-wrapper col-lg-6 mx-2 mx-md-4 mx-lg-0 mb-4 pr-lg-0">
                    <table class="table">
                        @if ($role == "candidate")
                        <thead>
                            <tr>
                              <th>Nombre inst.</th>
                              <th>Referente</th>
                              <th>Celular</th>
                              <th>Email</th>
                              <th>Dirección</th>
                              <th>Afiliados</th>
                            </tr>
                          </thead>
                        <tbody>
                       
                        <tr data-id_candidate="1">                            
                            <td class="table-icon">Santa rosa</td>
                            <td class="candidate_number">Pepe</td>
                            <td class="candidate_number">1159329312</td>
                            <td class="candidate_number">nosoybatman@gmail.com</td>
                            <td class="candidate_number">Calle falsa 123</td>
                            <td class="candidate_number">Los drogueta</td>
                            <td>w</td>
                            <td>d</td>
                        </tr>
                        @endif 

                        @if ($role == "associated")
                        <thead>
                            <tr>
                              <th>N° de candidato</th>
                              <th>Nombre completo</th>
                              <th>Fecha de nacimiento</th>
                              <th>País de residencia</th>
                              <th>Nivel</th>
                            </tr>
                          </thead>
                        <tbody>
                        <tr data-id_candidate="1">
                            <td class="candidate_number">1</td>
                            <td class="candidate_number">Pepe Diaz</td>
                            <td class="candidate_number">1/3/2016</td>
                            <td class="candidate_number">Argentina</td>
                            <td class="candidate_number">10</td>
                            <td>w</td>
                            <td>d</td>
                        </tr>
                        @endif 
                           
                        </tbody>
                    </table>
                    <div class="filter-pagination">
                        <div class="paginationjs">
                            <div class="paginationjs-pages">
                                <ul>
                                    <li class="paginationjs-page J-paginationjs-page active" data-num="1">
                                        <a>1</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </section>
    </li>
@endsection

@section('js')
    <script>
        const users = [];
    </script>

    <script type="module" src="{{ asset('js/user/list.js') }}"></script>
@endsection