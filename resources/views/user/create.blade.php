@extends('layouts.panel')

@section('title')
    Create {{ $role }} | Panel | {{ config('app.name') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/user/create.css') }}">
@endsection

@section('content')
    <li id="users" class="tab-content opened">
        <section class="grid gap-4">
            <header class="content-title">
                <h2>User</h2>
            </header>

            <main class="content-form pb-4 mx-4">
                <form class="rounded px-8 pt-6 pb-8 mb-4" action="/users/create" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('POST')

                    <main class="grid lg:grid-cols-2 gap-4">
                        @if ($role == "associated")                      
                            <section class="input-group grid lg:col-span-2 gap-4">
                              <label for="name" class="input-name block text-gray-700 text-sm mb-0">
                                Name
                              </label>
                              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" value="{{ old('name') }}">
                              <span class="Work-Sans support support-box support-name {{ !$errors->has("name") ? "hidden" : "visible" }}">
                                @if($errors->has("name"))
                                    {{ $errors->first("name") }}
                                @endif
                            </span>
                            </section>

                            <section class="input-group grid lg:col-span-2 gap-4">
                              <label class="input-name block text-gray-700 text-sm mb-0" for="benchmark">
                                Benchmark
                              </label>
                              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="benchmark" type="text" placeholder="Benchmark" value="{{ old('benchmark') }}">
                              <span class="Work-Sans support support-box support-name {{ !$errors->has("benchmark") ? "hidden" : "visible" }}">
                                @if($errors->has("benchmark"))
                                    {{ $errors->first("benchmark") }}
                                @endif
                            </section>

                            <section class="input-group grid lg:col-span-2 gap-4">
                              <label class="input-name block text-gray-700 text-sm mb-0" for="phone">
                                Phone
                              </label>
                              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="Phone" value="{{ old('phone') }}">
                              <span class="Work-Sans support support-box support-name {{ !$errors->has("phone") ? "hidden" : "visible" }}">
                                @if($errors->has("phone"))
                                    {{ $errors->first("phone") }}
                                @endif
                            </section>

                            <section class="input-group grid lg:col-span-2 gap-4">
                              <label class="input-name block text-gray-700 text-sm mb-0" for="email">
                                Email
                              </label>
                              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" value="{{ old('email') }}">
                              <span class="Work-Sans support support-box support-name {{ !$errors->has("email") ? "hidden" : "visible" }}">
                                @if($errors->has("email"))
                                    {{ $errors->first("email") }}
                                @endif
                            </section>

                            <section class="input-group grid lg:col-span-2 gap-4">
                              <label class="input-name block text-gray-700 text-sm mb-0" for="adress">
                                Adress
                              </label>
                              <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adress" type="text" placeholder="Adress" value="{{ old('adress') }}">
                              <span class="Work-Sans support support-box support-name {{ !$errors->has("adress") ? "hidden" : "visible" }}">
                                @if($errors->has("adress"))
                                    {{ $errors->first("adress") }}
                                @endif
                            </section>

                            <section class="input-group grid lg:col-span-2 gap-4">
                                <label class="input-name block text-gray-700 text-sm mb-0" for="adress">
                                    Category
                                  </label>
                                <select class="block appearance-none w-full border border-gray-200 text-gray-500 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-category">
                                    <option>Base</option>
                                    <option>affiliates</option>
                                    <option>Members</option>
                                    <option>Center</option>
                                    <option>Inbuilt</option>
                                </select>
                            </section>


                            <section class="input-group grid lg:col-span-2 gap-4 flex">
                                <button type="submit" class="form-submit mt-5 items-center">
                                    <span>Confirm</span>
                                </button>
                            </section>

                        <section class="input-group grid lg:col-span-2 gap-4">
                            {{-- <label for="property-name" class="input-name Work-Sans">Nombre:</label>

                            <input class="form-input input-field" type="text" name="name" id="property-name" placeholder="Example" value="{{ old('name') }}">
                            
                            <span class="Work-Sans support support-box support-name {{ !$errors->has("name") ? "hidden" : "visible" }}">
                                @if($errors->has("name"))
                                    {{ $errors->first("name") }}
                                @endif
                            </span> --}}
                        </section>
                        @endif                        
                    </main>
                </form>
            </main>
        </section>
    </li>
@endsection

@section('js')
    <script type="module" src="{{ asset('js/user/create.js') }}"></script>
@endsection