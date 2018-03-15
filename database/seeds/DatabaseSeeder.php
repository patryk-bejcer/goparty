<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    Role::create(['name' => 'user']);
	    Role::create(['name' => 'admin']);

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
