<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$clients = Client::latest()->paginate(8);

		return view('clients.index', compact('clients'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Client::create($this->validateClient($request));

		return redirect()->route('clients.index')->with('message', 'Client successfully created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function show(Client $client)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Client $client)
	{
		return view('clients.edit', compact('client'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Client $client)
	{
		$client->update($this->validateClient($request));

		return redirect()->route('clients.index')->with('message', 'Client successfully updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client)
	{
		//
	}

	/**
	 * validateClient
	 *
	 * @param Request $request
	 * @return array validated attributes
	 */
	protected function validateClient(Request $request)
	{
		return $request->validate([
			'first_name'         => 'required|min:2',
			'last_name'          => 'required|min:2',
			'dni'                => 'required|digits_between:6,8',
			'birth_date'         => 'required|date|before:today',
			'credit_card_number' => 'nullable|digits:16',
	   ]);
	}
}
