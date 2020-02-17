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
    return view('index');
});

Route::get('/home', function(){
  return view('home');
});
Route::get('/index', function(){
  return view('index');
});
/*john
Route::get('/listaProductos{marca?}', function($marca=""){

  return view('listaProductos')->with("marca",$marca);
}
);
*/
/*
Route::get('/listaProductos', function(){
  return view('listaProductos');
*/

Route::get('/productoDetalle{id?}', function($id=""){
    return view('productoDetalle')->with("id",$id);
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


Route::post("/cuenta/modificarUsuario",'UsuarioController@store');



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
#------------ CRUD Producto------------------------#
Route::get("/cuenta/admin/producto/lista","ProductoController@index")->middleware('auth');
Route::get("/cuenta/admin/producto/agrega","ProductoController@create")->middleware('auth');
Route::post("/cuenta/admin/producto/formagrega","ProductoController@store")->middleware('auth');
Route::get("/cuenta/admin/producto/modificar/{id}","ProductoController@edit")->middleware('auth');
Route::patch("/cuenta/admin/producto/formmodificar/{id}","ProductoController@update")->middleware('auth');
Route::get("/cuenta/admin/producto/eliminar/{id}","ProductoController@destroy")->middleware('auth');
#------------Fin CRUD Producto------------------------#
#------------ CRUD cuenta comun------------------------#

Route::get('/cuenta/perfil', "UsuarioController@show")->middleware('auth');
Route::get('/cuenta/perfil/guardar/{id?}', "UsuarioController@edit")->middleware('auth');
Route::post('/cuenta/perfil/guardar/{id?}', "UsuarioController@update")->middleware('auth');
Route::get('/cuenta/resumen', function(){
  return view('resumen');
})->middleware('auth');

Route::get('/cuenta/seguridad', function(){
  return view('seguridad');
})->middleware('auth');
#------------ CRUD cuenta comun fin------------------------#

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get("/listaProductos","ProductoController@lista");
