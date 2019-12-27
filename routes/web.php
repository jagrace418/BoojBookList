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

Route::resource('books', 'BookController');

Route::get('/books/sort/{column}/{order?}', 'BookController@sort');

Route::get('/books/{book}/edit', 'BookController@edit');

Route::apiResource('api/books', 'BookAPIController');