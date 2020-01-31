<?php
require_once 'clases/Conexion.php';
    include 'includes/head.php';
    include 'includes/headerAdm.php'; 
?>

    <main class="container">
        <h1>Alta de una marca</h1>

        <form action="agregarMarca.php" method="post">
            Marca:
            <br>
            <input type="text" name="marca" class="form-control" required>
            <br>
            <input type="submit" value="Agregar Marca" class="btn btn-secondary">
            <a href="abmMarca.php" class="btn btn-light">Volver a admin de marcas</a>

        </form>

    </main>

<?php  include 'includes/footer.php';  ?>