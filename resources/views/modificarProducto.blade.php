<!DOCTYPE html>
<html lang="en" dir="ltr">
  @include('inc.head')
<title>Modificar Productos</title>

<body>

  @include('inc.headerPerfil')



  <main>

    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class=" mb-0 d-flex justify-content-between align-items-center">
              <button class="btn btn-link mr-3 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Modificar Producto
              </button>
              <p class="btn alert alert-" role="alert">

              </p>
              <a href="abmProducto.php" class=" btn btn-primary ml-3 ">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse carrito-resumen" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body ">

              <form class="modificarProducto" action="" method="post" enctype="multipart/form-data">

              <input type="number" class="form-control" id="id" name="id" value="<?=$unProducto->getId();?>" readonly hidden>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$unProducto->getNombre();?>">
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nombre"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <pre>
                  <textarea class="form-control" id="descripcion" rows="8" cols="80" name="descripcion" ><?=$unProducto->getDescripcion();?></textarea>
                  </pre>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"descripcion"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="text" class="form-control" id="precio" name="precio"  value="<?=$unProducto->getPrecio();?>">
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"precio"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="stock">stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" min="1" value="<?=$unProducto->getStock();?>">
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"stock"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <select class="form-control" id="marca" name="marca">
                    <?php
                      $marcas=$marca->listarMarcas();
                      foreach ($marcas as $key => $value) {
                    ?>
                    <?php
                      if ($unProducto->getMarca()==$value["marca"]) {?>
                        <option value="<?=$value["id_marca"];?>" selected><?=$value["marca"];?></option>
                      <?php }else{?>

                        <option value="<?=$value["id_marca"];?>"><?=$value["marca"];?></option>
                      <?php } ?>
                    <?php
                      }
                    ?>
                  </select>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"marca"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <select class="form-control" id="categoria" name="categoria">
                  <?php
                      $categorias=$categoria->listarcategorias();
                      foreach ($categorias as $key => $value) {
                    ?>
                    <?php
                      if($unProducto->getCategoria()==$value["categoria"]){
                    ?>
                        <option value="<?=$value["id_categoria"];?>" selected><?=$value["categoria"];?></option>
                    <?php  }else{ ?>
                      <option value="<?=$value["id_categoria"];?>" ><?=$value["categoria"];?></option>
                    <?php
                      }
                    ?>

                    <?php
                      }
                    ?>
                  </select>
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"categoria"):""; ?></small>
                </div>
                <div class="form-group">
                  <label for="descuento">descuento</label>
                  <input type="text" class="form-control" id="descuento" name="descuento" min="1" max="100" value="<?=$unProducto->getDescuento();?>">
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"descuento"):""; ?></small>
                </div>
                <div class="form-group text-center">
                  <label for="img" class="col-12">Imagen</label>
                  <img src="<?=$unProducto->getImg();?>" alt="" sizes="" width="80%" class="col-3" height="">
                  <input type="text" name="imagenActual" value="<?=$unProducto->getImg();?>" readonly hidden>
                  <label for="img" class="text-left col-12">Cambiar</label>
                  <input type="file" class="form-control-file" id="img" name="img" class="">
                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"img"):""; ?></small>
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
