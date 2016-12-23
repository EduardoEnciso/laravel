<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('inicio',function(){
	return view('index');
});

//Ventas
Route::get('ventas','ventasController@getVentas');
Route::get('nuevaVenta','ventasController@nuevaVenta');
Route::post('buscarCliente','ventasController@buscarCliente');
Route::post('buscarArticulo','ventasController@buscarArticulo');
Route::post('findArticulo','ventasController@findArticulo');
Route::post('obtenerConfig','ventasController@obtenerConfig');
Route::post('checkExistencia', 'ventasController@checkExistencia');
Route::post('guardarVenta', 'ventasController@guardarVenta');

//Clientes
Route::get('clientes','clientesController@vistaClientes');
Route::post('agregarCliente','clientesController@postCliente');
Route::get('agregarCliente','clientesController@getCliente');
Route::get('editarCliente','clientesController@getEditarCliente');
Route::post('editarCliente','clientesController@postEditarCliente');

//Articulos
Route::get('articulos','articulosController@vistaArticulos');
Route::post('agregarArticulo','articulosController@postArticulo');
Route::get('agregarArticulo','articulosController@getArticulo');
Route::get('editarArticulo','articulosController@getEditarArticulo');
Route::post('editarArticulo','articulosController@postEditarArticulo');

//Configuracion
Route::get('configuracion','configController@getConfig');
Route::post('configuracion','configController@editarConfiguracion');
