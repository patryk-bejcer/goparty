<?php

namespace App\Notifications\Clubs;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateClubByUser extends Notification
{
    use Queueable;


	public $club;

	/**
	 * Create a new notification instance.
	 *
	 * @param $club
	 */
	public function __construct($club)
	{
		$this->club = $club;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return [ 'database'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 *
	 * @return ClubConfirmMail
	 */
//	public function toMail($notifiable)
//	{
//		$user = User::findOrFail($this->club->user_id);
//		return (new ClubConfirmMail($this->club))->to($user);
//	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			'message' => 'Prośba o dodanie klubu ' . $this->club->official_name . ' została pomyślnie przesłana do pracowników portalu. Klub zostanie opublikowany po zatwierdzeniu przez administratora.'
		];
	}
}
