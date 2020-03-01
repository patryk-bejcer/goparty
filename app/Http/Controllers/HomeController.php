<?php

namespace App\Http\Controllers;

use App\Club;
use App\Event;
use App\Jobs\SendWelcomeEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller {
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$user   = User::find( 3 );
		$clubs  = Club::all();
		$events = Event::where( 'start_date', '>=', Carbon::today() )->get();

		return view( 'site.home', compact( 'user', 'clubs', 'events' ) );
	}

	public function send() {
		Log::info( "Request Cycle with Queues Begins" );
		$this->dispatch( ( new SendWelcomeEmail() )->delay( 60 * 5 ) );
		Log::info( "Request Cycle with Queues Ends" );
	}

}
