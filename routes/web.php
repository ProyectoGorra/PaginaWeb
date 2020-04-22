<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/home', 'HomeController@index')->middleware('auth');

Auth::routes();

Route::get('/editar', 'HomeController@index')->name('editar');
Route::resource('/personas', 'PersonaController')->middleware('auth');

Route::get('/invidente', 'HomeController@index')->name('invidente');
Route::resource('/invidentes', 'InvidenteController')->middleware('auth');

Route::get('/token/crear','HomeController@token');

