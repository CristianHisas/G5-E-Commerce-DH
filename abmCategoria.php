<?php
    require 'clases/Categoria.php';
    $objCategoria = new Categoria;
    $categorias = $objCategoria->listarCategorias();
    include 'includes/head.php';
    include 'includes/headerAdm.php';    
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>ABM Categorias</title>
<body>
<! -- include 'includes/headerAdm.php'; -->
<main class="container">
    <h1>Administracion de Categorias</h1>
    <a href="admin.php" class="btn btn-outline-secondary m-3">Administracion principal</a>    
    <ol class="breadcrumb"> 
      <li class="active" ><a href="formAgregarCategoria.php" class="btn btn-outline-secondary m-3">agregar</a></li>
    </ol>
    
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
                    <a href="formModificarcategoria.php?id=<?php echo $categoria['id_categoria']; ?>" class="btn btn-outline-secondary">
                        modificar
                    </a>
                </td>
                <td>
                    <a href="eliminarCategoria.php?id=<?php echo $categoria['id_categoria']; ?>" class="btn btn-outline-secondary">
                        eliminar
                    </a>
                </td>
            </tr>
<?php
            }
?>
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-outline-secondary m-3">Administracion principal</a>   
    </main>

    <?php
  include 'includes/footer.php';
  include 'includes/scriptBootstrap.php';
  ?>

</body>
</html>





