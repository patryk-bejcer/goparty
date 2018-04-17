<?php

namespace App\Http\Middleware;

use App\Models\Club;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEventPermission
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
	    $eventExists = Club::where([
		    'id' => $request->club_id,
		    'user_id' => Auth::id(),
	    ])->exists();

//	    var_dump($request->club->id);
//	    var_dump(Auth::id());
//	    var_dump($eventExists);
//	    exit;

	    if ( ! Auth::check() || ! $eventExists && ! Auth::user()->hasRole('admin')) {
		    abort(403, 'Brak dostępu');
	    }


	    return $next($request);
    }
}
