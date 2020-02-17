<?php
    require 'clases/Conexion.php';
    require 'clases/Categoria.php';
    $objCategoria = new Categoria;
    $categorias = $objCategoria->listarCategorias();
    
  //  include 'includes/header.html';
  //  include 'includes/nav.php';
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include 'includes/head.php';?>
<?php include 'includes/headerAdm.php'; ?>

<title>ABM Categorias</title>

<body>
<! -- include 'includes/headerAdm.php'; -->
<main class="container">
    <h1>Administracion de Categorias</h1>

    <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

        <table class="table table-stripped table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Categoria</th>
                <th colspan="2">
                    <a href="formAgregarCategoria.php" class="btn btn-dark">
                        agregar
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
<?php
            foreach ( $categorias as $categoria  ){
?>
            <tr>
                <td><?= $categoria['id_categoria']; ?></td>
                <td><?= $categoria['categoria']; ?></td>
                <td>
                    <a href="formModificarcategoria.php" class="btn btn-outline-secondary">
                        modificar
                    </a>
                </td>
                <td>
                    <a href="formEliminarCategoria.php" class="btn btn-outline-secondary">
                        eliminar
                    </a>
                </td>
            </tr>
<?php
            }
?>
            </tbody>
        </table>

    <a href="admin.php" class="btn btn-outline-secondary m-3">Volver a principal</a>

    </main>

    <?php
  include 'includes/footer.php';
  include 'includes/scriptBootstrap.php';
  ?>

</body>
</html>





