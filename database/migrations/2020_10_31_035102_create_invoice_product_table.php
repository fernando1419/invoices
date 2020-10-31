<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_product', function (Blueprint $table)
		{
			$table->unsignedBigInteger('invoice_id');
			$table->unsignedBigInteger('product_id');
			$table->smallInteger('quantity');
			$table->decimal('price', 8, 2);
			$table->timestamps();

			$table->primary(['invoice_id', 'product_id']);
			$table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('invoice_product');
	}
}
