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
// Rotas de admin protegidas por middleware e grupo
Route::group(['prefix' => '/admin', 'middleware' => ['checkAdmin']], function () {
    Route::get('', 'HomeController@index')->name('admin');
    Route::get('/CreateProject', 'adminController@projectCreate');
    Route::post('/delete', 'adminController@destroy');
    Route::get('/editar/{id}', 'adminController@show');
    Route::get('/projects', 'adminController@getProjects');
    Route::get('/EditAbout', 'adminController@editAbout');
    Route::post('/createNow', 'adminController@create');
    Route::post('/editnow/{id}', 'adminController@update');
    Route::post('/EditAbout/update', 'adminController@SaveAbout');
});

// Rotas do portfolio
Route::get('/', 'InicioController@index');
Route::get('/newCsrf', 'InicioController@refreshToken');
Route::post('/sendEmail', 'InicioController@sendEmail');
