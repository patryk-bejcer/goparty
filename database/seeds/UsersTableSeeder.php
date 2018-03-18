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
    }
}
