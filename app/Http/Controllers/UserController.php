<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class UserController extends Controller {
        /**
         * * Seed Model.
         * @var \App\Models\User
         */
        public $model = \App\Models\User::class;

        /**
         * * Create a new controller instance.
         * @return void
         */
        public function __construct () {
            // $this->middleware('auth');
        }

        /**
         * * Display a listing of the resource.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @return \Illuminate\Http\Response
         */
        public function index (Request $request, string $role) {
            $users = $this->model::byRole($role)->get();

            return view('user.list', [
                'users' => $users,
            ]);
        }

        /**
         * * Display the specified resource.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function details (Request $request, string $slug) {
            $user = $this->model::bySlug($slug);

            return view('user.details', [
                'user' => $user,
            ]);
        }

        /**
         * * Show the form for creating a new resource.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @return \Illuminate\Http\Response
         */
        public function create (Request $request, string $role) {
            return view('user.create', [
                'role' => $role,
            ]);
        }

        /**
         * * Store a newly created resource in storage.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @return \Illuminate\Http\Response
         */
        public function store (Request $request, string $role) {
            return redirect()->route('user.details');
        }

        /**
         * * Display the specified resource.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function show (Request $request, string $role, string $slug) {
            $user = $this->model::bySlug($slug);

            return view('user.show', [
                'user' => $user,
            ]);
        }

        /**
         * * Update the specified resource in storage.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function update (Request $request, string $role, string $slug) {
            return redirect()->route('user.details');
        }

        /**
         * * Remove the specified resource from storage.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function destroy (Request $request, string $role, string $slug) {
            return redirect()->route('user.list');
        }
    }