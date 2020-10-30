<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::latest()->paginate(8);

		return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validation = Validator::make($request->all(), User::rules());

		if ($validation->fails()) {
			throw new ValidationException($validation);
		}

		User::create([
		 'first_name' => $request->first_name,
		 'last_name'  => $request->last_name,
		 'dni'        => $request->dni,
		 'file'       => $request->file,
		 'birth_date' => $request->birth_date,
		 'email'      => $request->email,
		 'password'   => trim($request->password),
	  ]);

		return redirect()->route('users.index')->with('message', 'User successfully added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		return view('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		$validation = Validator::make($request->all(), User::rules($user->id));

		if ($validation->fails()) {
			throw new ValidationException($validation);
		}

		$user->first_name = $request->first_name;
		$user->last_name  = $request->last_name;
		$user->dni        = $request->dni;
		$user->file       = $request->file;
		$user->birth_date = $request->birth_date;
		$user->email      = $request->email;

		if ( ! empty(trim($request->password))) {
			$user->password = $request->password;
		}

		$user->save();

		return redirect()->route('users.index')->with('message', 'User data successfully updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		//
	}
}
