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

Route::get('/home', function(){
  return view('home');
});

Route::get('/listaProductos', function(){
  return view('listaProductos');
}
);

Route::get('/productoDetalle', function(){
    return view('productoDetalle');
});

Route::get('/login', function(){
  return view('login');
});

Route::get('/registro', function(){
  return view('registro');
});

Route::get('/faq', function(){
  return view('faq');
});

Route::get('/contacto', function(){
  return view('contacto');
});

Route::get('/cuenta/perfil', function(){
  return view('perfil');
});

Route::get('/cuenta/resumen', function(){
  return view('resumen');
});

Route::get('/cuenta/seguridad', function(){
  return view('seguridad');
});

Route::get('/admin', function(){
  return view('admin');
});

#---------------CRUD Marcas------------------------#

Route::get('/abmMarca', "MarcaController@index");

Route::get('/formAgregarMarca', "MarcaController@create");

Route::post('/agregarMarca', "MarcaController@store");

Route::get('/formModificarMarca/{id}', "MarcaController@edit");

Route::post('/modificarMarca', "MarcaController@update");

Route::get('/abmMarca/{id}', "MarcaController@destroy");

#------------Fin CRUD Marcas------------------------#

#---------------CRUD Categorias------------------------#

Route::get('/abmCategoria', "CategoriaController@index");

Route::get('/formAgregarCategoria', "CategoriaController@create");

Route::post('/agregarCategoria', "CategoriaController@store");

Route::get('/formModificarCategoria/{id}', "CategoriaController@edit");

Route::post('/modificarCategoria', "CategoriaController@update");

Route::get('/abmMarca/{id}', "CategoriaController@destroy");

#------------Fin CRUD Categorias------------------------#
