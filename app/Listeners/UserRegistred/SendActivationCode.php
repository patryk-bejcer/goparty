<?php

namespace App\Listeners\UserRegistred;

use App\Events\UserRegistred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendActivationCode implements ShouldQueue
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
     * @param  UserRegistred  $event
     * @return void
     */
    public function handle(UserRegistred $event)
    {
    	\Log::info('activation', ['user' => $event->user]);
    }
}
