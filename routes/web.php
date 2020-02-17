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
/*
Route::get('/listaProductos', function(){
  return view('listaProductos');
}
);
*/

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
Route::post("/cuenta/modificarUsuario",'UsuarioController@store');

Route::get('/cuenta/resumen', function(){
  return view('resumen');
});

Route::get('/cuenta/seguridad', function(){
  return view('seguridad');
});

Route::get('/cuenta/admin', function(){
  return view('admin');
});

#---------------CRUD Marcas------------------------#

Route::get('/cuenta/admin/abmMarca', "MarcaController@index");

Route::get('/cuenta/admin/formAgregarMarca', "MarcaController@create");

Route::post('/cuenta/admin/agregarMarca', "MarcaController@store");

Route::get('/cuenta/admin/formModificarMarca/{id}', "MarcaController@edit");

Route::post('/cuenta/admin/modificarMarca', "MarcaController@update");

Route::get('cuenta/admin/abmMarca/{id}', "MarcaController@destroy");

#------------Fin CRUD Marcas------------------------#

#---------------CRUD Categorias------------------------#

Route::get('/cuenta/admin/abmCategoria', "CategoriaController@index");

Route::get('/cuenta/admin/formAgregarCategoria', "CategoriaController@create");

Route::post('/cuenta/admin/agregarCategoria', "CategoriaController@store");

Route::get('/cuenta/admin/formModificarCategoria/{id}', "CategoriaController@edit");

Route::post('/cuenta/admin/modificarCategoria', "CategoriaController@update");

Route::get('/cuenta/admin/abmCategoria/{id}', "CategoriaController@destroy");

#------------Fin CRUD Categorias------------------------#

Route::get("/cuenta/admin/producto/lista","ProductoController@index");
Route::get("/cuenta/admin/producto/agrega","ProductoController@create");
Route::post("/cuenta/admin/producto/formagrega","ProductoController@store");
Route::get("/cuenta/admin/producto/modificar/{id}","ProductoController@edit");
Route::patch("/cuenta/admin/producto/formmodificar/{id}","ProductoController@update");
Route::get("/cuenta/admin/producto/eliminar/{id}","ProductoController@destroy");


#------------------------------------home----------------------------------#
Route::get("/listaProductos","HomeController@index");
