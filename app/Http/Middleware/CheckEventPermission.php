<?php

namespace App\Http\Middleware;

use App\Club;
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


//	    var_dump($request->club->id);
//	    var_dump(Auth::id());
//	    var_dump($eventExists);
//	    exit;

	    if ( ! Auth::check()) {
		    abort(403, 'Brak dostępu');
	    }
        if( Auth::user()->hasRole('admin')){
	        return $next($request);
        }
        if( ! Auth::user()->hasRole('owner')){
	        abort(403, 'brak dostepu');
        }
	    return $next($request);
    }
}
