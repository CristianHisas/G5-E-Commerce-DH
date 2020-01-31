<?php
require_once 'clases/Conexion.php';
require_once 'clases/Marca.php';
require_once 'clases/Categoria.php';
require_once 'clases/Producto.php';
include_once("includes/funciones.php");
include_once("includes/baseDeDatos.php");
$producto = new Producto();
$marca=new Marca();
$categoria=new Categoria();
session_start();
$msj=false;
if(isset($_POST["id"]) && isset($_POST["modificar_l"])){
    $id=(int)$_POST["modificar_l"];
    $unProducto=$producto->buscarPorId($id);
    $_SESSION["unProducto"]=$unProducto;
}
/**
 *echo "<pre>";
*echo"post";
*var_dump($_POST);
*echo"secion";
*var_dump($_SESSION);
*echo"producto";
*var_dump($unProducto);
*echo "</pre>"; 
 */
var_dump($_SESSION["unProducto"]);


if (isset($_POST["modificar_id"])&& $_POST ){

    $id= ((int)$_POST["idM"]);//de alguna manera le tiene que llegar un id 
    if($_FILES["img"]["name"]!="" && $_FILES){
      $img=Producto::guardarArchivo($_FILES["img"],$_POST["nombre"]);  
    }else{
      $img=$_POST["imagenActual"];
    }
    
    $producto->modificarProducto($id,$img);
    $msj="success";
    $unProducto=$producto->buscarPorId($id);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include 'includes/head.php';?>
<title>ABM Productos</title>

<body>

  <?php include 'includes/headerAdm.php'; ?>

 

  <main>
    
    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class=" mb-0 d-flex justify-content-between align-items-center">
              <button class="btn btn-link mr-3 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Modificar Producto
              </button>
              <p class="btn alert alert-<?=$msj;?>" role="alert">
                <?php 
                  if($msj=="success"){
                    echo("Producto se agregada correctamente.");
                  } 
                  if($msj=="danger"){
                    echo("No se pudo agregar el Producto");
                  }
                ?>
              </p>
              <a href="abmProducto.php" class=" btn btn-primary ml-3 ">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse carrito-resumen" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body ">

              <form class="modificarProducto" action="" method="post" enctype="multipart/form-data">

              <input type="number" class="form-control" id="id" name="idM" value="<?=$unProducto->getId();?>" readonly hidden>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$unProducto->getNombre();?>">
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <pre>
                  <textarea class="form-control" id="descripcion" rows="8" cols="80" name="descripcion" value="">
                                  <?=$unProducto->getDescripcion();
                                  ?>
                  </textarea>
                  </pre>
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="number" class="form-control" id="precio" name="precio" min="0" value="<?=$unProducto->getPrecio();?>">
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="stock">stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" min="0" value="<?=$unProducto->getStock();?>">
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
                  <small class="text-danger"></small>
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
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="descuento">descuento</label>
                  <input type="number" class="form-control" id="descuento" name="descuento" min="0" max="100" value="<?=$unProducto->getDescuento();?>">
                  <small class="text-danger"></small>
                </div>
                <div class="form-group text-center">
                  <label for="img" class="col-12">Imagen</label>
                  <img src="<?=$unProducto->getImg();?>" alt="" sizes="" width="80%" class="col-3" height="">
                  <input type="text" name="imagenActual" value="<?=$unProducto->getImg();?>" readonly hidden>
                  <label for="img" class="text-left col-12">Cambiar</label>
                  <input type="file" class="form-control-file" id="img" name="img" class="">
                  <small class="text-danger"></small>
                </div>
                <button type="submit" class="btn btn-primary mb-2" name="modificar_id" value="">Modificar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>




  

  <?php
  include 'includes/footer.php';
  include 'includes/scriptBootstrap.php';
  ?>

</body>
</html>
