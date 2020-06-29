<?php

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

Route::get('/', function () {
    $pdf = App::make('dompdf.wrapper');
	$pdf->loadHTML('<h1>Test</h1>');
	return $pdf->stream(); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
	Route::get('media','HomeController@media')->name('media.index');
	Route::get('dashboard','HomeController@index');
	Route::resource('category','CategoryController');
	Route::resource('product','ProductController');
	//Transaction
	Route::get('transaction','TransactionController@index')->name('transaction.index');
	Route::get('transaction/{code}/{status}','TransactionController@status');
	Route::get('transaction/{code}/detail/data','TransactionController@detail');
	Route::get('transaction/{code}/detail/data/cetak','TransactionController@cetakpdf');
	//User
	Route::get('user','UserController@index')->name('admin.user');
	Route::get('user/status/{id}','UserController@changestatus');
	Route::get('user/add','UserController@create')->name('admin.user.create');
	Route::post('user/add','UserController@store')->name('admin.user.store');
	Route::get('user/edit/{id}','UserController@edit');
	Route::post('user/update','UserController@update');
});

