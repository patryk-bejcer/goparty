# GoParty

If you find event near your city - use GoParty :)

Backend: Laravel 5.6 <br/>
Frontend: Vue.js

URL to demo app: 
https://goparty.patrykbejcer.pl

## How to run app on localhost.

1. Download repo

2. Setup .env file

3. Run php artisan:migrate --seed

4. Run php artisan serve

5. Run npm install

6. After npm install run npm run watch or npm run production

7. Open portal in browser :)

## LOGINS (user, manager, admin)
```
        $admin = \App\User::create([
	        'first_name' => 'Admin',
	        'last_name' => 'admin',
	        'email' => 'admin@gmail.com',
	        'password' => Hash::make('pass'),
        ]);

	    $admin->assignRole('user');
	    $admin->assignRole('owner');
	    $admin->assignRole('admin');

	    $owner = \App\User::create([
		    'first_name' => 'Janusz',
		    'last_name' => 'Kowalski',
		    'email' => 'owner@gmail.com',
		    'password' => Hash::make('pass'),
	    ]);
	    $owner->assignRole('owner');

	    $user = \App\User::create([
		    'first_name' => 'Michał',
		    'last_name' => 'Nowak',
		    'email' => 'user@gmail.com',
		    'password' => Hash::make('pass'),
	    ]);
	    $user->assignRole('user');
```
