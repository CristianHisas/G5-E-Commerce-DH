
    @include('inc.head')
    @include('inc.headerAdm')


    <main class="container">
        <h1>Alta de una nueva Categoria</h1>
<?php
        $mensaje = 'No se pudo agregar la Categoria';
        $class = 'danger';
        if( $Categoria->categoria != NULL ){
            $mensaje = 'Categoria '.$Categoria->categoria;
            $mensaje .= ' agregada correctamente.';
            $class = 'success';
        }
?>
        <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
<a href="abmCategoria" class="btn btn-light">Volver a admin de categorias</a>

    </main>

@include('inc.footer')
