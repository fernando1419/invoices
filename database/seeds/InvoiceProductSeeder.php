<?php

use Illuminate\Database\Seeder;

class InvoiceProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$products = App\Product::all();
		$invoices = App\Invoice::all();

		foreach ($invoices as $invoice) {
			$randomProductsPerInvoice = $products->random(rand(1, 5)); // choose random products from 1 to 5.
			$totalInvoice             = 0;
			foreach ($randomProductsPerInvoice as $product) {
				$quantity         = rand(1, 4);
				$unit_price       = $product->unit_price;
				$totalInvoiceLine = $unit_price * $quantity;
				// insert new InvoiceLine record in invoice_product table.
				$invoice->products()->save($product, ['quantity' => $quantity, 'price' => $unit_price]);
				$totalInvoice += $totalInvoiceLine;
				// echo "ProdId: " . $product->id . ", Quantity: " . $quantity . ", Unit_Price: " . $unit_price . ", TotalLine: " . $totalInvoiceLine . " <br/>";
			}
			// update total field in invoice table
			$invoice->update(['subtotal' => $totalInvoice, 'total' => $totalInvoice]);
		}
	}
}
