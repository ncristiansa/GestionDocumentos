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
    return view('clientes');
});

Route::get('/formulario', function () {
    return view('formulario');
});

Route::get('insert','InsertarUsuario@insertform');
Route::post('crear','InsertarUsuario@insert');