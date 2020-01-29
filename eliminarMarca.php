<?php
require_once 'clases/Conexion.php';
    require 'clases/Marca.php';
    include 'includes/head.php';
    include 'includes/headerAdm.php'; 
    $objMarca = new Marca;   
    isset($_REQUEST['id']);    
    $chequeo =  $objMarca->eliminarMarca();  
    
?>

    <main class="container">
        <h1>Dar de baja una Marca</h1>
<?php
       $mensaje='';
       // $mensaje = 'No se pudo eliminar la Marca';
        $class = 'danger';
        if( $chequeo=true){
           // $mensaje = 'Marca: '.$objMarca->getMarca();
            $mensaje .= '<br>La marca con ID: '.$_REQUEST['id'];//La idea era mostrar el nombre de la marca 
            ///eliminada
            $mensaje .= ' fue eliminada con exito!.';
            $class = 'success';
        }
?>
       <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="abmMarca.php" class="btn btn-light">Volver a admin de marcas</a>
    </main>

<?php  include 'includes/footer.php';  ?>




