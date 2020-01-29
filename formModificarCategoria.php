<?php

    include 'includes/head.php';
    include 'includes/headerAdm.php';    
    require 'clases/Categoria.php';           
    if(isset($_REQUEST['id']))
    {
        $objCategoria = new Categoria;
        $id_categoria=$_REQUEST['id'];           
        $categoria=$objCategoria->verCategoriaPorID($id_categoria);
         //var_dump($Categoria);               
    }        
?>

    <main class="container">
        <h1> Actualizacion de una Categoria</h1>         
        <form action="modificarCategoria.php" method="post">
            Categoria:
             <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria'];?>" />  
            <br>
            <input type="text" name="categoria" value="<?php echo $categoria['categoria'];?>" class="form-control" required>
            <br>
            <input type="submit" value="Modificar Categoria" class="btn btn-secondary">
            <a href="abmCategoria.php" class="btn btn-light">Volver a admin de categorias</a>

        </form>

    </main>

<?php  include 'includes/footer.php';  ?>