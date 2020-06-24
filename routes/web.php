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
    return view('welcome');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
	Route::get('media','HomeController@media')->name('media.index');
	Route::get('dashboard','HomeController@index');
	Route::resource('category','CategoryController');
	Route::resource('product','ProductController');
	Route::get('transaction','TransactionController@index')->name('transaction.index');
	Route::get('transaction/{code}/{status}','TransactionController@status');
	Route::get('transaction/{code}/detail/data','TransactionController@detail');
});

