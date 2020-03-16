@extends('layouts.app')
@section('csspersonal')
"{{ asset('/css/styles.css') }}"
@endsection
@section('content')
  <main>
    @php
  // dd($producto);
    @endphp
    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class=" mb-0 d-flex justify-content-between align-items-center">
              <button class="btn btn-link mr-3 " >
              Modificar Producto
              </button>
              @if ($errors->all() && isset($errors))
              @php
                  $msj[0]="danger";
                  $msj[1]="No se pudo modificar el Producto";
              @endphp
              @endif
              @isset($msj)
            
              @if ($msj[0]=="success")
              <p class="btn alert alert-{{$msj[0]}}" role="alert">
              {{$msj[1]}}
              @endif
              @if ($msj[0]=="danger")
              <p class="btn alert alert-{{$msj[0]}}" role="alert">
              {{$msj[1]}}
              @endif
              </p>                  
              @endisset
                  
              <a href="/cuenta/admin/producto/lista" class=" btn btn-primary ml-3 ">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class=" carrito-resumen" >
          <div class="card-body ">

              <form class="modificarProducto" action="/cuenta/admin/producto/formmodificar/{{$producto["id_producto"]}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old("nombre",$producto->nombre)}}" require>
                  <small class="text-danger">
                  @if ($errors->has("nombre"))
                      <ul class='text-decoration-none'>
                      @foreach ($errors->get("nombre") as $mensaje)
                      <li>{{$mensaje}}</li>
                      @endforeach
                      </ul>
                  @endif
                  </small>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" id="descripcion" rows="8" cols="80" name="descripcion" title="ej: color:rojo (luego ir a la otra linea con Enter)">{{old("descripcion",$producto->descripcion)}}</textarea>
                  <small class="text-danger">
                    @if ($errors->has("descripcion"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("descripcion") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="text" class="form-control " id="precio" name="precio" min="1" value="{{old("precio",$producto->precio)}}" require title="Ej:25.50 siempre con dos decimales">
                                    <small class="text-danger">
                    @if ($errors->has("precio"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("precio") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>
                <div class="form-group">
                  <label for="stock">stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" min="1" value="{{old("stock",$producto->cantidad)}}" require>
                                    <small class="text-danger">
                    @if ($errors->has("stock"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("stock") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <select class="form-control" id="marca" name="marca">
                      <option value="0" >Seleccionar</option>


                    <?php
                      $marcaElegida=old("marca",$producto->getMarca->id_marca);
                      foreach ($marcas as $key => $value) {
                        if($value["id_marca"]==$marcaElegida){ ?>
                        <option value="<?=$value["id_marca"];?>" selected><?=$value["marca"];?></option>
                    <?php
                        }else{
                    ?>
                        <option value="<?=$value["id_marca"];?>"><?=$value["marca"];?></option>
                    <?php
                      }
                    ?>


                    <?php
                      }
                    ?>


                  </select>
                                    <small class="text-danger">
                    @if ($errors->has("marca"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("marca") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>
                <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <select class="form-control" id="categoria" name="categoria">
                    <option value="0" >Seleccionar</option>


                  <?php
                      $categoriaElegida=old("categoria",$producto->getCategoria->id_categoria);
                      foreach ($categorias as $key => $value) {
                        if($value["id_categoria"]==$categoriaElegida){
                  ?>
                      <option value="<?=$value["id_categoria"];?>" selected><?=$value["categoria"];?></option>
                    <?php
                        }else{
                    ?>
                        <option value="<?=$value["id_categoria"];?>"><?=$value["categoria"];?></option>
                    <?php
                      }
                    ?>
                  <?php
                      }
                  ?>


                  </select>
                                    <small class="text-danger">
                    @if ($errors->has("categoria"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("categoria") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>
                <div class="form-group">
                  <label for="descuento">descuento</label>
                  <input type="text" class="form-control" id="descuento" name="descuento"  pattern="(^0?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$"  value="{{old("descuento",$producto->descuento)}}" title="Ej:25.50 siempre con dos decimales" >
                                    <small class="text-danger">
                    @if ($errors->has("descuento"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("descuento") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>
                <div class="row">
                  <div class="form-group text-center col-6 mb-2">
                    <div class="d-flex flex-row  justify-content-between cuadro-contenedor">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 d-flex flex-column  align-items-stretch segundo-j">
                        <ul class="col-12 d-flex flex-column justify-content-between">
                          <li class="row">
                            <img src="{{old("num1",(isset($producto->getImagenes[0])?$producto->getImagenes[0]->imagen:"/img/cargar/1.png"))}}" class="cuadro-mini img-thumbnail" width="80%" title="numero 1" alt="Phone example 1">
                          </li>
                          <li class="row">
                            <img src="{{old("num2",(isset($producto->getImagenes[1])?$producto->getImagenes[1]->imagen:"/img/cargar/2.png"))}}" class="cuadro-mini img-thumbnail" width="80%" title="numero 2" alt="Phone example 1">
                          </li>
                          <li class="row">
                            <img src="{{old("num3",(isset($producto->getImagenes[2])?$producto->getImagenes[2]->imagen:"/img/cargar/3.png"))}}" class="cuadro-mini img-thumbnail" width="80%" title="numero 3" alt="Phone example 1">
                          </li>
                        </ul>
                      </div>
                      <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12   primero-j ">
                          <img src="{{old("img",$producto->img)}}"  width="60%" alt="Principal" title="Principal" class="img-telefono" id="imgPrincipal"/>
                        
                      </div>
                    </div>
                  </div>
                  <div class="form-group text-center col-6 mb-2">
                        <ul class="col-12 d-flex flex-column justify-content-between">
                          <li class="row py-2 text-left">
                            <input type="text" name="imagenActual" value="{{old("img",$producto->img)}}" readonly hidden>
                            <label for="img" class="col-12">Principal </label>
                            <input type="file" class="form-control-file col-12  mb-1" id="img" name="img" >
                            <small class="text-danger col-12  mb-1">
            @if ($errors->has("img"))
                <ul class='text-decoration-none'>
                @foreach ($errors->get("img") as $mensaje)
                <li>{{$mensaje}}</li>
                @endforeach
                </ul>
            @endif
            </small>
                          </li>
                          <li class="row py-2 text-left">
                            <label for="num1" class="col-12">Numero 1 </label>
                            <input type="file" name="num1" id="num1" class="col-12 mb-1">
                            <small class="text-danger col-12  mb-1">
                              @if ($errors->has("num1"))
                                  <ul class='text-decoration-none'>
                                  @foreach ($errors->get("num1") as $mensaje)
                                  <li>{{$mensaje}}</li>
                                  @endforeach
                                  </ul>
                              @endif
                              </small>
                          </li>
                          <li class="row py-2 text-left">
                            <label for="num2" class="col-12">Numero 2 </label>
                            <input type="file" name="num2" id="num2" class="col-12 mb-1">
                            <small class="text-danger col-12  mb-1">
                              @if ($errors->has("num2"))
                                  <ul class='text-decoration-none'>
                                  @foreach ($errors->get("num2") as $mensaje)
                                  <li>{{$mensaje}}</li>
                                  @endforeach
                                  </ul>
                              @endif
                              </small>
                          </li>
                          <li class="row py-2 text-left">
                            <label for="num3" class="col-12">Numero 3</label>
                            <input type="file" name="num3" id="num3" class="col-12 mb-1">
                            <small class="text-danger col-12  mb-1">
                              @if ($errors->has("num3"))
                                  <ul class='text-decoration-none'>
                                  @foreach ($errors->get("num3") as $mensaje)
                                  <li>{{$mensaje}}</li>
                                  @endforeach
                                  </ul>
                              @endif
                              </small>
                          </li>
                        </ul>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mb-2" name="modificar_id" value="">Modificar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  @endsection
