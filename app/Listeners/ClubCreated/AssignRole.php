<?php

namespace App\Listeners\ClubCreated;

use App\Events\ClubCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClubCreated  $event
     * @return void
     */
    public function handle(ClubCreated $event)
    {
	    if ( ! $event->user->hasRole( 'owner' ) ) {
		    $event->user->assignRole( 'owner' );
	    }


    }
}
