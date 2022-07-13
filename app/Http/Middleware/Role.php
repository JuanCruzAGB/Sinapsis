<?php
    namespace App\Http\Middleware;

    use Auth;
    use Closure;

    class Role {
        /**
         * * Handle an incoming request.
         * @param \Illuminate\Http\Request $request
         * @param \Closure $next
         * @return mixed
         */
        public function handle ($request, Closure $next) {
            switch ($request->role) {
                case 'candidate':
                case 'associated':
                case 'corrector':
                case 'administrator':
                    return $next($request);
            }

            abort(404, "Role \"$request->role\" not found");
        }
    }