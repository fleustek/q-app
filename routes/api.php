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

Route::prefix('auth')->group(function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
});

Route::prefix('authors')->group(function () {
    Route::get('/', 'AuthorController@index');
    Route::get('/{id}', 'AuthorController@read');
    Route::delete('/{id}', 'AuthorController@destroy');
});

Route::prefix('books')->group(function () {
    Route::get('/', 'BookController@index');
    Route::post('/', 'BookController@store');
    Route::delete('/{id}', 'BookController@destroy');
});