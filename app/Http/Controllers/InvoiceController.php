<?php

namespace App\Http\Controllers;

use App\Invoice;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
}
