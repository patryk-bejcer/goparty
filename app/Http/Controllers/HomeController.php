<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = User::find(3);

        return view('site.home', compact('user'));
    }

	public function send()
	{
		Log::info("Request Cycle with Queues Begins");
		$this->dispatch((new SendWelcomeEmail())->delay(60 * 5));
		Log::info("Request Cycle with Queues Ends");
	}

//	public function send()
//	{
//		Log::info("Request cycle without Queues started");
//		Mail::send('emails.welcome', ['data'=>'data'], function ($message) {
//
//			$message->from('me@gmail.com', 'Christian Nwmaba');
//
//			$message->to('patryk.bejcer@gmail.com');
//
//		});
//		Log::info("Request cycle without Queues finished");
//	}

}
