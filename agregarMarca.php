<?php
    require 'clases/Marca.php';
    $objMarca = new Marca;
    $chequeo = $objMarca->agregarMarca();
    include 'includes/head.php';
    include 'includes/headerAdm.php'; 
?>

    <main class="container">
        <h1>Alta de una nueva marca</h1>
<?php
        $mensaje = 'No se pudo agregar la Marca';
        $class = 'danger';
        if( $chequeo ){
            $mensaje = 'Marca '.$objMarca->getMarca();
            $mensaje .= ' agregada correctamente.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
 <a href="abmMarca.php" class="btn btn-light">Volver a admin de marcas</a>
    </main>

<?php  include 'includes/footer.php';  ?>