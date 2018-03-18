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

        //Make roles and permissions
	    Role::create(['name' => 'user']);
	    Role::create(['name' => 'admin']);

        //Start other seeders.
        $this->call([
            MusicTypesTableSeeder::class,
            UsersTableSeeder::class,
        ]);

    }
}
