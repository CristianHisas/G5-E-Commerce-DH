<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'E-commerce') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link rel="stylesheet" href="/css/styles.css">-->
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark   shadow-sm">
            <div class="container">
     <!--Comienza el nombre de la empresa-->
     <a class="navbar-brand" href="/">
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
                                            Celulares
                                          </a>
                                          <!--Comienza el menu desplegable de categoria-->
                                          <div class="dropdown-menu bg-dark py-0 mt-2 sub-menu-categoria" aria-labelledby="dropdownMenuLink">
                                              <ul class="px-0">
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="/listaProductosMotorola">Motorola</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="/listaProductosSamsung">Samsung</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="/listaProductosLG">LG</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="/listaProductosApple">Apple</a></li>
                                                <li class="py-0 px-0  dropdown-item li-marca "><a class=" ml-md-auto text-decoration-none d-block  py-2 px-2  marca" href="/listaProductosNokia">Nokia</a></li>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                        <li class="nav-item">
                            <a class="nav-link" href="faq">Ayuda <img src="/img/pregunta.png" width="25" height="25" class="d-inline-block align-top ml-auto logo" alt=""></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#summary" role="button" data-toggle="modal" data-target="#exampleModalScrollable">
                        <span>Carrito</span>
                        <img src="/img/car.png" width="20" height="20" class="d-inline-block align-top " alt="">
                      </a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
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
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
