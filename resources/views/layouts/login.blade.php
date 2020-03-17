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
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Order66') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="/js/cargador.js">
        </script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600|Roboto:500,700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.ico"/>
<!--Iconos de pestania-->
<link rel="apple-touch-icon" sizes="180x180" href="/img/pestania-ico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/pestania-ico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/pestania-ico/favicon-16x16.png">

<link rel="mask-icon" href="/img/pestania-ico/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<!--Iconos de pestania-->
<!--cambia la barra de pestaña de moviles de androi-->
<meta name="theme-color" content="#4285f4">
<!--cambia la barra de pestaña de moviles de androi-->

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/stylePerfilSeguridadResumen.css">

</head>
<body class="main-perfil">
  <div class="d-flex align-items-center justify-content-center" id="caja-preloader">
    <div class="ring" id="carga-git">
      Loading
      <span id="punto"></span>
    </div>
  </div>
  <div id="app">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark   shadow-sm">
          <div class="container">
   <!--Comienza el nombre de la empresa-->
   <a class="navbar-brand" href="/">
      <img src="/img/e-com1.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
      <span>Order66</span>
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
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">

                  </ul>

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                                <!--Comienza el categoria-->
                                <div class="dropdown">
                                        <a class="nav-link dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Categorias
                                          </a>
                                          <!--Comienza el menu desplegable de categoria-->
                                          <div class="dropdown-menu bg-dark py-0 mt-2 sub-menu-categoria" aria-labelledby="dropdownMenuLink">
                                            <ul class="px-0">
                                              @foreach ($categoriaGlobal as $cat)
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="{{route('lista', ['cat' => $cat->id_categoria])}}">{{$cat->categoria}}</a></li>
                                              @endforeach
                                            </ul>


                                          </div>
                                          <!--fin el menu desplegable de categoria-->
                                        </div>
                                  <!--Fin categoria-->
                          </li>
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->user }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                      @guest
                      <li class="nav-item">
                        <a class="nav-link" href="#summary" role="button" data-toggle="modal" data-target="#exampleModalScrollable">
                          <span>Carrito</span>
                          <img src="/img/car.png" width="20" height="20" class="d-inline-block align-top " alt="">
                        </a>
                      </li>
                      @else
                      @if(Auth::user()->getUsuario->id_tipo_de_usuario==2)
                       <li class="nav-item">
                        <a class="nav-link" href="#summary" role="button" data-toggle="modal" data-target="#exampleModalScrollable">
                          <span>Carrito</span>
                          <img src="/img/car.png" width="20" height="20" class="d-inline-block align-top " alt="">
                        </a>
                      </li>
                       @else
                      <li class="nav-item">
                        <a class="nav-link" href="/cuenta/admin" >
                          <span>Panel de Administrador</span>
                        </a>
                      </li>
                      @endif
                      @endguest
                      <li class="nav-item">
                          <a class="nav-link" href="/faq">Ayuda <img src="/img/pregunta.png" width="25" height="25" class="d-inline-block align-top ml-auto logo" alt=""></a>
                  </li>

                  </ul>
              </div>
          </div>
      </nav>

      <main class="py-4">
        <main class="mx-xl-auto" >
          <div class="container contenedor  mb-4">
              <div class="row">
      <!--ubicacion-->
      <ul class="breadcrumb  col-12">
          <li><a href="/">Home</a></li>
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
            <li class="list-group-item "><a href="resumen" class="">Resumen</a></li>
            <li class="list-group-item conf" >
                <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">Configuracion</a>
                <div class="collapse" id="collapseExample2">
                    <ul class="card card-header">
                        <li >
                            <a href="perfil" class="">Mis Datos</a>
                        </li>
                        <li >
                            <a href="seguridad" class="">Seguridad</a>
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
      </main>
  </div>
<!-- footer -->
<footer class="container-fluid bg-dark px-auto py-4  footer-cambiado ">
<!-- Footer ================================================================== -->

      <div class="row d-flex justify-content-between">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
          <h5>ACCOUNT</h5>
          <a href="/cuenta/perfil" class="">YOUR ACCOUNT</a>
          <a href="/cuenta/perfil">PERSONAL INFORMATION</a>
          <a href="/cuenta/perfil">ADDRESSES</a>
          <a href="/cuenta/">DISCOUNT</a>
          <a href="/cuenta/resumen">ORDER HISTORY</a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xd-4">
          <h5>INFORMATION</h5>
          <a href="/contacto">CONTACT</a>
          <a href="{{url('register')}}">REGISTRATION</a>
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
      <!-- Scripts ============================================= -->
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
      <div class="modal-body carrito-resumen">
        <table class="table table-bordered">
            @guest

                {{"Debe entrar en su cuenta o registrarse"}}
            @else

            @if (Auth::user()->id_carrito!=null)
            @php
                //$carrito=Auth::user()->getCarrito;
                $carrito=(Auth::user()->getUsuario->getCarrito);
                $carritodDetalle=$carrito->getDetalle;
                $carritoProducto=$carrito->getProductos;
            @endphp
          <thead>
            <!--Fila de detalle de cada producto-->
            <tr>
              <th>Product</th>
              <th>Description</th>
              <th>Quantity/Update</th>
              <th>Unity-price</th>
              <th>Price * Quantity</th>
              <th>Price * Discount</th>
            </tr>
          </thead>
          @foreach ($carritodDetalle as $key => $item)
          <thead>
            <!--Fila de detalle de cada producto-->
            <tr>
              <th class="text-center"><img src="{{$carritoProducto[$key]->img}}" alt="{{$carritoProducto[$key]->id_producto}}" sizes="" width="20%" srcset=""></th>
              <th class="text-center">{{$carritoProducto[$key]->nombre}}</th>
              <th class="text-center">{{$item->cantidad}}</th>
              <th class="text-center">{{$carritoProducto[$key]->precio}}</th>
              <th class="text-center">{{(($item->cantidad)*($carritoProducto[$key]->precio))}}</th>
              @if ($carritoProducto[$key]->descuento > 0)
                <th class="text-center">{{($item->cantidad)*(($carritoProducto[$key]->precio) * (1-($carritoProducto[$key]->descuento/100)))}}</th>
              @else
                <th class="text-center">{{$carritoProducto[$key]->precio}}</th>
              @endif
            </tr>
          </thead>
          @endforeach
          <tbody>
            <!--Filas y columnas-->
            <tr>
              <td colspan="5" style="text-align:right">Total Tax:	</td>
              <td> Para pensar </td>
            </tr>
            <!--Fila que muestra el total del carrito-->
            <tr>
              <td colspan="5" style="text-align:right">Total Carrito Price:	</td>
              <td> $ {{$carrito->total}}</td>
            </tr>
          </tbody>
        @else
          {{"Actualmente no tenes ningun producto agregado al carrito"}}
        @endif

          @endguest
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</body>


</html>
