<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'first_name'            => 'test_first_name',
		   'last_name'           => 'test_last_name',
		   'dni'                 => '11111111',
		   'file'                => '222222',
		   'birth_date'          => '2000-05-28',
		   'email'               => 'test@test.com',
		   'email_verified_at'   => now(),
		   'password'            => 'password', // password
		   'remember_token'      => 'AAAAAAAAAA',
	  ]);

		factory(App\User::class, 20)->create();
	}
}
