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

Route::get('/', 'ProductoController@listaCategorias');/*Lista de categorias en index*/

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

Route::get('/productoDetalle/{id}', "ProductoController@showDetails")->where('id', '[0-9]+');
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
})->middleware('auth')->middleware('verified')->middleware('adminControl');

#---------------CRUD Marcas------------------------#

Route::get('/cuenta/admin/abmMarca', "MarcaController@index")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::get('/cuenta/admin/formAgregarMarca', "MarcaController@create")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::post('/cuenta/admin/agregarMarca', "MarcaController@store")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::get('/cuenta/admin/formModificarMarca/{id}', "MarcaController@edit")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::post('/cuenta/admin/modificarMarca', "MarcaController@update")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::get('cuenta/admin/abmMarca/{id}', "MarcaController@destroy")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');

#------------Fin CRUD Marcas------------------------#

#---------------CRUD Categorias------------------------#

Route::get('/cuenta/admin/abmCategoria', "CategoriaController@index")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::get('/cuenta/admin/formAgregarCategoria', "CategoriaController@create")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::post('/cuenta/admin/agregarCategoria', "CategoriaController@store")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::get('/cuenta/admin/formModificarCategoria/{id}', "CategoriaController@edit")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::post('/cuenta/admin/modificarCategoria', "CategoriaController@update")->middleware('auth')->middleware('verified')->middleware('adminControl');

Route::get('/cuenta/admin/abmCategoria/{id}', "CategoriaController@destroy")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');

#------------Fin CRUD Categorias------------------------#
#------------ CRUD Producto------------------------#
Route::get("/cuenta/admin/producto/lista","ProductoController@index")->middleware('auth')->middleware('verified')->middleware('adminControl');
Route::get("/cuenta/admin/producto/agrega","ProductoController@create")->middleware('auth')->middleware('verified')->middleware('adminControl');
Route::post("/cuenta/admin/producto/formagrega","ProductoController@store")->middleware('auth')->middleware('verified')->middleware('adminControl');
Route::get("/cuenta/admin/producto/modificar/{id}","ProductoController@edit")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');
Route::patch("/cuenta/admin/producto/formmodificar/{id}","ProductoController@update")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');
Route::get("/cuenta/admin/producto/eliminar/{id}","ProductoController@destroy")->where('id', '[0-9]+')->middleware('auth')->middleware('verified')->middleware('adminControl');
#------------Fin CRUD Producto------------------------#
#------------ CRUD cuenta comun------------------------#

Route::get('/cuenta/perfil', "UsuarioController@show")->middleware('auth')->middleware('verified')->middleware('verified')->name('perfil');
Route::get('/cuenta/perfil/guardar/{id?}', "UsuarioController@edit")->where('id', '[0-9]+')->middleware('auth')->middleware('verified');
Route::post('/cuenta/perfil/guardar/{id?}', "UsuarioController@update")->where('id', '[0-9]+')->middleware('auth')->middleware('verified');
Route::get('/cuenta/resumen', function(){
  return view('resumen');
})->middleware('auth')->middleware('verified');
Route::get("/cuenta/resumen/vaciar/{id}","CarritoController@destroy")->where('id', '[0-9]+')->middleware('auth')->middleware('verified');

Route::get('/cuenta/seguridad', function(){
  return view('seguridad');
})->middleware('auth')->middleware('verified');
Route::post('/cuenta/seguridad/pass',"UsuarioController@updatePassword")->middleware('auth')->middleware('verified');
#------------ CRUD cuenta comun fin------------------------#

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get("/listaProductos/{cat?}/{marca?}","ProductoController@lista")->where('cat', '[0-9]+')->where('marca', '[0-9]+')->name('lista');
Route::get("/listaProductos/descuentos/{cat?}","ProductoController@listaPorDescuento")->where('cat', '[0-9]+')->name('listaPorDescuento');
#------------------social-----------------#

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

#------------------Erros-----------------#
Route::get('/error', function(){
  return response()->view("error.error")
    ->header('status', 404)
    ->header('Refresh', '5; url=/');
});
Route::fallback(function(){
  return response()->view("error.error")
    ->header('status', 404)
    ->header('Refresh', '5; url=/');
});