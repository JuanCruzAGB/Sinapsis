<?php
    namespace App\Http\Controllers;

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
            // $this->middleware('auth');
        }

        /**
         * * Display a listing of the resource.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function index (Request $request) {
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
            return view('exam.create');
        }

        /**
         * * Store a newly created resource in storage.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store (Request $request) {
            return redirect()->route('exam.details');
        }

        /**
         * * Display the specified resource.
         * @param \Illuminate\Http\Request $request
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function show (Request $request, string $slug) {
            $exam = $this->model::bySlug($id_exam);

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
            return redirect()->route('exam.details');
        }

        /**
         * * Remove the specified resource from storage.
         * @param \Illuminate\Http\Request $request
         * @param string $slug
         * @return \Illuminate\Http\Response
         */
        public function destroy (Request $request, string $slug) {
            return redirect()->route('exam.list');
        }
    }