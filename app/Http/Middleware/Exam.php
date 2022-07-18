<?php
    namespace App\Http\Middleware;

    use Auth;
    use Closure;

    class Exam {
        /**
         * * Seed Model.
         * @var \App\Models\Exam
         */
        public $model = \App\Models\Exam::class;

        /**
         * * Handle an incoming request.
         * @param \Illuminate\Http\Request $request
         * @param \Closure $next
         * @return mixed
         */
        public function handle ($request, Closure $next) {
            if ($this->model::bySlug($request->slug)) {
                return $next($request);
            }

            abort(404, "Exam \"$request->slug\" not found");
        }
    }