<?php

namespace App\Listeners\ClubCreated;

use App\Events\ClubCreated;
use App\Mail\ClubCreate as ClubCreateUser;
use App\Mail\Admin\ClubCreate as ClubCreateAdmin;
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
        Mail::to($event->user->email)->sendNow(new ClubCreateUser($event->club));
        Mail::to(env('MAIL_ADMIN'))->sendNow(new ClubCreateAdmin($event->club));
    }
}
