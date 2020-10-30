<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$providers = Provider::latest()->paginate(8);

		return view('providers.index', compact('providers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('providers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Provider::create($this->validateProvider($request));

		return redirect()->route('providers.index')->with('message', 'Provider successfully created!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Provider  $provider
	 * @return \Illuminate\Http\Response
	 */
	public function show(Provider $provider)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Provider  $provider
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Provider $provider)
	{
		return view('providers.edit', compact('provider'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Provider  $provider
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Provider $provider)
	{
		$provider->update($this->validateProvider($request));

		return redirect()->route('providers.index')->with('message', 'Provider successfully updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Provider  $provider
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Provider $provider)
	{
		//
	}

	/**
	 * validateProvider
	 *
	 * @param Request $request
	 * @return array validated attributes
	 */
	protected function validateProvider(Request $request)
	{
		return $request->validate([
			'name'    => 'required|min:3',
			'address' => 'required|min:3'
	   ]);
	}
}
