<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsUserController extends Controller
{

	public function allEvents()
	{
		echo 'all.events';
	}

    public function clubEvents()
    {
	    echo 'single.club.events';
    }

    public function singleEvent($id)
    {
	    echo 'single.event';
    }

}
