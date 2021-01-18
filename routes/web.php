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

Route::get('/', 'InicioController')->name('inicio');

//usuario autentificado y con email verificado
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified']], function() {
Route::get('/propiedades/index', 'PropiedadController@index')->name('propiedades.index');
Route::get('/propiedades/create', 'PropiedadController@create')->name('propiedades.create');
Route::post('/propiedades', 'PropiedadController@store')->name('propiedades.store');
Route::post('/imagenes/store', 'ImagenController@store')->name('imagenes.store');
Route::post('/imagenes/destroy', 'ImagenController@destroy')->name('imagenes.destroy');
});
