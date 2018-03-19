<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::create([
	        'first_name' => 'Admin',
	        'last_name' => '',
	        'email' => 'admin@gmail.com',
	        'password' => Hash::make('pass'),
	        'city_id' => 1
        ]);
	    $admin->assignRole('admin');

	    $owner = \App\User::create([
		    'first_name' => 'Janusz',
		    'last_name' => 'Kowalski',
		    'email' => 'owner@gmail.com',
		    'password' => Hash::make('pass'),
		    'city_id' => 2
	    ]);
	    $owner->assignRole('owner');

	    $user = \App\User::create([
		    'first_name' => 'Michał',
		    'last_name' => 'Nowak',
		    'email' => 'user@gmail.com',
		    'password' => Hash::make('pass'),
		    'city_id' => 3
	    ]);
	    $user->assignRole('user');
    }
}
