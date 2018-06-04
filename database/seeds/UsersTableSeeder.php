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

	    $faker = Faker\Factory::create();
	    $number_of_users = 40;


        $admin = \App\User::create([
	        'first_name' => 'Admin',
	        'last_name' => 'admin',
	        'email' => 'admin@gmail.com',
	        'password' => Hash::make('pass'),
	        'city_id' => 1
        ]);

	    $admin->assignRole('user');
	    $admin->assignRole('owner');
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

	    /* ========================== **/


	    for ($user_id = 1; $user_id <= $number_of_users; $user_id++) {


		    DB::table('users')->insert([
			    'first_name' => $faker->name,
			    'last_name' =>  $faker->name,
			    'email' => str_replace('-', '', str_slug($faker->name)) . '@' . $faker->safeEmailDomain,
			    'password' => Hash::make('pass'),
			    'city_id' => 3

		    ]);

	    }


    }


}
