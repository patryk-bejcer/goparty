<?php

namespace App\Http\Middleware;

use App\Club;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckClubPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	// Check if club exist //
	    $clubExists = Club::where([
		    'id' => $request->club->id,
		    'user_id' => Auth::id(),
	    ])->exists();

//	    var_dump($request->club->id);
//	    var_dump(Auth::id());
//	    var_dump($clubExists);
//	    exit;

	    if ( ! Auth::check() || ! $clubExists && ! Auth::user()->hasRole('admin')) {
		    abort(403, 'Brak dostępu');
	    }


	    return $next($request);
    }
}
