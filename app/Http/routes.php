<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/library', 'AuthorsController@index');
Route::post('/library', 'AuthorsController@store');
Route::get('/library/{id}', 'BooksController@index');
Route::post('/library/{id}', 'BooksController@store');
Route::get('/library/json/{id}', 'BooksController@toJson');
Route::post('/library/delete/author', 'AuthorsController@deleteAuthor');
Route::post('/library/delete/book', 'BooksController@deleteBook');