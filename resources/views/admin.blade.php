<?php
session_start();
$_SESSION["msj"]="";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('inc.head')

<title>ABM Productos</title>


<!-- body -->

  @include('inc.headerAdm')

  <main class="container ">
    <h1>Administración</h1>

    <div class="list-group">
        <a class="list-group-item list-group-item-action" href="abmMarca">
            Panel de administración de Marcas
        </a>
        <a class="list-group-item list-group-item-action" href="abmCategoria">
            Panel de administración de Categorías
        </a>
        <a class="list-group-item list-group-item-action" href="abmProducto">
            Panel de administración de Productos
        </a>
        <a class="list-group-item list-group-item-action" href="adminUsuario">
            Panel de administración de Usuarios
        </a>
    </div>
</main>



  @include('inc.footer')

<!-- /body -->


</html>
