
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include 'includes/head.php';?>
<title>ABM Productos</title>


<! -- body -->

  <?php include 'includes/headerAdm.php'; ?>

  <main class="container ">
    <h1>Administración</h1>

    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="abmMarca.php">
            Panel de administración de Marcas
        </a>
        <a class="list-group-item list-group-item-action" href="abmCategoria.php">
            Panel de administración de Categorías
        </a>
        <a class="list-group-item list-group-item-action" href="abmProducto.php">
            Panel de administración de Productos
        </a>
        <a class="list-group-item list-group-item-action" href="adminUsuarios.php">
            Panel de administración de Usuarios
        </a>
    </div>
</main>
    
    
  <?php
  include 'includes/footer.php';
  include 'includes/scriptBootstrap.php';
  ?>

<! -- /body -->


</html>
