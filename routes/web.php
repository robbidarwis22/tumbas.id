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

Route::get('/','BerandaController@index');
Route::get('/product','BerandaController@product');
Route::get('/category/{slug}','BerandaController@productbycategory')->name('category.product');
Route::get('/penjual/{id}','BerandaController@productbypenjual');
Route::get('product/detail/{slug}','BerandaController@detail');
//
Route::get('penjual','BerandaController@penjual');
Route::get('auth/register','AuthController@register');
Route::post('auth/register','AuthController@store')->name('home.register');
Route::get('verifikasi/register/{token}','AuthController@verif');
Route::post('auth/login','AuthController@login');
//cart
Route::get('/cart/{id}','CartController@index');

Auth::routes();
Route::get('/home','HomeController@index')->name('home');

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
	Route::get('user/delete/{id}','UserController@delete');
});

