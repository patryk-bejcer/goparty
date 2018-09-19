<?php

namespace App\Mail\User;

use App\Club;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClubConfirm extends Mailable
{
    use Queueable, SerializesModels;

	public $club;
	public $club_user;

	/**
	 * Create a new message instance.
	 *
	 * @param Club $club
	 */
	public function __construct(Club $club)
	{
		$this->club = $club;
		$this->club_user = User::findOrFail($club->user_id);
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	    return $this->from('info@goparty.pl')->view('emails.user.clubConfirm')->subject('Twój klub został zatwierdzony!');
    }
}
