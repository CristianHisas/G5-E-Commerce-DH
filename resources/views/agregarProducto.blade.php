<!DOCTYPE html>
<html lang="en" dir="ltr">
  @include('inc.head')
<title>ABM Productos</title>

<body>

  @include('inc.headerPerfil')

  <main>

    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class="mb-0 d-flex justify-content-between align-items-center">
              <button class="btn btn-link mr-3 ">
              Agregar Producto
              </button>
              <p class="btn alert alert-" role="alert">

              </p>
              <a href="abmProducto.php" class=" btn btn-primary ml-3">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class=" carrito-resumen">
          <div class="card-body ">
              <form class="altaProducto" action="/cuenta/admin/producto/formagrega" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{old("nombre")}}" require>
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" id="descripcion" rows="8" cols="80" name="descripcion" >{{old("descripcion")}}</textarea>
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="text" class="form-control " id="precio" name="precio" min="1" value="{{old("precio")}}" require >
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="stock">stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" min="1" value="{{old("stock")}}" require>
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <select class="form-control" id="marca" name="marca">
                      <option value="0" >Seleccionar</option>


                    <?php
                      $marcaElegida=old("marca");
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
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <select class="form-control" id="categoria" name="categoria">
                    <option value="0" >Seleccionar</option>


                  <?php
                      $categoriaElegida=old("categoria");
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
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="descuento">descuento</label>
                  <input type="text" class="form-control" id="descuento" name="descuento"  pattern="(^0?|^[1-9]{1}+[0-9]{1})+([\.]([0-9]){1,2})?$"  value="{{old("descuento")}}" >
                  <small class="text-danger"></small>
                </div>
                <div class="form-group text-center">
                  <label for="" class="col-12">Imagen</label>
                  <input type="text" name="imagenActual" value="{{old("img","/img/Productos/phone.png")}}" readonly hidden>
                  <img src="/img/Productos/phone.png" alt="" sizes="" width="" class="" height="300px">
                  <label for="img" class="text-left col-12">Cambiar</label>
                  <input type="file" class="form-control-file" id="img" name="img" class="">
                  <small class="text-danger"></small>
                </div>


                <button type="submit" class="btn btn-primary mb-2" name="btnCargar" value="cargar">Cargar</button>

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
