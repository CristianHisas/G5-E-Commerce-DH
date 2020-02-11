@extends('layouts.login');





@section('contenido_login')
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 usuario">
            <h1>Perfil</h1>
            <div class=" col-lg-12 mb-4">
                <h2>Datos:</h2>
                <div class="col-12">
                  <!--Formulario-->
                  <form class="container-fluir" method="post" action="/cuenta/modificarUsuario" name="datosUsuario" enctype="multipart/form-data" autocomplete="on" >
                  {{ csrf_field() }}
                  <!--imagen-->

                                    <div class="d-flex flex-wrap mx-auto my-4 img-perfil img-fluid">
                                  <div class="contenedor-perfil" >
                                      <img src="<?=(isset($_SESSION["activeUser"]["fotoPerfil"]))?$_SESSION["activeUser"]["fotoPerfil"]:asset('/img/perfil.png');?>" alt="imagen de perfil" class=" img-hola ">
                                      <!-- Button trigger modal -->
                                      <a href="" class=" fixed-bottom btn-link py-2" data-toggle="modal" data-target="#exampleModalCenter">editar</a>
                                        <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Subir Foto</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                  <div class="row">
                                      <div class="col-md-6 mx-auto my-2 bg-secondary">
                                          <img src="{{asset('/img/perfil.png')}}" class="img-fluid rounded mx-auto d-block" alt="..." max-width="100%"  height="auto">
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 col-lg-12 mx-auto">

                                        <!-- Campo de selección de archivo -->
                                        <input type="file" name="adjunto" accept=".jpg,.png"  class="examinar col-md-12 col-lg-12 mx-auto"  >
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                                  </div>
                                  <small class="text-danger"></small>
                              </div>

                  <!--imagen-->
                  <div class="form-group" >
                          <label for="usuario">Usuario</label>
                          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="<?=(isset($_SESSION["activeUser"]["usuario"]))?$_SESSION["activeUser"]["usuario"]:"" ;?>" readonly required >
                          <small class="text-danger"></small>
                  </div>
                                      <div class="form-row my-1">
                                          <div class="col">
                                              <label for="nombre">Nombre</label>
                                              <input id="nombre" type="text" class="form-control" placeholder="ej:Juan" name="nombre" value="<?=(isset($_SESSION["activeUser"]["nombre"]))?$_SESSION["activeUser"]["nombre"]:"" ;?>"  required>
                                              <small class="text-danger"></small>
                                            </div>
                                            <div class="col">
                                                <label for="apellido">Apellido</label>
                                                <input id="apellido" type="text" class="form-control" placeholder="ej:Lopez" name="apellido" value="<?=(isset($_SESSION["activeUser"]["apellido"]))?$_SESSION["activeUser"]["apellido"]:"" ;?>"   required>
                                                <small class="text-danger"></small>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="1564582635"  value="<?=(isset($_SESSION["activeUser"]["telefono"]))?$_SESSION["activeUser"]["telefono"]:"" ;?>"  required>
                                        <small class="text-danger"></small>
                                      </div>
                                      <div class="form-group my-2">
                                          <label for="fechaNacimiento ">Fecha de Nacimiento</label>
                                          <input type="date" class="form-control" id="fechaNacimiento" placeholder="dd-mm-yyyy" name="fechaNacimiento" value="<?=(isset($_SESSION["activeUser"]["fechaNacimiento"]))?$_SESSION["activeUser"]["fechaNacimiento"]:"" ;?>"   required>
                                          <small class="text-danger"></small>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputAddress">Direccion</label>
                                        <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="calle altura ej:av.rivadavia 4302"  value="<?=(isset($_SESSION["activeUser"]["direccion"]))?$_SESSION["activeUser"]["direccion"]:"" ;?>"  required>
                                        <small class="text-danger"></small>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-5">
                                          <label for="inputCity">Ciudad</label>
                                          <input type="text" class="form-control" id="inputCity" value="<?=(isset($_SESSION["activeUser"]["ciudad"]))?$_SESSION["activeUser"]["ciudad"]:"" ;?>" placeholder="Caseros" name="ciudad"  required>
                                          <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputState">Provincia</label>
                                          <select id="inputState" class="form-control" name="provincia"  required >
                                            <option value="" >Seleccionar</option>

                                          </select>
                                          <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Pais</label>
                                            <select id="inputState" class="form-control" name="pais"  required >
                                              <option value="" >Seleccionar</option>

                                            </select>
                                            <small class="text-danger"></small>
                                          </div>
                                        <div class="form-group col-md-3">
                                          <label for="inputZip">Codigo Postal</label>
                                          <input type="text" class="form-control" id="inputZip" placeholder="codigo postal" value="<?=(isset($_SESSION["activeUser"]["codigoPostal"]))?$_SESSION["activeUser"]["codigoPostal"]:"" ;?>"  name="codigoPostal" required>
                                          <small class="text-danger"></small>
                                        </div>
                                      </div>
                                      <fieldset class="form-group">
                                          <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Sexo </legend>
                                            <div class="col-sm-10">




                                            </div>
                                          </div>
                                          <small class="text-danger"></small>
                                        </fieldset>
                                        <label for="datoDeTarjeta"><h5>Datos de Tarjeta</h5></label>
                                        <div class="form-group">
                                            <label for="NombreTarjeta">Nombre Completo del Titular</label>
                                            <input type="text" class="form-control" id="NombreTarjeta" name="nombreTitular"  value="<?=(isset($_SESSION["activeUser"]["nombreTitular"]))?$_SESSION["activeUser"]["nombreTitular"]:"" ;?>" placeholder="Nombre del titular"  required>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group" id="datoDeTarjeta">
                                            <label for="Numerotarjeta">Numero de tarjeta</label>
                                            <input type="text" class="form-control" id="Numerotarjeta" name="numeroTarjeta"  value="<?=(isset($_SESSION["activeUser"]["numeroTarjeta"]))?$_SESSION["activeUser"]["numeroTarjeta"]:"" ;?>"  placeholder="ingrese el numero sin guiones(-) ej 5119101838103698"  required>
                                            <small class="text-danger"></small>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                              <legend class="col-form-label col-sm-4 pt-0">Tipo de pago </legend>
                                              <div class="col-sm-10">
                                              </div>
                                            </div>
                                            <small class="text-danger"></small>
                                          </fieldset>
                                        <div class="form-group" >
                                            <label for="fechaVencimiento col-6">Fecha de Vencimiento</label>
                                            <input type="text" class="form-control col-6" id="fechaVencimiento" name="fechaVencimiento" value="<?=(isset($_SESSION["activeUser"]["fechaVencimiento"]))?$_SESSION["activeUser"]["fechaVencimiento"]:"" ;?>"  placeholder="mm/yyyy" required>
                                            <small class="text-danger"></small>
                                        </div>
                                        <div class="form-group" >
                                            <label for="cvc" class="col-sm-4 px-0">CVC</label>
                                            <input type="text" class="form-control col-sm-6" id="cvc" name="cvc"  value="<?=(isset($_SESSION["activeUser"]["cvc"]))?$_SESSION["activeUser"]["cvc"]:"" ;?>" placeholder="ingrese el cvc"  required>
                                            <small class="text-danger"></small>
                                        </div>
                                      <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto my-2" name="editar">Editar</button>
                                      <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto my-2" name="guardar">guardar</button>
                                    </form>
                                    <!--Formulario-->
                </div>
          </div>
        </div>
@endsection
