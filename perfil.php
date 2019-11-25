<?php
  $pagina="Datos de Usuario";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include_once("includes/headPerfil.php")
  ?>
  <link rel="stylesheet" href="css/stylePerfilSeguridadResumen.css">
<title>E-commerce</title>
</head>
<body class="main-perfil">
    <!--Comienza el header-->
    <header class="container-fluir fixed-top">
    <?php
      include_once("includes/headerPerfil.php");
    ?>
    </header>
     <!--Fin el header-->
    <main class="mx-xl-auto" >
    <div class="container contenedor  mb-4">
        <div class="row">
<!--ubicacion-->
<?php
    include_once("includes/ubicacionPerfil.php");
?>
<!--ubicacion-->
<!--menu izquierdo-->
<?php
    include_once("includes/menuIzquierdoPerfil.php");
?>
<!--menu izquierdo-->
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 usuario">
            <h1>Perfil</h1>
            <div class=" col-lg-12 mb-4">
                <h2>Datos:</h2>
                <div class="col-12">
                  <form class="container-fluir" method="post" action="" enctype="multipart/form-data" >
                  
<!--imagen-->

                  <div class="d-flex flex-wrap mx-auto img-perfil img-fluid">
                <div class="contenedor-perfil" >
                    <img src="img/img-perfil.png" alt="hola" clas=" img-hola ">
                    <!-- Button trigger modal -->
                    <a href="" class=" fixed-bottom btn-link py-2" data-toggle="modal" data-target="#exampleModalCenter">editar</a>
                      <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Subir Foto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto my-2 bg-secondary">
                        <img src="img/pngocean.com(1).png" class="img-fluid rounded mx-auto d-block" alt="..." max-width="100%"  height="auto">
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 mx-auto">
                      <form name="formulario" method="post" action="http://pagina.com/send.php"
                              enctype="multipart/form-data" class="col-md-10 col-lg-10 mx-auto" > <!-- ¡No olvides el enctype! -->
                      <!-- Campo de selección de archivo -->
                      <input type="file" name="adjunto" accept=".jpg,.png" class="examinar col-md-12 col-lg-12 mx-auto">
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
                </div>
            </div>

<!--imagen-->

                      <div class="form-group" >
                          <label for="usuario">Usuario</label>
                          <input type="text" class="form-control" id="usuario" name="usuario" value="2D" readonly required>

                  </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" class="form-control" placeholder="First name" name="nombre" value="Juan" readonly required>
                          </div>
                          <div class="col">
                              <label for="apellido">Apellido</label>
                            <input id="apellido" type="text" class="form-control" placeholder="Last name" name="apellido" value="Lopez" readonly required>
                          </div>
                    </div>
                    <div class="form-group my-2">
                        <label for="fechaNacimiento ">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fechaNacimiento" placeholder="" name="fechaNacimiento" value="1994-03-12" readonly required>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Direccion</label>
                      <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St"  value="1234 Main St" readonly required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputCity">Ciudad</label>
                        <input type="text" class="form-control" id="inputCity" value="Caseros" readonly required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Provincia</label>
                        <select id="inputState" class="form-control" required disabled>
                          <option value="" >Seleccionar</option>
                          <option value="" selected>Buenos Aires</option>
                          <option value="">Cordoba</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="inputState">Pais</label>
                          <select id="inputState" class="form-control" required disabled>
                            <option value="" >Seleccionar</option>
                            <option value="" selected>Argentina</option>
                            <option value="">Ecuador</option>
                          </select>
                        </div>
                      <div class="form-group col-md-3">
                        <label for="inputZip">Codigo Postal</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="codigo postal" value="1245"  readonly required>
                      </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-form-label col-sm-2 pt-0">Sexo </legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="sexogridRadios" id="sexogridRadios1" value="h" checked disabled required>
                              <label class="form-check-label" for="sexogridRadios1">
                                Hombre
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="sexogridRadios" id="sexogridRadios2" value="m" disabled required>
                              <label class="form-check-label" for="sexogridRadios2">
                                Mujer
                              </label>
                            </div>
                            <div class="form-check ">
                              <input class="form-check-input" type="radio" name="sexogridRadios" id="sexogridRadios3" value="o" disabled required>
                              <label class="form-check-label" for="sexogridRadios3">
                                Otro
                              </label>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <label for="datoDeTarjeta"><h5>Datos de Tarjeta</h5></label>
                      <div class="form-group">
                          <label for="NombreTarjeta">Nombre Completo del Titular</label>
                          <input type="text" class="form-control" id="NombreTarjeta" name="NombreTarjeta"  value="Juan Lopez" readonly required>
                      </div>
                      <div class="form-group" id="datoDeTarjeta">
                          <label for="Numerotarjeta">Numero de tarjeta</label>
                          <input type="number" class="form-control" id="Numerotarjeta" name="Numerotarjeta"  value="5241123512685436" maxlength="12" readonly required>
                      </div>
                      <fieldset class="form-group">
                          <div class="row">
                            <legend class="col-form-label col-sm-4 pt-0">Tipo de pago </legend>
                            <div class="col-sm-10">
                              <div class="form-check col-4 form-check-inline">
                                <input class="form-check-input" type="radio" name="tpgridRadios" id="tpgridRadios1" value="mastercard" checked disabled required>
                                <label class="form-check-label" for="tpgridRadios1">
                                    <img src="img/mastercard.png" alt="mastercard" width="60">

                                </label>
                              </div>
                              <div class="form-check col-4 form-check-inline">
                                <input class="form-check-input" type="radio" name="tpgridRadios" id="tpgridRadios2" value="visa" disabled required>
                                <label class="form-check-label" for="tpgridRadios2">
                                    <img src="img/visa.png" alt="visa" width="60">
                                </label>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      <div class="form-group" >
                          <label for="tarjeta">Tipo de Pago</label>
                          <input type="text" class="form-control" id="tarjeta" name="tarjeta"  value="datos de tajeta" readonly required>
                      </div>
                      <div class="form-group" >
                          <label for="fechaVencimiento col-6">Fecha de Vencimiento</label>
                          <div class="row col-11" id="fechaVencimiento">
                              <input type="number" class="form-control col-2" id="" name="fechaVencimientoMes" value="03" maxlength="2" min="1" max="12" readonly required>
                              <span class="h3 mx-2">  /  </span>
                              <input type="number" class="form-control col-4" id="" name="fechaVencimientoAnio" value="2030" maxlength="4" readonly min="1940" required>
                          </div>
                      </div>
                      <div class="form-group" >
                          <label for="csc">CSC</label>
                          <input type="number" class="form-control" id="csc" name="csc"  value="356" maxlength="3" readonly required>
                      </div>
                    <button type="button" class="btn btn-secondary ml-md-auto boton-efecto my-2">Editar</button>
                    <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto my-2">guardar</button>
                  </form>
                </div>
          </div>
        </div>
    </div>
</div>
</main>
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
