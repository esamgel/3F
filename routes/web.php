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

Route::get('/', 'TransactionsController@index');

Auth::routes();

Route::get('/transaction', 'TransactionsController@add');
Route::post('/transaction', 'TransactionsController@create');

Route::get('/transaction/{transaction}','TransactionsController@edit');
Route::post('/transaction/{transaction}','TransactionsController@update');
