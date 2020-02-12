<!DOCTYPE html>
<html lang="en" dir="ltr">
  @include('inc.head')
<title>Modificar Productos</title>

<body>

  @include('inc.headerPerfil')



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
                <div class="form-group text-center">
                  <label for="" class="col-12">Imagen</label>
                  <input type="text" name="imagenActual" value="{{old("img",$producto->img)}}" readonly hidden>
                  <img src="{{old("img",$producto->img)}}" alt="" sizes="" width="" class="" height="300px">
                  <label for="img" class="text-left col-12">Cambiar</label>
                  <input type="file" class="form-control-file" id="img" name="img" class="">
                                    <small class="text-danger">
                    @if ($errors->has("img"))
                        <ul class='text-decoration-none'>
                        @foreach ($errors->get("img") as $mensaje)
                        <li>{{$mensaje}}</li>
                        @endforeach
                        </ul>
                    @endif
                    </small>
                </div>

                <button type="submit" class="btn btn-primary mb-2" name="modificar_id" value="">Modificar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>






  @include('inc.footer')

</body>
</html>
