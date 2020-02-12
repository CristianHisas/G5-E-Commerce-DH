
    @include('inc.head')
    @include('inc.headerAdm')


    <main class="container">
        <h1>Alta de una nueva marca</h1>
<?php
        $mensaje = 'No se pudo agregar la Marca';
        $class = 'danger';
        if($Marca->marca != NULL){
            $mensaje = 'Marca '.$Marca->marca;
            $mensaje .= ' agregada correctamente.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
 <a href="abmMarca" class="btn btn-light">Volver a admin de marcas</a>
    </main>

 @include('inc.footer')
