<?php
require_once ('includes/pdo.php');
require_once 'clases/Conexion.php';
require_once 'clases/Producto.php';
include_once("includes/funciones.php");
include_once("includes/baseDeDatos.php");
$producto = new Producto();

function obtenerListaMarcas(){
  $db=Conexion::conectar();
  try {
    $sql = "SELECT id_marca,marca 
      FROM marcas";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
    $stmt->closeCursor();
    return $variable;  
  } catch (\Exception $e) {
    echo "Error al obtener Lista de Marcas";
    $e->getMessage();
  }  
}

function obtenerListaCategorias(){
  $db=Conexion::conectar();

  try {
    $sql = "SELECT id_categoria,categoria
      FROM categorias";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
    $stmt->closeCursor();
    return $variable;
  } catch (\Exception $e) {
    echo "Error al obtener Lista de Categorias";
    $e->getMessage();
  }
}

if (isset($_POST["btnCargar"])&& $_POST ){
    var_dump($_POST);
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
            <h5 class="mb-0 d-flex justify-content-between">
              <button class="btn btn-link mr-3 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Agregar Producto
              </button>
              <a href="abmProducto.php" class="btn btn-primary btn btn-primary ml-3 ">Volver a principal</a>
            </h5>
          </div>
          <div id="collapseFour" class="collapse carrito-resumen" aria-labelledby="headingFour" data-parent="#accordion">
          <div class="card-body ">
              <form class="altaProducto" action="" method="post" enctype="multipart/form-data">

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" id="descripcion" rows="8" cols="80" name="descripcion" value=""></textarea>
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="number" class="form-control " id="precio" name="precio" min="0" value="0" >
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="stock">stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" min="0" value="0">
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <select class="form-control" id="marca" name="marca">
                    <?php 
                      $marcas=obtenerListaMarcas($db);
                      foreach ($marcas as $key => $value) { 
                    ?>
                      <option value="<?=$value["id_marca"];?>"><?=$value["marca"];?></option>
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
                      $marcas=obtenerListaCategorias($db);
                      foreach ($marcas as $key => $value) { 
                    ?>
                      <option value="<?=$value["id_categoria"];?>"><?=$value["categoria"];?></option>
                    <?php 
                      } 
                    ?>
                  </select>
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="descuento">descuento</label>
                  <input type="number" class="form-control" id="descuento" name="descuento" min="0" max="100" value="0">
                  <small class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="img">Imagen</label>
                  <input type="file" class="form-control-file" id="img" name="img" >
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

  <?php
  include 'includes/footer.php';
  include 'includes/scriptBootstrap.php';
  ?>

</body>
</html>