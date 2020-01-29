<?php
    require 'clases/Categoria.php';
    include 'includes/head.php';
    include 'includes/headerAdm.php'; 
    $objCategoria = new Categoria;   
    isset($_REQUEST['id']);    
    $chequeo =  $objCategoria->eliminarCategoria();  
    
?>

    <main class="container">
        <h1>Dar de baja una Categoria</h1>
<?php
       $mensaje='';
       // $mensaje = 'No se pudo eliminar la Categoria';
        $class = 'danger';
        if( $chequeo=true){
           // $mensaje = 'Categoria: '.$objCategoria->getCategoria();
            $mensaje .= '<br>La categoria con ID: '.$_REQUEST['id'];//La idea era mostrar el nombre de la categoria 
            ///eliminada
            $mensaje .= ' fue eliminada con exito!';
            $class = 'success';
        }
?>
       <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="abmCategoria.php" class="btn btn-light">Volver a admin de categorias</a>
    </main>

<?php  include 'includes/footer.php';  ?>