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
    <?php include_once "includes/header.php"; ?>
    <?php include_once "includes/modal.php"; ?>

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
                <a href="lista-productos.html" class="irDescripcion"><!--Saque el onclick por que pertenece a javascript--->
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
  <!-- Footer ================================================================== -->
  <footer>
      <div class="container-fluid bg-dark px-auto py-4 footer-cambiado ">
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
                <h5>ACCOUNT</h5>
                <a href="login.html" class="">YOUR ACCOUNT</a>
                <a href="login.html">PERSONAL INFORMATION</a>
                <a href="login.html">ADDRESSES</a>
                <a href="login.html">DISCOUNT</a>
                <a href="login.html">ORDER HISTORY</a>
              </div>
              <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
                <h5>INFORMATION</h5>
                <a href="contacto.html">CONTACT</a>
                <a href="registro.php">REGISTRATION</a>
                <a href="legal_notice.html">LEGAL NOTICE</a>
                <a href="tac.html">TERMS AND CONDITIONS</a>
                <a href="faq.html">FAQ</a>
              </div>
              <div id="" class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4 social text-center">
                <h5 class="social">SOCIAL MEDIA </h5>
                <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49093342407_45310a774c_o.png" title="facebook" alt=""/></a>
                <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49092642883_c0782ddd4d_o.png" title="twitter" alt=""/></a>
                <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49092641488_040001d127_o.png" title="youtube" alt=""/></a>
              </div>
            </div>
        <p class="mx-auto text-center my-2 py-2">Copyright &copy; Your Website 2019</p>
      </div><!-- Container End -->
    </footer>
    <!-- Footer End================================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
