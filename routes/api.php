<?php

use App\Notebook;

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

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout');
Route::get('notebooks', 'NotebookController@index');
Route::get('notebooks/{notebook}', 'NotebookController@show');
Route::post('notebooks', 'NotebookController@store');
Route::put('notebooks/{notebook}', 'NotebookController@update');
Route::delete('notebooks/{notebook}', 'NotebookController@delete');