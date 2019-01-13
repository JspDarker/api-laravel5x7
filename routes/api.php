<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Books
Route::get('books', 'BookController@index');
// List single book
Route::get('book/{id}', 'BookController@show');
// Create new Book
Route::post('book', 'BookController@store');
// Update a book
Route::put('book', 'BookController@store');
// Delete a book
Route::delete('book/{id}', 'BookController@destroy');
