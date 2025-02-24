<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Support\Facades\Auth;

class ClubCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

	public $user;
	public $club;

	/**
	 * Create a new event instance.
	 *
	 * @param $club
	 */
    public function __construct($club)
    {
        $this->user = Auth::user();
        $this->club = $club;
    }

}
