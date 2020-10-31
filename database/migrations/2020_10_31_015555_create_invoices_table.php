<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function (Blueprint $table)
		{
			$table->id();
			$table->string('number');
			$table->timestamp('date');
			$table->decimal('subtotal', 8, 2);
			$table->decimal('discount_rate', 3, 2);
			$table->decimal('total', 8, 2);
			$table->string('payment_method');
			$table->foreignId('client_id'); // Alias of  $table->unsignedBigInteger('client_id').
			$table->foreignId('user_id'); // Alias of  $table->unsignedBigInteger('user_id').

		   $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('invoices');
	}
}
