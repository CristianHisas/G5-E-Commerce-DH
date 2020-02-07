<?php
    if(isset($_REQUEST['id']))
    {
        $objMarca = new Marca;
        $id_marca=$_REQUEST['id'];
        $marca=$objMarca->verMarcaPorID($id_marca);
         //var_dump($marca);
    }
?>

@include('inc.head')
@include('inc.headerAdm')

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

@include('inc.footer')
