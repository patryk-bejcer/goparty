<?php

namespace App\Listeners\ClubCreated;

use App\Events\ClubCreated;
use App\Mail\Admin\ClubCreate as ClubCreateAdmin;
use App\Mail\User\ClubCreate;
use Illuminate\Support\Facades\Mail;

class ClubCreateEmail {

	/**
	 * Handle the event.
	 *
	 * @param  object $event
	 *
	 * @return void
	 */
	public function handle( ClubCreated $event ) {
		Mail::to( $event->user->email )->sendNow( new ClubCreate( $event->club ) );
		Mail::to(env('MAIL_ADMIN'))->sendNow(new ClubCreateAdmin($event->club));
	}
}
