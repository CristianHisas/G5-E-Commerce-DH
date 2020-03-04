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
//Route::get('/index', function(){
// return view('index');
//});
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

Route::get('/productoDetalle/{id}', "ProductoController@showDetails");
Route::post('/productoDetalle', "CarritoController@store");

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
})->middleware('auth')->middleware('adminControl');

#---------------CRUD Marcas------------------------#

Route::get('/cuenta/admin/abmMarca', "MarcaController@index")->middleware('auth')->middleware('adminControl');

Route::get('/cuenta/admin/formAgregarMarca', "MarcaController@create")->middleware('auth')->middleware('adminControl');

Route::post('/cuenta/admin/agregarMarca', "MarcaController@store")->middleware('auth')->middleware('adminControl');

Route::get('/cuenta/admin/formModificarMarca/{id}', "MarcaController@edit")->middleware('auth')->middleware('adminControl');

Route::post('/cuenta/admin/modificarMarca', "MarcaController@update")->middleware('auth')->middleware('adminControl');

Route::get('cuenta/admin/abmMarca/{id}', "MarcaController@destroy")->middleware('auth')->middleware('adminControl');

#------------Fin CRUD Marcas------------------------#

#---------------CRUD Categorias------------------------#

Route::get('/cuenta/admin/abmCategoria', "CategoriaController@index")->middleware('auth')->middleware('adminControl');

Route::get('/cuenta/admin/formAgregarCategoria', "CategoriaController@create")->middleware('auth')->middleware('adminControl');

Route::post('/cuenta/admin/agregarCategoria', "CategoriaController@store")->middleware('auth')->middleware('adminControl');

Route::get('/cuenta/admin/formModificarCategoria/{id}', "CategoriaController@edit")->middleware('auth')->middleware('adminControl');

Route::post('/cuenta/admin/modificarCategoria', "CategoriaController@update")->middleware('auth')->middleware('adminControl');

Route::get('/cuenta/admin/abmCategoria/{id}', "CategoriaController@destroy")->middleware('auth')->middleware('adminControl');

#------------Fin CRUD Categorias------------------------#
#------------ CRUD Producto------------------------#
Route::get("/cuenta/admin/producto/lista","ProductoController@index")->middleware('auth')->middleware('adminControl');
Route::get("/cuenta/admin/producto/agrega","ProductoController@create")->middleware('auth')->middleware('adminControl');
Route::post("/cuenta/admin/producto/formagrega","ProductoController@store")->middleware('auth')->middleware('adminControl');
Route::get("/cuenta/admin/producto/modificar/{id}","ProductoController@edit")->middleware('auth')->middleware('adminControl');
Route::patch("/cuenta/admin/producto/formmodificar/{id}","ProductoController@update")->middleware('auth')->middleware('adminControl');
Route::get("/cuenta/admin/producto/eliminar/{id}","ProductoController@destroy")->middleware('auth')->middleware('adminControl');
#------------Fin CRUD Producto------------------------#
#------------ CRUD cuenta comun------------------------#

Route::get('/cuenta/perfil', "UsuarioController@show")->middleware('auth')->middleware('verified')->name('perfil');
Route::get('/cuenta/perfil/guardar/{id?}', "UsuarioController@edit")->middleware('auth');
Route::post('/cuenta/perfil/guardar/{id?}', "UsuarioController@update")->middleware('auth');
Route::get('/cuenta/resumen', function(){
  return view('resumen');
})->middleware('auth');
Route::get("/cuenta/resumen/vaciar/{id}","CarritoController@destroy")->middleware('auth');

Route::get('/cuenta/seguridad', function(){
  return view('seguridad');
})->middleware('auth');
Route::post('/cuenta/seguridad/pass',"UsuarioController@updatePassword")->middleware('auth');
#------------ CRUD cuenta comun fin------------------------#

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/////////////////////////////////////////////////////////////////////////////
Route::get('/', 'ProductoController@listaCategorias');/*Lista de categorias en index*/
Route::get("/listaProductos/{cat?}","ProductoController@lista")->name('lista');
/////////////////////////////////////////////////////////////////////////////
Route::get("/listaProductos/descuentos/{cat?}","ProductoController@listaPorDescuento")->name('listaPorDescuento');
#------------------Prueba-----------------#
Route::get('respuesta6', function(){
  return response()->view("error.error")
  ->header('status', 404);
  //->header('Refresh', '5; url=/');
});

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
