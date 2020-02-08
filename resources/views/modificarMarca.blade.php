@include('inc.head')
@include('inc.headerAdm')

    <main class="container">
        <h1>Actualizacion de una Marca</h1>
<?php
        $mensaje = 'No se pudo actualizar la Marca';
        $class = 'danger';
        if( $Marca->marca != NULL ){
            $mensaje = 'Marca: '.$Marca->marca;
            $mensaje .= ' se actualizo!.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="/abmMarca" class="btn btn-light">Volver a admin de marcas</a>
    </main>

@include('inc.footer')
