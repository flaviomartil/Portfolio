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

    // Rotas Admin padrão
    Route::get('/logout', 'adminController@logout');
    Route::get('', 'HomeController@index')->name('admin');

    // Rotas Sobre mim
    Route::get('/EditAbout', 'adminController@editAbout');
    Route::post('/EditAbout/update', 'adminController@SaveAbout');

    // Rotas Projetos
    Route::post('/editnow/{id}', 'adminController@update');
    Route::post('/createNow', 'adminController@create');
    Route::get('/CreateProject', 'adminController@projectCreate');
    Route::get('/projects', 'adminController@getProjects');
    Route::get('/editar/{id}', 'adminController@show');
    Route::post('/delete', 'adminController@destroy');

    // Rotas Experiências
    Route::get('/createExperiencias', 'adminController@experienciasCreate');
    Route::post('experiencias/delete', 'adminController@destroyExperiencias');
    Route::get('experiencias/editar/{id}', 'adminController@showExperiencias');
    Route::post('/experiencias/create', 'adminController@createExperiencias');
    Route::get('/getExperiencias', 'adminController@listarExperiencias');
    Route::post('/experiencias/update/{id}', 'adminController@saveExperiencias');
    Route::get('/experiencias', 'adminController@viewExperiencias')->name('experiencias');

    // Rotas Educações
    Route::get('educacao/editar/{id}', 'adminController@showEducacao');
    Route::post('/educacao/create', 'adminController@createEducacao');
    Route::get('/createEducacao', 'adminController@educacaoCView');
    Route::get('/educacao', 'adminController@viewEducacoes')->name('educacao');
    Route::post('educacao/delete', 'adminController@destroyEducacaoes');
    Route::post('/educacao/update/{id}', 'adminController@saveEducacao');
    Route::get('/getEducacao', 'adminController@listarEducacao');
});

// Rotas do portfolio
Route::get('/', 'InicioController@index');
Route::get('/newCsrf', 'InicioController@refreshToken');
Route::post('/sendEmail', 'InicioController@sendEmail');
