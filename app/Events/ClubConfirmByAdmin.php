<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class ClubConfirmByAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

	public $user;
	public $club;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($club)
    {
        $this->user = Auth::user();
        $this->club = $club;
    }

}
