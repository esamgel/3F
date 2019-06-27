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

Route::get('/', 'ClientsController@list');

Auth::routes();

Route::get('/client', 'ClientsController@add');
Route::post('/client', 'ClientsController@create');

Route::get('/client/{client}','ClientsController@edit');
Route::post('/client/{client}','ClientsController@update');

Route::get('/accountlist', 'AccountsController@list');
Route::get('/accountlist/{client}', 'AccountsController@index');

Route::get('/add/{client}', 'AccountsController@add');
Route::post('/add/{client}','AccountsController@create');

Route::get('/account/{account}','AccountsController@edit');
Route::post('/account/{account}','AccountsController@update');

Route::get('/transactionlist/{account}', 'TransactionsController@list');

Route::get('/addtrans/{account}', 'TransactionsController@add');
Route::post('/addtrans/{account}', 'TransactionsController@create');

Route::get('/uptransaction/{transaction}','TransactionsController@edit');
Route::post('/uptransaction/{transaction}','TransactionsController@update');

Route::get('/balancelist/{account}', 'BalancesController@total');
Route::get('/balancelist', 'BalancesController@list');
