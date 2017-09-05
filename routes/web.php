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
    return view('auth.login');
});

Auth::routes();

//Home del Dahboard

Route::get('/home', 'HomeController@index')->name('home');

// Rutas de almacen,compras,ventas,usuario,ubicacion
Route::resource('almacen/articulo','ArticuloController');
Route::resource('almacen/categoria','CategoriaController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('ventas/venta','VentaController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');
Route::resource('seguridad/usuario','UsuarioController');
Route::get('/ubicacion',function (){
  return view('ubicacion');
});

//Rutas de eliminar almacen,ventas,compras,usuario
Route::get('almacen/categoria/{id}/eliminar', ['uses' => 'CategoriaController@destroy', 'as' => 'categoria.delete']);
Route::get('almacen/articulo/{id}/eliminar', ['uses' => 'ArticuloController@destroy', 'as' => 'articulo.delete']);
Route::get('ventas/cliente/{id}/eliminar', ['uses' => 'ClienteController@destroy', 'as' => 'cliente.delete']);
Route::get('compras/proveedor/{id}/eliminar', ['uses' => 'ProveedorController@destroy', 'as' => 'proveedor.delete']);
Route::get('seguridad/usuario/{id}/eliminar', ['uses' => 'UsuarioController@destroy', 'as' => 'usuario.delete']);

//Rutas para crear PDF y Export Excel
Route::get('/reporteArticulos',['uses'=>'PdfController@PDF_Articulos','as'=>'reporte.articulos']);
Route::get('/excelArticulos',['uses'=>'PdfController@Excel_Articulos','as'=>'export.articulos']);
Route::get('/reporteClientes',['uses'=>'PdfController@PDF_Clientes','as'=>'reporte.clientes']);
Route::get('/excelClientes',['uses'=>'PdfController@Excel_Clientes','as'=>'export.clientes']);
Route::get('/reporteVenta/{id}',['uses'=>'PdfController@PDF_Venta','as'=>'reporte.venta']);
Route::get('/reporteProveedores',['uses'=>'PdfController@PDF_Proveedores','as'=>'reporte.proveedores']);
Route::get('/excelProveedores',['uses'=>'PdfController@Excel_Proveedores','as'=>'export.proveedores']);
Route::get('/reporteVentas',['uses'=>'PdfController@PDF_Ventas','as'=>'reporte.ventas']);
Route::get('/excelVentas',['uses'=>'PdfController@Excel_Ventas','as'=>'export.ventas']);
Route::get('/reporteIngresos',['uses'=>'PdfController@PDF_Ingresos','as'=>'reporte.ingresos']);
Route::get('/excelIngresos',['uses'=>'PdfController@Excel_Ingresos','as'=>'export.ingresos']);
Route::get('/reporteIngreso/{id}',['uses'=>'PdfController@PDF_Ingreso','as'=>'reporte.ingreso']);


