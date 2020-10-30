<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Client::create([
			'first_name'           => 'client_first_name',
		   'last_name'          => 'client_last_name',
		   'dni'                => '22222222',
		   'birth_date'         => '1980-05-28',
		   'credit_card_number' => '22222233333',
	  ]);

		Factory(Client::class, 20)->create();
	}
}
