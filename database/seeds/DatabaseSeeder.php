<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('invoice_product')->truncate();
		App\Invoice::truncate();
		App\Product::truncate();
		App\Provider::truncate();
		App\Client::truncate();
		App\User::truncate();

		$this->call(UsersSeeder::class);
		$this->call(ClientSeeder::class);
		$this->call(ProviderSeeder::class);
		$this->call(ProductSeeder::class);
		$this->call(InvoiceSeeder::class);
		$this->call(InvoiceProductSeeder::class);
	}
}
