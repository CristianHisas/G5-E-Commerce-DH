
    @include ('inc.head')
    @include ('inc.headerAdm')


    <main class="container">
        <h1>Actualizacion de una Categoria</h1>
<?php
        $mensaje = 'No se pudo actualizar la Categoria';
        $class = 'danger';
        if( $Categoria->categoria != NULL ){
            $mensaje = 'Categoria: '.$Categoria->categoria;
            $mensaje .= ' se actualizo!.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="abmCategoria" class="btn btn-light">Volver a admin de Categorias</a>
    </main>

@include ('inc.footer')
