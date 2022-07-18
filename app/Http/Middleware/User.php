<?php
    namespace App\Http\Middleware;

    use Auth;
    use Closure;

    class User {
        /**
         * * Seed Model.
         * @var \App\Models\User
         */
        public $model = \App\Models\User::class;

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

            abort(404, "User \"$request->slug\" not found");
        }
    }