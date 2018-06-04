<?php

use Illuminate\Database\Seeder;

class UserSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();

        foreach ($users as $user){
            \Illuminate\Support\Facades\DB::table('user_settings')->insert([
                'user_id' => $user->id,
            ]);

        }
    }
}
