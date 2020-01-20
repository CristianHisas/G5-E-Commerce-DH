<?php
include 'clases/Producto.php';
include 'includes/pdo.php';

    if ($_POST) {
      $nombre = $_POST["nombre"];
      $descripcion = $_POST["descripcion"];
      $stock = $_POST["stock"];
      $marca = $_POST["marca"];
      $categoria = $_POST["categoria"];
      $descuento = $_POST["descuento"];
      $img = $_POST["img"];

      $producto = new Producto();

      $producto->altaProducto($db, $nombre, $descripcion, $stock, $marca, $categoria, $descuento, $img);
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
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"  aria-controls="collapseOne">
                Agregar Productos
              </button>
            </h5>
          </div>

          <div id="collapseOne" class ="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <form class="" action="" method="post" enctype="multipart/form-data">

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

                <button type="submit" name="btnCargar">Cargar</button>
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
              <form class="" action="" method="post">

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
              <form class="" action="" method="post">
                <label for="id">Id del producto que se desea borrar</label>
                <br>
                <input type="number" min=1 name="id" value="">

                <button type="submit" name="btnBorrar">Borrar</button>
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
