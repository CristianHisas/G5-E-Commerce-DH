<?php
  session_start();
  //include_once("../includes/funciones.php");
  //include_once("../includes/baseDeDatos.php");
  $pagina="Datos de Usuario";
  //$pagina_anterior=$_SERVER['HTTP_REFERER'];//pagina anterior
  if(isset($_SESSION["activeUser"]) && !is_null($_SESSION["activeUser"])){
    if($_SESSION["activeUser"]["fotoPerfil"]==""){
      $_SESSION["activeUser"]["fotoPerfil"]=(isset($imagenUsuario))?$imagenUsuario:"img/perfil.png";
    }
    $activeUser=$_SESSION["activeUser"];
  }
  $pagina="Contacto";
?>
<!DOCTYPE html>
<html lang="en">

@include('inc.head')

<title>Contacto</title>

<body class="main-login">
    <!--Comienza el header-->
    <header class="container-fluir fixed-top">

          @include('inc.headerPerfil')

        </header>
         <!--Fin el header-->
    <main class=" container mb-4 main-inicio">
        <ul class="breadcrumb col-12">
            <li><a href="home">Home</a> <span class="divider">/</span></li>
            <li>Informacion<span class="divider">/</span></li>
            <li class="active">Contacto</li>
        </ul>
        <section class=" mb-2">
            <!--<h2>Inicio de Seccion</h2> -->

            <form class="col-10 col-sm-6 col-md-6 col-lg-6 mx-auto" action="" method="post">
                <!-- <form action="contactar.php" metodo="post" class="form">-->
                <h2 class="form-titulo">CONTACTO</h2>
                <div class="contenedor-inputs">
                    <input type="text" name="nombre" placeholder="Nombre" class="input-100" required>
                    <input type="email" name="correo" placeholder="Correo" class="input-100" required>
                    <input type="text" name="telefono" placeholder="Telefono" class="input-100" required>
                    <textarea name="mensaje" placeholder="escriba aqui su mensaje" required class="border border-secondary"></textarea>
                    <input type="submit" value="ENVIAR" class="btn-enviar">
                </div>

            </form>
        </section>
    </main>

 <!-- footer -->
    @include('inc.footer')
<!-- fin footer -->
<!-- Modal -->
    @include('inc.modal')
<!-- Fin modal -->
    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</body>

</html>
