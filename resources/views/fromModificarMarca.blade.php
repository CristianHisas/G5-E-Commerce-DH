<?php
require_once 'clases/Conexion.php';
    include 'includes/head.php';
    include 'includes/headerAdm.php';
    require 'clases/Marca.php';
    if(isset($_REQUEST['id']))
    {
        $objMarca = new Marca;
        $id_marca=$_REQUEST['id'];
        $marca=$objMarca->verMarcaPorID($id_marca);
         //var_dump($marca);
    }
?>

    <main class="container">
        <h1> Actualizacion de una marca</h1>

        <form action="modificarMarca.php" method="post">
            Marca:
             <input type="hidden" name="id_marca" value="<?php echo $marca['id_marca'];?>" />
            <br>
            <input type="text" name="marca" value="<?php echo $marca['marca'];?>" class="form-control" required>
            <br>
            <input type="submit" value="Modificar Marca" class="btn btn-secondary">
            <a href="abmMarca.php" class="btn btn-light">Volver a admin de marcas</a>

        </form>

    </main>

<?php  include 'includes/footer.php';  ?>
