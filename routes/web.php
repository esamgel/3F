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

Route::get('/', 'AccountsController@index');

Auth::routes();

Route::get('/account', 'AccountsController@add');
Route::post('/account','AccountsController@create');

Route::get('/account/{account}','AccountsController@edit');
Route::post('/account/{account}','AccountsController@update');

Route::get('/transactionlist/{account}', 'TransactionsController@list');

Route::get('/add/{account}', 'TransactionsController@add');
Route::post('/transaction', 'TransactionsController@create');

Route::get('/transaction/{transaction}','TransactionsController@edit');
Route::post('/transaction/{transaction}','TransactionsController@update');
