<?php
    require 'clases/Conexion.php';
    require 'clases/Marca.php';
    $objMarca = new Marca;
    $chequeo = $objMarca->agregarMarca();
    //  include 'includes/header.html';
    //  include 'includes/nav.php';
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
            header("Location: abmMarca.php");
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>

    </main>

<?php  include 'includes/footer.php';  ?>
