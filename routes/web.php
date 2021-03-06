<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function ()
{
	Route::resource('users', 'UserController');
	Route::resource('clients', 'ClientController');
	Route::resource('providers', 'ProviderController');
	Route::resource('products', 'ProductController');
	Route::resource('invoices', 'InvoiceController');
	Route::get('invoices/{invoice}/createPDF', 'InvoiceController@createPDF')->name('invoices.createPDF');
});

Route::get('/test', function ()
{
});
