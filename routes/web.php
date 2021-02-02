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

use App\Http\Controllers\adminController;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/', 'InicioController@index');


Route::post('/sendEmail','InicioController@sendEmail');

Route::get('/admin/CreateProject','adminController@projectCreate');
Route::get('/admin/delete/{id}','adminController@destroy');
Route::post('/admin/createNow','adminController@create');
