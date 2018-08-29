<?php

namespace App\Http\Middleware;

use function abort;
use Closure;
use function dd;
use Illuminate\Support\Facades\Auth;
use function var_dump;

class UserDashboard {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next ) {

		if ( Auth::id() != $request->userId && !Auth::user()->hasRole('admin')) {
			abort( '403', 'Brak uprawnień do przeglądania tej strony' );
		}

		return $next( $request );
	}
}
