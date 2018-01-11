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

Route::get('/','LoginController@index');
Route::resource('login','LoginController');
Route::resource('principal','PrincipalController');

Route::resource('almacen', 'configuracion\almacencontroller');
Route::get('almacen/{id}/destroy', [
		'uses' => 'configuracion\almacencontroller@destroy',
		'as'   => 'configuracion.almacen.destroy'
	]);
Route::resource('tipoempresa', 'configuracion\TipoempresaController');
	Route::get('tipoempresa/{id}/destroy', [
		'uses' => 'configuracion\TipoempresaController@destroy',
		'as'   => 'configuracion.tipoempresa.destroy'
	]);

Route::resource('tipocotizacion', 'configuracion\tipocotizacioncontroller');
Route::get('tipocotizacion/{id}/destroy', [
		'uses' => 'configuracion\tipocotizacioncontroller@destroy',
		'as'   => 'configuracion.tipocotizacion.destroy'
	]);

Route::resource('empresa', 'configuracion\empresacontroller');
Route::get('empresa/{id}/destroy', [
		'uses' => 'configuracion\empresacontroller@destroy',
		'as'   => 'configuracion.empresa.destroy'
	]);
Route::resource('tipomaterial', 'configuracion\tipomaterialcontroller');
Route::get('tipomaterial/{id}/destroy', [
		'uses' => 'configuracion\tipomaterialcontroller@destroy',
		'as'   => 'configuracion.tipomaterial.destroy'
	]);

Route::resource('tipomovimiento', 'configuracion\tipomovimientocontroller');
Route::get('tipomovimiento/{id}/destroy', [
		'uses' => 'configuracion\tipomovimientocontroller@destroy',
		'as'   => 'configuracion.tipomovimiento.destroy'
	]);
Route::resource('ejercicio', 'configuracion\ejerciciocontroller');
Route::get('ejercicio/{id}/destroy', [
		'uses' => 'configuracion\ejerciciocontroller@destroy',
		'as'   => 'configuracion.ejercicio.destroy'
	]);

Route::resource('parametros', 'configuracion\parametroscontroller');
Route::get('parametros/{id}/destroy', [
		'uses' => 'configuracion\parametroscontroller@destroy',
		'as'   => 'configuracion.parametros.destroy'
	]);

Route::resource('material', 'registro\materialcontroller');
Route::get('material/{id}/destroy', [
		'uses' => 'registro\materialcontroller@destroy',
		'as'   => 'registro.material.destroy'
	]);

Route::resource('cliente', 'registro\clientecontroller');
Route::get('cliente/{id}/destroy', [
		'uses' => 'registro\clientecontroller@destroy',
		'as'   => 'registro.cliente.destroy'
	]);

Route::resource('proveedor', 'registro\proveedorcontroller');
Route::get('proveedor/{id}/destroy', [
		'uses' => 'registro\proveedorcontroller@destroy',
		'as'   => 'registro.proveedor.destroy'
	]);
Route::resource('almacen', 'configuracion\almacencontroller');
Route::get('almacen/{id}/destroy', [
		'uses' => 'configuracion\almacencontroller@destroy',
		'as'   => 'configuracion.almacen.destroy'
	]);

Route::resource('inventario', 'registro\inventariocontroller');
Route::get('inventario/{id}/destroy', [
		'uses' => 'registro\inventariocontroller@destroy',
		'as'   => 'registro.inventario.destroy'
	]);
Route::get('inventario/{id}/carga', [
		'uses' => 'registro\inventariocontroller@carga',
		'as'   => 'registro.inventario.carga'
	]);
Route::resource('cotizacion', 'registro\cotizacioncontroller');
Route::get('cotizacion/{id}/destroy', [
		'uses' => 'registro\cotizacioncontroller@destroy',
		'as'   => 'registro.cotizacion.destroy'
	]);
Route::get('cotizacion/{id}/carga', [
		'uses' => 'registro\cotizacioncontroller@carga',
		'as'   => 'registro.cotizacion.carga'
	]);
Route::get('cotizacion/{id}/duplicar', [
		'uses' => 'registro\cotizacioncontroller@duplicar',
		'as'   => 'registro.cotizacion.duplicar'
	]);
Route::get('cotizacion/{id}/pdf', [
		'uses' => 'registro\cotizacioncontroller@pdf',
		'as'   => 'registro.cotizacion.pdf'
	]);



Route::resource('movimientos', 'registro\movimientoscontroller');
Route::get('movimientos/{id}/destroy', [
		'uses' => 'registro\movimientoscontroller@destroy',
		'as'   => 'registro.movimientos.destroy'
	]);
	

