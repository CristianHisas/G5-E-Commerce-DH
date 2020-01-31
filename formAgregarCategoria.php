<?php
require_once 'clases/Conexion.php';
    include 'includes/head.php';
    include 'includes/headerAdm.php'; 
?>

    <main class="container">
        <h1>Alta de una categoria</h1>

        <form action="agregarCategoria.php" method="post">
            Categoria:
            <br>
            <input type="text" name="categoria" class="form-control" required>
            <br>
            <input type="submit" value="Agregar Categoria" class="btn btn-secondary">
            <a href="abmCategoria.php" class="btn btn-light">Volver a admin de categorias</a>

        </form>

    </main>

<?php  include 'includes/footer.php';  ?>