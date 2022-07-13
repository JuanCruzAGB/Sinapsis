<?php
    namespace App\Http\Controllers;

    use Auth;
    use Illuminate\Http\Request;

    class ExamController extends Controller {
        /**
         * * Seed Model.
         * @var \App\Models\Exam
         */
        public $model = \App\Models\Exam::class;

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
         * @return \Illuminate\Http\Response
         */
        public function index (Request $request) {
            if (!isset(Auth::user()->role->actions['read']) || !in_array('exam', Auth::user()->role->actions['read'])) {
                abort(403, 'You can not access here');
            }

            $exams = $this->model::all();

            return view('exam.list', [
                'exams' => $exams,
            ]);
        }

        /**
         * * Show the form for creating a new resource.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function create (Request $request) {
            if (!isset(Auth::user()->role->actions['create']) || !in_array('exam', Auth::user()->role->actions['create'])) {
                abort(403, 'You can not access here');
            }

            return view('exam.create');
        }

        /**
         * * Store a newly created resource in storage.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store (Request $request) {
            if (!isset(Auth::user()->role->actions['create']) || !in_array('exam', Auth::user()->role->actions['create'])) {
                abort(403, 'You can not access here');
            }

            ddd($request);

            return redirect()->route('exam.details');
        }

        /**
         * * Display the specified resource.
         * @param \Illuminate\Http\Request $request
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function show (Request $request, string $slug) {
            if (!isset(Auth::user()->role->actions['update']) || !in_array('exam', Auth::user()->role->actions['update'])) {
                abort(403, 'You can not access here');
            }

            $exam = $this->model::bySlug($slug);

            return view('exam.show', [
                'exam' => $exam,
            ]);
        }

        /**
         * * Update the specified resource in storage.
         * @param \Illuminate\Http\Request $request
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function update (Request $request, string $slug) {
            if (!isset(Auth::user()->role->actions['update']) || !in_array('exam', Auth::user()->role->actions['update'])) {
                abort(403, 'You can not access here');
            }

            ddd($request);

            return redirect()->route('exam.details');
        }

        /**
         * * Remove the specified resource from storage.
         * @param \Illuminate\Http\Request $request
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function destroy (Request $request, string $slug) {
            if (!isset(Auth::user()->role->actions['delete']) || !in_array('exam', Auth::user()->role->actions['delete'])) {
                abort(403, 'You can not access here');
            }

            ddd($request);

            return redirect()->route('exam.list');
        }
    }