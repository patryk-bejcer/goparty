<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\UserRegistred' => [
			'App\Listeners\UserRegistred\AssignRole',
		],
		'App\Events\ClubConfirm'   => [
			'App\Listeners\ClubConfirm\AssignRole',
			'App\Listeners\ClubConfirm\ClubConfirmEmail',
		],
		'App\Events\ClubCreated'   => [
			'App\Listeners\ClubCreated\ClubCreateEmail'
		],
		'App\Events\ClubDestroy'   => [
			'App\Listeners\ClubDestroy\RemoveRole'
		],
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot() {
		parent::boot();

		//
	}
}
