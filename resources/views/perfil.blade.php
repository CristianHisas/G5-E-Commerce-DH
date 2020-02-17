@extends('layouts.login')


@php
//dd($activeUser);  
@endphp


@section('contenido_login')
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 usuario">
            <h1>Perfil</h1>
            @isset($msj)
          
            @if ($msj[0]=="success")
            <p class="btn alert alert-{{$msj[0]}} col-12" role="alert">
            {{$msj[1]}}
            @endif
            @if ($msj[0]=="danger")
            <p class="btn alert alert-{{$msj[0]}} col-12" role="alert">
            {{$msj[1]}}
            @endif
            </p>                  
            @endisset
            <div class=" col-lg-12 mb-4">
                <h2>Datos:</h2>
                <div class="col-12">
                  <!--Formulario-->
                <form class="container-fluir" method="post" action="/cuenta/perfil/{{(isset($guardar)?$guardar:"edit")}}/{{$activeUser->id}}" name="datosUsuario" enctype="multipart/form-data" autocomplete="on" >
                  {{ csrf_field() }}
                  <!--imagen-->

                                    <div class="d-flex flex-wrap mx-auto my-4 img-perfil img-fluid">
                                  <div class="contenedor-perfil" >
                                      <img src="{{old(asset('adjunto'),$activeUser->img)}}" alt="imagen de perfil" class=" img-hola ">
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
                                          <img src="{{old(asset('adjunto'),$activeUser->img)}}" class="img-fluid rounded mx-auto d-block" alt="..." max-width="100%"  height="auto">
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 col-lg-12 mx-auto">

                                        <!-- Campo de selección de archivo -->
                                        <input type="file" name="adjunto" accept=".jpg,.png"  class="examinar col-md-12 col-lg-12 mx-auto" >
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
                          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="{{old("usuario",$activeUser->user)}}" readonly required >
                          <small class="text-danger"></small>
                  </div>
                                      <div class="form-row my-1">
                                          <div class="col">
                                              <label for="nombre">Nombre</label>
                                              <input id="nombre" type="text" class="form-control" placeholder="ej:Juan" name="nombre" value="{{old("nombre",$activeUser->name)}}" {{(isset($input)?$input:"disabled")}} required>

                                            </div>
                                            <div class="col">
                                                <label for="apellido">Apellido</label>
                                                <input id="apellido" type="text" class="form-control" placeholder="ej:Lopez" name="apellido" value="{{old("apellido",$activeUser->apellido)}}" {{(isset($input)?$input:"disabled")}}  required>

                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="1564582635"  value="{{old("telefono",$activeUser->telefono)}}" {{(isset($input)?$input:"disabled")}} required>

                                      </div>
                                      <div class="form-group my-2">
                                          <label for="fechaNacimiento ">Fecha de Nacimiento</label>
                                          <input type="date" class="form-control" id="fechaNacimiento" placeholder="dd-mm-yyyy" name="fechaNacimiento" value="{{old("fechaNacimiento",$activeUser->fecha_nacimiento)}}" {{(isset($input)?$input:"disabled")}}  required>

                                      </div>
                                      <div class="form-group">
                                        <label for="inputAddress">Direccion</label>
                                        <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="calle altura ej:av.rivadavia 4302"  value="{{old("direccion",(($activeUser->id_direccion)?$activeUser->getDireccion->direccion:""))}}" {{(isset($input)?$input:"disabled")}} required>

                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-5">
                                          <label for="inputCity">Ciudad</label>
                                          <input type="text" class="form-control" id="inputCity" value="{{old("ciudad",(($activeUser->id_direccion)?$activeUser->getDireccion->ciudad:""))}}" placeholder="Caseros" name="ciudad" {{(isset($input)?$input:"disabled")}}  required>

                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputState">Provincia</label>
                                          <select id="inputState" class="form-control" name="provincia" {{(isset($input)?$input:"disabled")}} required >
                                            <option value="" >Seleccionar</option>
                                            @php
                                                $valorProvincia=old("provincia",($activeUser->id_direccion)?$activeUser->getDireccion->provincia:"") ;
                                            @endphp
                                            @for ($i = 0; $i < count($arrayProvincias); $i++)
                                                @php
                                                    $valor=$arrayProvincias[$i]["nombre"];
                                                @endphp
                                                @if ($valorProvincia==$valor)
                                                <option value='{{$valor}}'   selected>{{$valor}}</option>
                                                @else
                                                <option value='{{$valor}}'  >{{$valor}}</option>
                                                @endif
                                            @endfor

                                          </select>

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPais">Pais</label>
                                            <select id="inputPais" class="form-control" name="pais" {{(isset($input)?$input:"disabled")}}  required >
                                              <option value="" >Seleccionar</option>
                                              <option value='Argentina'   selected>Argentina</option>
                                            </select>

                                          </div>
                                        <div class="form-group col-md-3">
                                          <label for="inputZip">Codigo Postal</label>
                                          <input type="text" class="form-control" id="inputZip" placeholder="codigo postal" value="{{old("codigoPostal",(($activeUser->id_direccion)?$activeUser->getDireccion->cod_postal:""))}}"  name="codigoPostal" {{(isset($input)?$input:"disabled")}}  required>
                                        </div>
                                      </div>
                                      <fieldset class="form-group">
                                          <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Sexo </legend>
                                            <div class="col-sm-10">
                                              <?php $valorSexo=old("sexo",($activeUser->id_sexo)?$activeUser->getSexo->sexo:"") ;
                                                foreach ($arraySexo as $value): ?>
                                              <div class="form-check">
                                                 <?php if($valorSexo==$value->sexo){ ?>
                                                  <input class="form-check-input" type="radio" name="sexo" id="<?=$value->sexo ; ?>" value="<?=$value->id_sexo;?>" checked {{(isset($input)?$input:"disabled")}}  required>
                                                <label class="form-check-label" for="<?=$value->sexo ; ?>">
                                                  <?=$value->sexo; ?>
                                                </label>
                                                 <?php }else{ ?>
                                                    <input class="form-check-input" type="radio" name="sexo" id="<?=$value->sexo ; ?>" value="<?=$value->id_sexo;?>" {{(isset($input)?$input:"disabled")}}  required>
                                                    <label class="form-check-label" for="<?=$value->sexo ; ?>">
                                                      <?=$value->sexo; ?>
                                                </label>
                                                 <?php } ?>
                                                
                                                
                                              </div>
                                              <?php endforeach ?>



                                            </div>
                                          </div>

                                        </fieldset>
                                        <label for="datoDeTarjeta"><h5>Datos de Tarjeta</h5></label>
                                        <div class="form-group">
                                            <label for="NombreTarjeta">Nombre Completo del Titular</label>
                                            <input type="text" class="form-control" id="NombreTarjeta" name="nombreTitular"  value="{{old("nombreTitular",(($activeUser->id_tarjeta)?$activeUser->getTarjeta->nombre_titular:""))}}" placeholder="Nombre del titular" {{(isset($input)?$input:"disabled")}}  required>

                                        </div>
                                        <div class="form-group" id="datoDeTarjeta">
                                            <label for="Numerotarjeta">Numero de tarjeta</label>
                                            <input type="text" class="form-control" id="Numerotarjeta" name="numeroTarjeta"  value="{{old("numeroTarjeta",(($activeUser->id_tarjeta)?$activeUser->getTarjeta->numeroTarjeta:""))}}"  placeholder="ingrese el numero sin guiones(-) ej 5119101838103698" {{(isset($input)?$input:"disabled")}}   required>

                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                              <legend class="col-form-label col-sm-4 pt-0">Tipo de pago </legend>
                                              <div class="col-sm-10">
                                                
                                                <?php $valorTP=old("tipoDeTarjeta",(($activeUser->id_tarjeta)?$activeUser->getTarjeta->id_tipo_tarjeta:"")); ?>
                                                <?php foreach ($arrayTiposDeTarjetas as $value): ?>
                                                <div class="form-check col-4 form-check-inline">
                                                  <?php
                                                   if($valorTP==$value->id_tipo_tarjeta){ ?>
                                                         <input class="form-check-input" type="radio" name="tipoDeTarjeta" id="<?=$value->id_tipo_tarjeta; ?>" value="<?=$value->id_tipo_tarjeta; ?>" checked {{(isset($input)?$input:"disabled")}} required>
                                                  <label class="form-check-label" for="<?=$value->tipo; ?>">
                                                      <img src="/img/<?=$value->tipo; ?>.png" alt="<?=$value->tipo; ?>" width="60">
                  
                                                  </label>
                                                  <?php }else{ ?>
                                                    <input class="form-check-input" type="radio" name="tipoDeTarjeta" id="<?=$value->id_tipo_tarjeta; ?>" value="<?=$value->id_tipo_tarjeta; ?>" {{(isset($input)?$input:"disabled")}} required>
                                                  <label class="form-check-label" for="<?=$value->tipo; ?>">
                                                      <img src="/img/<?=$value->tipo; ?>.png" alt="<?=$value->tipo; ?>" width="60">
                  
                                                  </label>   
                                                 <?php } ?>
                                                 
                                                </div>
                                                <?php endforeach ?>

                                              </div>
                                            </div>

                                          </fieldset>
                                        <div class="form-group" >
                                            <label for="fechaVencimiento col-6">Fecha de Vencimiento</label>
                                            <input type="text" class="form-control col-6" id="fechaVencimiento" name="fechaVencimiento" value="{{old("fechaVencimiento",(($activeUser->id_tarjeta)?(date("m/Y",strtotime($activeUser->getTarjeta->fecha_vencimiento))):""))}}"  placeholder="mm/yyyy" {{(isset($input)?$input:"disabled")}} required>

                                        </div>
                                        <div class="form-group" >
                                            <label for="cvc" class="col-sm-4 px-0">CVC</label>
                                            <input type="text" class="form-control col-sm-6" id="cvc" name="cvc"  value="{{old("cvc",(($activeUser->id_tarjeta)?$activeUser->getTarjeta->cvc:""))}}" placeholder="ingrese el cvc" {{(isset($input)?$input:"disabled")}} required>

                                        </div>

                                      <a href="/cuenta/perfil/guardar/{{$activeUser->id}}" class="btn btn-secondary ml-md-auto boton-efecto my-2" name="editar" value="editar">Editar</a>
                                    </form>
                                    <!--Formulario-->
                </div>
          </div>
        </div>
@endsection
