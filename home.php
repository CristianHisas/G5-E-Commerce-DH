<?php
session_start();
$pagina="Home";
include_once("includes/funciones.php");
include_once("includes/baseDeDatos.php");
if(isset($_SESSION["activeUser"]) && !is_null($_SESSION["activeUser"])){
    if($_SESSION["activeUser"]["fotoPerfil"]==""){
      $_SESSION["activeUser"]["fotoPerfil"]=(isset($imagenUsuario))?$imagenUsuario:"img/perfil.png";
    }  
    $activeUser=$_SESSION["activeUser"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>E-commerce</title>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="main-perfil">
        <!--Comienza el header-->
        <header class="container-fluir fixed-top">
    <?php
      include_once("includes/headerPerfil.php");
    ?>
    </header>
     <!--Fin el header-->

    <main>
        <div class="inner-main" id="home">
            <div class="welcome">
                <div class="inner-welcome">
                    <div class="img">
                        <img src="img/e-com1.png" alt="">
                    </div>
                    <div class="text">
                        <h1>
                            ¡Bienvenid@ a E-commerce!
                        </h1>
                        <p>
                            El lugar donde encontrarás todo lo que buscas y al mejor precio.
                        </p>
                    </div>
                </div>
            </div>


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="img/carousel/2.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel/3.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="img/carousel/1.png" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="categorias">
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/autopng.png" alt="">
                    </div>
                    <div class="titulo">
                        Vehículos
                    </div>
                </div>
                <a href="lista-productos.php" class="irDescripcion"><!--Saque el onclick por que pertenece a javascript--->
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/tel.png" alt="">
                    </div>
                    <div class="titulo">
                        Smarthphones
                    </div>
                </div>
                </a>
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/casa.png" alt="">
                    </div>
                    <div class="titulo">
                        Hogar
                    </div>
                </div>
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/ropa.png" alt="">
                    </div>
                    <div class="titulo">
                        Ropa
                    </div>
                </div>
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/guitarra.png" alt="">
                    </div>
                    <div class="titulo">
                        Música
                    </div>
                </div>
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/pc.png" alt="">
                    </div>
                    <div class="titulo">
                        Computación
                    </div>
                </div>
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/servicios.png" alt="">
                    </div>
                    <div class="titulo">
                        Servicios
                    </div>
                </div>
                <div class="categoria">
                    <div class="icono">
                        <img src="img/categorias/mas.png" alt="">
                    </div>
                    <div class="titulo">
                        Otras categorías
                    </div>
                </div>
            </div>

        </div>
    </main>




      <!-- MainBody End ============================= -->
<!-- footer -->
<?php
    include_once("includes/footer.php");
  ?>
<!-- fin footer -->
<!-- Modal -->
  <?php 
    include_once("includes/modal.php");  
  ?>                          
<!-- Fin modal -->
  <?php
    include_once("includes/scriptBootstrap.php");
  ?>
    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</body>
</html>
