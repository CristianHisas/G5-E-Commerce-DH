<?php
//require_once ('includes/pdo.php');
require_once 'clases/Conexion.php';
require_once 'clases/Marca.php';
require_once 'clases/Categoria.php';
require_once 'clases/Producto.php';
include_once("includes/funciones.php");
include_once("includes/baseDeDatos.php");

$producto = new Producto();

$variable=$producto->obtenerListaProductos();
//var_dump($variable);
if ($_POST) {
 // var_dump($_POST);
 // exit;
  if (isset($_POST["btnCargar"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio= $_POST["precio"];
    $stock = $_POST["stock"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $descuento = $_POST["descuento"];
    if($_FILES["img"]["name"]!="" && $_FILES){
      $img=Producto::guardarArchivo($_FILES["img"],$_POST["nombre"]);  
    }else{
      $img="img/productos/phone.jpg";
    }
    $producto->altaProducto($img);
  }elseif (isset($_POST["btnBorrar"])) {
    $id =$_POST["btnBorrar"];

    $producto->borrarProducto($id);
    $archivoActual = $_SERVER['PHP_SELF'];
    header("refresh:1;url=$archivoActual");
	exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include 'includes/head.php';?>
<title>Productos</title>
<body>

  <?php include 'includes/headerAdm.php'; ?>

  <main>
    
    <div class="container-fluir my-3">
      <div id="accordion">
        <div class="card">
          <div class="card-header " id="headingFour">
            <h5 class="mb-0 d-flex justify-content-between">
              <button class="btn btn-link mr-3 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Lista de Productos
              </button>
              <a href="agregarProducto.php" class="btn btn-primary ml-3 ">Agregar</a>
              <a href="admin.php" class="btn btn-primary ml-3">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse carrito-resumen" aria-labelledby="headingFour" data-parent="#accordion">
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
              <?php foreach ($variable as $key => $value) { ?>

                <li class="list-group-item">
                  <div class="card-body  px-0">
                    <form class="form-inline d-flex justify-content-between " action="modificarProducto.php" method="post">
                      <div class="form-group mb-1 col-1 px-1" >
                        <input type="text" readonly class="form-control-plaintext text-center" id="id" value="<?=$value->getId();?>" name="id">
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span  class="form-control-plaintext text-center" ><?=$value->getNombre();?></span>
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
                             <!-- <p>
                                <pre>
                                  <?=$value->getDescripcion();?>
                                </pre>
                              </p>
                              -->
                              <?php 
                                  $array=explode(PHP_EOL,$value->getDescripcion());
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

                        <span class="form-control-plaintext text-center" >$ <?=$value->getPrecio();?></span>
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <span class="form-control-plaintext text-center" ><?=$value->getStock();?></span>
                      </div>
                      <div class="form-group mb-2 col-2 px-1">

                        <span class="form-control-plaintext text-center" ><?=$value->getMarca();?></span>
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <span class="form-control-plaintext text-center d-block" ><?=$value->getCategoria();?></span>
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <span class="form-control-plaintext text-center d-block" ><?=$value->getDescuento();?>%</span>
                      </div>
                      <div class="form-group mb-2 col-2 text-center">

                        <img src="<?=$value->getImg();?>" alt="" sizes="" width="80%" class="zoom">
                      </div>
                      <div class="form-group mb-2 col-12 text-center">
                        <button type="submit" class="btn btn-primary mx-2 mb-1 " name="modificar_l" value="<?=$value->getId();?>">Modificar</button>
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mx-2 mb-1 " name="eliminar_l" value="<?=$value->getId();?>" data-toggle="modal" data-target="#eliminar<?=$value->getId();?>Modal">
                            Eliminar
                        </button>
                      </form>
                      <form class="form-inline d-flex justify-content-between " action="" method="post">              
                        <!-- Modal -->
                        <div class="modal fade" id="eliminar<?=$value->getId();?>Modal" tabindex="-1" role="dialog" aria-labelledby="eliminar<?=$value->getId();?>ModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-center">
                              <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?=$value->getId();?>ModalLabel">Desea eliminar este producto?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body d-flex align-items-center justify-content-center flex-wrap">
                                <div class="form-group mb-2 col-10 px-1 ">
                                  <span  class="form-control-plaintext " ><?=$value->getNombre();?></span>
                                </div>
                                <div class="form-group mb-2 col-5 text-center">

                                  <img src="<?=$value->getImg();?>" alt="" sizes="" width="80%" class="">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary mx-2 mb-1 " name="btnBorrar" value="<?=$value->getId();?>">Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        </form>            
                      </div>
                    
                  </div>
                </li>

              <?php } ?>
            </ul>
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
