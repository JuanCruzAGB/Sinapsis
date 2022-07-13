<?php
    namespace App\Http\Controllers;

    use Auth;
    use Illuminate\Http\Request;

    class EvaluationController extends Controller {
        /**
         * * Seed Model.
         * @var \App\Models\Evaluation
         */
        public $model = \App\Models\Evaluation::class;

        /**
         * * Create a new controller instance.
         * @return void
         */
        public function __construct () {
            $this->middleware([]);
        }

        /**
         * * Display a listing of the resource.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function index (Request $request) {
            switch (Auth::user()->id_role) {
                case 0:
                    $evaluations = $this->model::qualified()->get();
                    break;

                case 1:
                    $evaluations = $this->model::qualified()->createdBy(Auth::user()->id_user)->get();
                    break;

                case 2:
                    $evaluations = $this->model::notQualified()->get();
                    break;

                case 3:
                    $evaluations = $this->model::all();
                    break;
            }

            return view('evaluation.list', [
                'evaluations' => $evaluations,
            ]);
        }

        /**
         * * Update the specified resource in storage.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function update (Request $request) {
            if (!in_array('grade', Auth::user()->role->actions)) {
                abort(403, 'You can not access here');
            }

            ddd($request);

            return redirect()->route('user.details');
        }
    }