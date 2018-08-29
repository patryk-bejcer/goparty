<?php

namespace App\Mail;

use App\Club;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClubCreate extends Mailable
{
    use Queueable, SerializesModels;
    public $club;
    public $club_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Club $club)
    {
        $this->club = $club;
        $this->club_user= User::findOrFail($club->user_id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ggoparty60@gmail.com')->view('emails.main')->subject('Właśnie utworzyłeś klub');
    }
}
