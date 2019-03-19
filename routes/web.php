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

Route::get('/', 'ClientesController@index');


Route::get('/formulario', 'ClientesController@create');
Route::post('/', 'ClientesController@store');
Route::get('/cliente/{id}', 'ClientesController@edit');
Route::post('/cliente/{id}', 'ClientesController@update');

Route::get('/detallesVentas/{id}', 'VentaController@create');
Route::post('/detallesVentas/{id}', 'VentaController@store');


Route::get('/Modificar/{id}', 'ModificarController@index');
Route::post('/Modificar/{id}', 'ModificarController@update');

Route::get('/NuevaVenta/{id}', 'VentaController@addSale');
Route::post('/cliente/{id}', 'VentaController@saveSale');


Route::get('clientes', 'ClientesController@buscar');





Route::post('/detallesVentas/{archivo}', 'VentaController@downloadFile');


Route::get('/usuarios', 'usuariosController@create');

Route::post('/usuarios', 'usuariosController@store');



