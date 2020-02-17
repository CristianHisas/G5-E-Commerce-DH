@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main>

    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class="mb-0 d-flex justify-content-between ">
              <button class="btn btn-link mr-3" >
                Lista de Productos
              </button>
              <a href="/cuenta/admin/producto/agrega" class="btn btn-primary ml-3 ">Agregar</a>
              <a href="/cuenta/admin" class="btn btn-primary ml-3">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class=" carrito-resumen" >
            <ul class="list-group">
              <li class="list-group-item">
                <div class="card-body form-inline d-flex justify-content-between px-0">
                  <div class="form-group mb-1 col-1 px-1" >
                      <span  class="form-control-plaintext text-center">Id</span>
                  </div>
                  <div class="form-group mb-1 col-2 px-1" >
                      <span  class="form-control-plaintext text-center">Nombre</span>
                  </div>
                  <div class="form-group mb-1 col-1 px-0" >
                      <span  class="form-control-plaintext text-center">Descripcion</span>
                  </div>
                  <div class="form-group mb-1 col-1 " >
                      <span  class="form-control-plaintext text-center">Precio</span>
                  </div>
                  <div class="form-group mb-1 col-1 px-1" >
                      <span  class="form-control-plaintext text-center">Stock</span>
                  </div>
                  <div class="form-group mb-1 col-2 px-1" >
                      <span  class="form-control-plaintext text-center">Marca</span>
                  </div>
                  <div class="form-group mb-1 col-1 px-1" >
                      <span  class="form-control-plaintext text-center">Categoria</span>
                  </div>
                  <div class="form-group mb-1 col-1 px-1" >
                      <span  class="d-block form-control-plaintext text-center">Descuento</span>
                  </div>
                  <div class="form-group mb-1 col-2 px-1" >
                      <span  class="d-block text-center form-control-plaintext text-center ">Imagen</span>
                  </div>
                </div>
              </li>
              <?php

              foreach ($productos as $key => $value) {
                
                ?>

                <li class="list-group-item">
                  <div class="card-body  px-0">
                    <form class="form-inline d-flex justify-content-between " action="/cuenta/admin/Producto/modificar/{{$value->id_producto}}" method="get">
                      <div class="form-group mb-1 col-1 px-1" >
                        <span  class="form-control-plaintext text-center" ><?=$value->id_producto;?></span>
                        <input type="text" readonly class="form-control-plaintext text-center" id="id" value="<?=$value->id_producto;?>" name="id" readonly hidden>
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span  class="form-control-plaintext text-center" ><?=$value->nombre;?></span>
                      </div>
                      <div class="form-group mb-2 col-1">

                        <span class="form-control-plaintext text-center" >
                          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalCenter">
                            Ver
                          </button>
                        </span>
                      </div>
                      <!--modal de descripcion -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Descripcion</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <?php
                                  $array=explode(PHP_EOL,$value->descripcion);
                                  foreach ($array as $key => $caracteristica) {?>
                                    <ul type="circle">
                                      <li >
                                        <?=$caracteristica;?>
                                      </li>
                                    </ul>
                                  <?php
                                  }
                                  ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--modal de descripcion -->
                      <div class="form-group mb-2 col-1">

                        <span class="form-control-plaintext text-center" >$ <?=$value->precio;?></span>
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <span class="form-control-plaintext text-center" ><?=$value->cantidad;?></span>
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span class="form-control-plaintext text-center" ><?=$value->getMarca->marca;?></span>
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <span class="form-control-plaintext text-center d-block" ><?=$value->getCategoria->categoria;?></span>
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <span class="form-control-plaintext text-center d-block" ><?=$value->descuento;?>%</span>
                      </div>
                      <div class="form-group mb-2 col-2 text-center">

                        <img src="<?=$value->img;?>" alt="" sizes="" width="80%" class="zoom">
                      </div>
                      <div class="form-group mb-2 col-12 text-center">
                        <a class="btn btn-primary mx-2 mb-1 "  href="/cuenta/admin/producto/modificar/{{$value->id_producto}}">Modificar</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mx-2 mb-1 " name="eliminar_l" value="<?=$value->id_producto;?>" data-toggle="modal" data-target="#eliminar<?=$value->id_producto;?>Modal">
                            Eliminar
                        </button>
                      </form>
                      <div class="form-inline d-flex justify-content-between " action="" method="post">
                        <!-- Modal -->
                        <div class="modal fade" id="eliminar<?=$value->id_producto;?>Modal" tabindex="-1" role="dialog" aria-labelledby="eliminar<?=$value->id_producto;?>ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?=$value->id_producto;?>ModalLabel">Desea eliminar este producto?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body d-flex align-items-center justify-content-center flex-wrap">
                                <div class="form-group mb-2 col-10 px-1 ">
                                  <span  class="form-control-plaintext " ><?=$value->nombre;?></span>
                                </div>
                                <div class="form-group mb-2 col-5 text-center">
                                  
                                  <img src="{{asset($value->img)}}" alt="Foto Celular" sizes="" width="80%" class="">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <a class="btn btn-primary mx-2 mb-1 "  href="/cuenta/admin/producto/eliminar/{{$value->id_producto}}">Eliminar</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      </div>

                  </div>
                </li>

              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <span class="form-control-plaintext mx-auto d-linea">{{$productos->links()}}</span>
    
  </main>
  @endsection
