<?php
$pagina=$_SERVER["REQUEST_URI"];
$pagina=str_replace('/'," ",$pagina);
$pagina=explode(" ",$pagina);
foreach ($pagina as $key => $value) {
  $pagina[$key]=ucfirst($value);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600|Roboto:500,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico"/>
<!--Iconos de pestania-->
<link rel="apple-touch-icon" sizes="180x180" href="/img/pestania-ico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/pestania-ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/pestania-ico/favicon-16x16.png">
<link rel="manifest" href="/img/pestania-ico/site.webmanifest">
<link rel="mask-icon" href="/img/pestania-ico/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<!--Iconos de pestania-->
<!--cambia la barra de pestaña de moviles de androi-->
<meta name="theme-color" content="#4285f4">
<!--cambia la barra de pestaña de moviles de androi-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/stylePerfilSeguridadResumen.css">
<title>E-commerce</title>
</head>
<body class="main-perfil">
    <!--Comienza el header-->
    <header class="container-fluir fixed-top">


           <!--Comienza el nav-->
           <nav class="navbar navbar-expand-lg navbar-dark bg-dark  barra">
                <!--Comienza el nombre de la empresa-->
                    <a class="navbar-brand" href="{{url('home')}}">
                      <img src="/img/e-com1.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
                      <span>E-commerce</span>
                    </a>
                <!--Fin el nombre de la empresa-->
                <!--Comienza el buscador-->
                    <form class=" d-md-inline-block form-inline mx-auto  my-2 my-md-0">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar producto...." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <img src="/img/lupa.png" width="20" height="20" class="d-inline-block align-top" alt="">
                            </button>
                          </div>
                        </div>
                      </form>
                <!--fin el buscador-->
                <!--Comienza del menu complimido-->
                      <!--Comienza el icono de  complimido-->
                    <button class="navbar-toggler col-12 col-sm-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span>Menu</span>
                      <span class="navbar-toggler-icon"></span>

                    </button>
                    <!--fin el icono de  complimido-->
                    <!--Comienza el menu descomplimido-->
                    <div class="collapse navbar-collapse " id="navbarNav">
                      <ul class="navbar-nav ml-md-auto">
                        <li class="nav-item ">
                          <a class="nav-link" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                                <!--Comienza el categoria-->
                                <div class="dropdown">
                                        <a class="nav-link dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Celulares
                                        </a>
                                        <!--Comienza el menu desplegable de categoria-->
                                        <div class="dropdown-menu bg-dark py-0 mt-2 sub-menu-categoria" aria-labelledby="dropdownMenuLink">
                                            <ul class="px-0">
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="#">Motorola</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="#">Samsung</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="#">LG</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="#">Apple</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="#">Nokia</a></li>
                                            </ul>


                                          </div>
                                        <!--fin el menu desplegable de categoria-->
                                      </div>
                                <!--Fin categoria-->
                        </li>
                        <?php if (isset($_SESSION["activeUser"])  && $pagina ?? ''!="Registro" && $pagina ?? ''!="Login" ): ?>
                          <li class="nav-item">
                            <a class="nav-link text-primary" href="{{url('resumen')}}"><?=(isset($_SESSION["activeUser"]["usuario"]))?$_SESSION["activeUser"]["usuario"]:"usuario";?></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-primary" href="{{url('logOut')}}">Cerrar Sesion</a>
                          </li>
                        <?php else: ?>
                          <li class="nav-item">
                                <a class="nav-link  text-primary" href="{{url('login')}}">Iniciar Sesion</a>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link  text-primary" href="{{url('registro')}}">Registrarse</a>
                          </li>
                        <?php  endif ?>

                        <li class="nav-item">
                                <a class="nav-link" href="{{url('faq')}}">Ayuda <img src="/img/pregunta.png" width="25" height="25" class="d-inline-block align-top ml-auto logo" alt=""></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#summary" role="button" data-toggle="modal" data-target="#exampleModalScrollable">
                            <span>Carrito</span>
                            <img src="/img/car.png" width="20" height="20" class="d-inline-block align-top " alt="">
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!--fin el menu descomplimido-->
                  <!--Comienza del menu complimido-->
                  </nav>


    </header>
     <!--Fin el header-->
    <main class="mx-xl-auto" >
    <div class="container contenedor  mb-4">
        <div class="row">
<!--ubicacion-->
<ul class="breadcrumb  col-12">
    <li><a href="{{url('home')}}">Home</a></li>
    <?php
    for ($i=1; $i <count($pagina) ; $i++) {
    ?>
      <li class="active"><span class="divider">/</span><?=$pagina[$i]; ?></li>
    <?php
  }
    ?>
</ul>
<!--ubicacion-->
<!--menu izquierdo-->
<div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-4 menu-left">
    <ul class="list-group">
        <li class="list-group-item "><a href="{{url('resumen')}}" class="">Resumen</a></li>
        <li class="list-group-item conf" >
            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Configuracion</a>
            <div class="collapse" id="collapseExample">
                <ul class="card card-header">
                    <li >
                        <a href="{{url('perfil')}}" class="">Mis Datos</a>
                    </li>
                    <li >
                        <a href="{{url('seguridad')}}" class="">Seguridad</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
<!--menu izquierdo-->
<!--contenido derecho-->

@yield("contenido_login")
<!--contenido derecho-->
    </div>
</div>
</main>
<!-- footer -->
<footer class="container-fluid bg-dark px-auto py-4  footer-cambiado ">
  <!-- Footer ================================================================== -->

        <div class="row d-flex justify-content-between">
          <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
            <h5>ACCOUNT</h5>
            <a href="{{url('/cuenta/perfil')}}" class="">YOUR ACCOUNT</a>
            <a href="{{url('/cuenta/perfil')}}">PERSONAL INFORMATION</a>
            <a href="{{url('/cuenta/perfil')}}">ADDRESSES</a>
            <a href="{{url('/cuenta')}}">DISCOUNT</a>
            <a href="{{url('/cuenta/resumen')}}">ORDER HISTORY</a>
          </div>
          <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
            <h5>INFORMATION</h5>
            <a href="/contacto">CONTACT</a>
            <a href="/registro">REGISTRATION</a>
            <a href="/legal_notice.html">LEGAL NOTICE</a>
            <a href="/tac.html">TERMS AND CONDITIONS</a>
            <a href="/faq">FAQ</a>
          </div>
          <div id="" class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4 social text-center">
              <h5 class="social">SOCIAL MEDIA </h5>
              <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49093342407_45310a774c_o.png" title="facebook" alt=""/></a>
              <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49092642883_c0782ddd4d_o.png" title="twitter" alt=""/></a>
              <a href="#" class="social"><img width="60" height="60" src="https://live.staticflickr.com/65535/49092641488_040001d127_o.png" title="youtube" alt=""/></a>
            </div>
        </div>
        <p class="mx-auto text-center my-2 py-2">Copyright &copy; Your Website 2019</p>
     <!-- Container End -->
    <!-- Footer End================================================================== -->
  </footer>
<!-- fin footer -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <!--Fila de detalle de cada producto-->
            <tr>
              <th>Product</th>
              <th>Description</th>
              <th>Quantity/Update</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <!--Filas y columnas-->
            <tr>
              <td> <img width="60" src="img/phone.jpg" alt="phone.jpg"/></td>
              <td>MASSA AST<br/>Color : black, Material : metal</td>
              <td>
                <div class="input-append">
                  <input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text">
                  <button class="btn" type="button">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button class="btn" type="button">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="far fa-times-circle"></i>
                  </button>
                </div>
              </td>
              <td>$120.00</td>
            </tr>
            <tr>
              <td> <img width="60" src="img/phone.jpg" alt="phone.jpg"/></td>
              <td>MASSA AST<br/>Color : black, Material : metal</td>
              <td>
                <div class="input-append">
                  <input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text">
                  <button class="btn" type="button">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button class="btn" type="button">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="far fa-times-circle"></i>
                  </button>
                </div>
              </td>
              <td>$7.00</td>
            </tr>
            <tr>
              <td> <img width="60" src="img/phone.jpg" alt="phone.jpg"/></td>
              <td>MASSA AST<br/>Color : black, Material : metal</td>
              <td>
                <div class="input-append">
                  <input class="span1" style="max-width:34px" placeholder="1"  size="16" type="text">
                  <button class="btn" type="button">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button class="btn" type="button">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button class="btn btn-danger" type="button">
                    <i class="far fa-times-circle"></i>
                  </button>
                </div>
              </td>
              <td>$120.00</td>
            </tr>
            <!--Fila que muestra el total del carrito-->
            <tr>
              <td colspan="3" style="text-align:right">Total Price:	</td>
              <td> $228.00</td>
            </tr>
            <tr>
              <td colspan="3" style="text-align:right">Total Discount:	</td>
              <td> $50.00</td>
            </tr>
            <tr>
              <td colspan="3" style="text-align:right">Total Tax:	</td>
              <td> $31.00</td>
            </tr>
            <tr>
              <td colspan="3" style="text-align:right"><strong>TOTAL ($228 - $50 + $31) =</strong></td>
              <td class="label label-important" style="display:block"> <strong> $155.00 </strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal -->

<!-- Fin modal -->
<!-- Scripts ============================================= -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</body>
</html>
