<?php
    namespace App\Http\Controllers;

    use App\Models\Evaluation;
    use Auth;
    use Illuminate\Http\Request;

    class CartController extends Controller {
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
            if (!in_array('pay', Auth::user()->role->actions)) {
                abort(403, 'You can not access here');
            }

            $cart = [];

            return view('cart', [
                'cart' => $cart,
            ]);
        }

        /**
         * * Update the specified resource in storage.
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function update (Request $request) {
            if (!isset(Auth::user()->role->actions['update']) || !in_array('currency', Auth::user()->role->actions['update'])) {
                abort(403, 'You can not access here');
            }

            ddd($request);

            return redirect()->route('user.details');
        }
    }