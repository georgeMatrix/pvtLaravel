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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('inicio', 'InicioController');
Route::resource('categoria', 'CategoriaController');
Route::post('eliminarC', 'CategoriaController@eliminar');
Route::resource('provedor', 'ProvedorController');
Route::resource('unidadMedida', 'UnidadMedidaController');
Route::resource('producto', 'ProductoController');

