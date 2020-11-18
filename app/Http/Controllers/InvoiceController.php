<?php

namespace App\Http\Controllers;

use Exception;
use App\Client;
use App\Invoice;
use App\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$invoices = Invoice::latest()->paginate(8);

		return view('invoices.index', compact('invoices'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$clients = Client::all(['id', 'first_name', 'last_name']);

		return view('invoices.create', compact('clients'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// return $request;
		$request->validate([
		   'number'                => 'required|digits:9|unique:invoices',
		   'date'                  => 'date|after_or_equal:today',
		   'payment_method'        => 'nullable',
		   'client_id'             => 'integer',
		   'products.*.product_id' => 'required|integer|min:1',
		   'products.*.unit_price' => 'required|numeric|min:1',
		   'products.*.quantity'   => 'required|integer|min:1'
	   ]);

		try {
			$this->handleInvoice($request);
		} catch (Exception $e) {
			return false;
		}

		return response()->json(['created' => true]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function show(Invoice $invoice)
	{
		return view('invoices.show', $this->getInvoiceData($invoice));
	}

	// Generate PDF
	public function createPDF(Invoice $invoice)
	{
		$pdf = PDF::loadView('invoices._body', $this->getInvoiceData($invoice));

		return $pdf->download('invoice.pdf');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Invoice $invoice)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Invoice $invoice)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Invoice  $invoice
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Invoice $invoice)
	{
		//
	}

	protected function getInvoiceData(Invoice $invoice)
	{
		$invoice          = Invoice::with(['products', 'user'])->find($invoice->id); // eager loading.
		$productsQuantity = $invoice->products->sum('pivot.quantity');

		return [
		 'invoice'          => $invoice,
		 'productsQuantity' => $productsQuantity
	  ];
	}

	/**
	 * Insert a new Invoice using a transaction.
	 *
	 * @param mixed $request
	 * @return void
	 */
	protected function handleInvoice($request)
	{
		DB::transaction(function () use ($request)
		{
			$invoiceData = array_merge($request->except('products'), ['user_id' => auth()->user()->id]);
			$newInvoice  = Invoice::create($invoiceData); // header

			$productsArray = json_decode(json_encode($request->products), true); // product details
			$totalInvoice  = 0;
			foreach ($productsArray as $product) {
				$product_id       = $product['product_id'];
				$unit_price       = $product['unit_price'];
				$quantity         = $product['quantity'];
				$totalInvoice += $unit_price * $quantity;

				$newInvoice->products()->attach($product_id, ['quantity' => $quantity, 'price' => $unit_price]); // insert invoice product line item.
			Product::findOrFail($product_id)->decrement('stock', $quantity); // update product stock.
			}

			$newInvoice->update(['subtotal' => $totalInvoice, 'total' => $totalInvoice]);
		});
	}
}
