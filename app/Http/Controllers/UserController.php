<?php
    namespace App\Http\Controllers;

    use Auth;
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
            $this->middleware([ 'auth', ]);
        }

        /**
         * * Display a listing of the resource.
         * @param \Illuminate\Http\Request $request
         * @param string $role
         * @return \Illuminate\Http\Response
         */
        public function index (Request $request, string $role) {
            if (!isset(Auth::user()->role->actions['read']) || !in_array($role, Auth::user()->role->actions['read'])) {
                abort(403, 'You can not access here');
            }

            switch (Auth::user()->id_role) {
                case 1:
                    $users = $this->model::byRole($role)->createdBy(Auth::user()->id_user)->get();
                    break;

                case 3:
                    $users = $this->model::byRole($role)->get();
                    break;
            }

            return view('user.list', [
                'role' => $role,
                'users' => $users,
                'role' => $role,
            ]);
        }

        /**
         * * Display the specified resource.
         * @param \Illuminate\Http\Request $request
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function details (Request $request, string $slug) {
            $user = $this->model::bySlug($slug);

            if (!isset(Auth::user()->role->actions['update']) || !in_array('profile', Auth::user()->role->actions['update']) || (Auth::user()->id_role == 1 && Auth::user()->slug != $slug)) {
                abort(403, 'You can not access here');
            }

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
            if (!isset(Auth::user()->role->actions['create']) || !in_array($role, Auth::user()->role->actions['create'])) {
                abort(403, 'You can not access here');
            }

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
            if (!isset(Auth::user()->role->actions['create']) || !in_array($role, Auth::user()->role->actions['create'])) {
                abort(403, 'You can not access here');
            }

            ddd($request);

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

            if (!isset(Auth::user()->role->actions['update']) || !in_array($role, Auth::user()->role->actions['update']) || (Auth::user()->id_role == 1 && Auth::user()->id_user != $user->id_created_by)) {
                abort(403, 'You can not access here');
            }

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
            $user = $this->model::bySlug($slug);

            if (!isset(Auth::user()->role->actions['update']) || !in_array($role, Auth::user()->role->actions['update']) || (Auth::user()->id_role == 1 && Auth::user()->id_user != $user->id_created_by)) {
                abort(403, 'You can not access here');
            }

            ddd($request);

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
            if (!isset(Auth::user()->role->actions['delete']) || !in_array($slug, Auth::user()->role->actions['delete'])) {
                abort(403, 'You can not access here');
            }

            ddd($request);

            return redirect()->route('user.list');
        }
    }