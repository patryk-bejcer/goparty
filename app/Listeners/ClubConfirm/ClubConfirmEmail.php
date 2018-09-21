<?php

namespace App\Listeners\ClubConfirm;

use App\Events\ClubConfirm;
use App\Mail\User\ClubConfirm as ClubConfirmMail;
use Illuminate\Support\Facades\Mail;

class ClubConfirmEmail
{

	/**
	 * Handle the event.
	 *
	 * @param ClubConfirm $event
	 *
	 * @return void
	 */
    public function handle(ClubConfirm $event)
    {
        //Mail::to($event->user->email)->sendNow(new ClubConfirmMail($event->club));
    }
}
