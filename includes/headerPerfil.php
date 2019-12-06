           <!--Comienza el nav-->
           <nav class="navbar navbar-expand-lg navbar-dark bg-dark  barra">
                <!--Comienza el nombre de la empresa-->
                    <a class="navbar-brand" href="home.php">
                      <img src="img/e-com1.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
                      <span>E-commerce</span>
                    </a>
                <!--Fin el nombre de la empresa-->
                <!--Comienza el buscador-->
                    <form class=" d-md-inline-block form-inline mx-auto  my-2 my-md-0">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar producto...." aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <img src="img/lupa.png" width="20" height="20" class="d-inline-block align-top" alt="">
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
                          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
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
                        <?php if (isset($_SESSION["activeUser"])  && $pagina!="Registro" && $pagina!="Login" ): ?>
                          <li class="nav-item">
                            <a class="nav-link text-primary" href="resumen.php"><?=(isset($_SESSION["activeUser"]["usuario"]))?$_SESSION["activeUser"]["usuario"]:"usuario";?></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-primary" href="logOut.php">Cerrar Sesion</a>
                          </li>
                        <?php else: ?>
                          <li class="nav-item">
                                <a class="nav-link  text-primary" href="login.php">Iniciar Sesion</a>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link  text-primary" href="registro.php">Registrarse</a>
                          </li>
                        <?php  endif ?>
                        
                        <li class="nav-item">
                                <a class="nav-link" href="faq.php">Ayuda <img src="img/pregunta.png" width="25" height="25" class="d-inline-block align-top ml-auto logo" alt=""></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#summary" role="button" data-toggle="modal" data-target="#exampleModalScrollable">
                            <span>Carrito</span>
                            <img src="img/car.png" width="20" height="20" class="d-inline-block align-top " alt="">
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!--fin el menu descomplimido-->
                  <!--Comienza del menu complimido-->
                  </nav>