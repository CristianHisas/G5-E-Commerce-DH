<?php
    require 'clases/Marca.php';
    require 'clases/Conexion.php';
    
    $objMarca = new Marca;
    if(isset($_REQUEST['id_marca'])){
      $chequeo =  $objMarca->modificarMarca();
    }
    include 'includes/head.php';
    include 'includes/headerAdm.php';

?>

    <main class="container">
        <h1>Actualizacion de una Marca</h1>
<?php
        $mensaje = 'No se pudo actualizar la Marca';
        $class = 'danger';
        if( $chequeo ){
            $mensaje = 'Marca: '.$objMarca->getMarca();
            $mensaje .= ' se actualizo!.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="abmMarca.php" class="btn btn-light">Volver a admin de marcas</a>
    </main>

<?php  include 'includes/footer.php';  ?>
