<?php
    $objMarca = new Marca;
    isset($_REQUEST['id']);

    $chequeo =  $objMarca->eliminarMarca();
    var_dump($chequeo);
?>

@include('inc.head')
@include('inc.headerAdm')

    <main class="container">
        <h1>Dar de baja una Marca</h1>
<?php
       $mensaje='';
       // $mensaje = 'No se pudo eliminar la Marca';
        $class = 'danger';
        if( $chequeo){
           // $mensaje = 'Marca: '.$objMarca->getMarca();
            $mensaje .= '<br>La marca con ID: '.$_REQUEST['id'];//La idea era mostrar el nombre de la marca
            ///eliminada
            $mensaje .= ' fue eliminada con exito!.';
            $class = 'success';
        }else{
            // $mensaje = 'Marca: '.$objMarca->getMarca();
            $mensaje .= '<br>La marca con ID: '.$_REQUEST['id'];//La idea era mostrar el nombre de la marca
            ///eliminada
            $mensaje .= ' no se puede eliminar!.';
            $class = 'danger';
        }
?>
       <div class="alert alert-<?= $class; ?>">
            <?= $mensaje; ?>
        </div>
        <a href="abmMarca.php" class="btn btn-light">Volver a admin de marcas</a>
    </main>

  @include('inc.footer') 
