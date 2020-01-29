<?php
    require 'clases/Categoria.php';
    $objCategoria= new Categoria;
    if(isset($_REQUEST['id_categoria'])){     
      $chequeo =  $objCategoria->modificarCategoria();
    }    
    include 'includes/head.php';
    include 'includes/headerAdm.php'; 
    
?>

    <main class="container">
        <h1>Actualizacion de una Categoria</h1>
<?php
        $mensaje = 'No se pudo actualizar la Categoria';
        $class = 'danger';
        if( $chequeo ){
            $mensaje = 'Categoria: '.$objCategoria->getCategoria();
            $mensaje .= ' se actualizo!.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="abmCategoria.php" class="btn btn-light">Volver a admin de Categorias</a>
    </main>

<?php  include 'includes/footer.php';  ?>