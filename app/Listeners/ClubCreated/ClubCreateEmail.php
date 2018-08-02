<?php

namespace App\Listeners\ClubCreated;

use App\Events\ClubCreated;
use App\Mail\ClubCreate;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClubCreateEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(ClubCreated $event)
    {
        Mail::to($event->user->email)->sendNow(new ClubCreate($event->club));
    }
}
