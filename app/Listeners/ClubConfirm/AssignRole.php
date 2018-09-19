<?php

namespace App\Listeners\ClubConfirm;

use App\Events\ClubConfirm;

class AssignRole
{
    /**
     * Handle the event.
     *
     * @param  ClubConfirm  $event
     * @return void
     */
    public function handle(ClubConfirm $event)
    {
	    if ( ! $event->user->hasRole( 'owner' ) ) {
		    $event->user->assignRole( 'owner' );
	    }
    }
}
