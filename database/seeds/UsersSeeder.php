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
			'first_name'          => 'test_first_name',
		   'last_name'         => 'test_last_name',
		   'dni'               => '11111111',
		   'file'              => '222222',
		   'email'             => 'test@test.com',
		   'email_verified_at' => now(),
		   'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		   'remember_token'    => 'AAAAAAAAAA',
	  ]);

		factory(App\User::class, 20)->create();
	}
}
