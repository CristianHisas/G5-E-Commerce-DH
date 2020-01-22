<?php
require_once ('includes/pdo.php');
require_once 'clases/Producto.php';

$producto = new Producto();
function obtenerListaProductos($db){
  $sql = "SELECT id_producto as id,nombre,descripcion,cantidad as stock,marca,categoria,descuento,img
      FROM productos as p
        inner join categorias as c on p.id_categoria=c.id_categoria
        inner join marcas as m on p.id_marca=m.id_marca";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  //$variable = $stmt->fetchAll(PDO::FETCH_ASSOC);//array asociado
  $variable = $stmt->fetchAll(PDO::FETCH_CLASS,"Producto");//array de objeto
  return $variable;
}
$variable=obtenerListaProductos($db);
//var_dump($variable);
if ($_POST) {
 // var_dump($_POST);
 // exit;
  if (isset($_POST["btnCargar"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $stock = $_POST["stock"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $descuento = $_POST["descuento"];
    $img = "gdshgd";//$_POST["img"]; esto lo deje asi para que funciones pero tendria que ir la direccion

    $producto->altaProducto($db, $nombre, $descripcion, $stock, $marca, $categoria, $descuento, $img);
  }elseif (isset($_POST["btnBorrar"])) {
    $id = $_POST["id"];

    $producto->borrarProducto($db, $id);
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include 'includes/head.php';?>
<title>ABM Productos</title>

<body>

  <?php include 'includes/headerAdm.php'; ?>

  <main>

    <div class="container">
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"  aria-expanded="false" aria-controls="collapseOne">
                Agregar Productos
              </button>
            </h5>
          </div>

          <div id="collapseOne" class ="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <form class="altaProducto" action="" method="post" enctype="multipart/form-data">

                <label for="nombre">Nombre del producto</label>
                <br>
                <input type="text" name="nombre" value="">
                <br>
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" rows="8" cols="80"></textarea>
                <br>
                <label for="stock">Stock</label>
                <br>
                <input type="number" name="stock" min=0 value="">
                <br>
                <label for="marca">Marca</label>
                <br>
                <input type="number" name="marca" min=1 value="">
                <br>
                <label for="categoria">Categoria</label>
                <br>
                <input type="number" name="categoria" min=1 value="">
                <br>
                <label for="descuento">Descuento</label>
                <br>
                <input type="number" name="descuento" min=0 value="">
                <br>
                <label for="img">Imagen</label>
                <br>
                <input type="file" name="img" value="">
                <br><br>

                <button type="submit" name="btnCargar" value="cargar">Cargar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Modificar Productos
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              <form class="modificarProducto" action="" method="post">

              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Eliminar Productos
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              <form class="borrarProducto" action="" method="post">
                <label for="id">Id del producto que se desea borrar</label>
                <br>
                <input type="number" min=1 name="id" value="">

                <button type="submit" name="btnBorrar" value="borrar">Borrar</button>
              </form>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Lista de Productos
              </button>
            </h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <ul class="list-group">
              <?php foreach ($variable as $key => $value) { ?>

                <li class="list-group-item">
                  <div class="card-body px-0">
                    <form class="form-inline" action="" method="post">
                      <div class="form-group mb-1 col-1 px-1" >
                        <input type="text" readonly class="form-control-plaintext" id="id" value="<?=$value->getId();?>" name="id">
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <input type="text"  class="form-control-plaintext" id="nombre" value="<?=$value->getNombre();?>" name="nombre">
                      </div>
                      <div class="form-group mb-2 col-2">

                        <input type="text" class="form-control-plaintext" name="descripcion" readonly  id="descripcion" value="<?=$value->getDescripcion();?>">
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <input type="text" class="form-control-plaintext" name="stock" value="<?=$value->getStock();?>" id="stock">
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <input type="text" class="form-control-plaintext" name="marca" value="<?=$value->getMarca();?>" id="marca">
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <input type="text" class="form-control-plaintext" name="categoria" value="<?=$value->getCategoria();?>" id="categoria">
                      </div>
                      <div class="form-group mb-2 col-1 px-1">

                        <input type="text" class="form-control-plaintext" name="descuento" value="<?=$value->getDescuento();?>" id="categoria">
                      </div>
                      <div class="form-group mb-2 col-2">

                        <img src="<?=$value->getImg();?>" alt="" sizes="30px">
                      </div>
                      <div class="form-group mb-2 col-2">
                        <button type="submit" class="btn btn-primary mx-2 mb-1 " name="modificar_l" value="<?=$key;?>">Modificar</button>
                        <button type="submit" class="btn btn-primary mx-2 mb-1 " name="eliminar_l" value="<?=$key;?>">Eliminar</button>
                      </div>
                    </form>
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
