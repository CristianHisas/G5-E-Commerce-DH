<?php
  $pagina="Seguridad";
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
    <div class="container contenedor">
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
        <!-----Seguridad-------------------------------->
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 mb-4 resumen seguridad">
            <h1 class="d-block mt-2">Seguridad</h1>
          <!--comienzo del Cambio de E-mail--->
          <h2 class="col-12 my-4">Cambio de E-mail</h2>
          <div class="informacion">
                <h5 class="">Recomendaciones de seguridad</h5>
                <p class="">Ingrese un E-mail valido.</br>
                Se le enviara un correo de confirmacion.</p>
            </div>
          <form class="my-3 px-4 col-10 form-mail" name="formCambioMail" method="post" action="http://pagina.com/send.php">
                <div class="form-group" >
                        <label for="viejoMail">Email </label>
                        <input type="email" class="form-control" id="viejoMail" name="viejoMail" aria-describedby="emailHelp" value="ejempolo@gmail.com" readonly>
                        <small class="text-muted">E-mail Actual</small>

                </div>
                <div class="form-group" >
                        <label for="nuevoMail">Nuevo Email</label>
                        <input type="email" class="form-control" id="nuevoMail"  name="nuevoMail" aria-describedby="emailHelp" placeholder="Ingrese Nuevo email" title="Ingresar el nuevo e-mail" required>
                        <small class="text-muted">Ingrese el Nuevo E-mail</small>
                </div>
                <div class="form-group" >
                        <label for="claveActualMail" class="">Clave Actual</label>
                        <input type="password" class="form-control" id="claveActualMail" name="claveActualMail" placeholder="Clave Actual"  title="Ingresa la clave actual para cambiar el e-mail" minlength="6" maxlength="20" autocomplete="off" required>
                        <small class="text-muted">Ingrese la Clave Actual para guardar los cambios</small>
                </div>
                <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto" >Guardar Cambios</button>
            </form>
            <!--Fin Cambio de Email-->
            <!-----Comienzo de Cambio de Clave------------------------------------------------------------------------------>
            <h2 class="col-12 text-left my-4">Cambio de Clave</h2>
            <div class="informacion">
                <h5 class="">Recomendaciones de seguridad</h5>
                <p class="">Ingresá entre 6 y 20 caracteres.</br>
                No usés la misma clave de otro sitio.</p>
            </div>
            <form class="my-3 px-4 col-10 form-clave" name="formCambioClave" method="post" action="http://pagina.com/send.php">
                    <div class="form-group">
                            <label for="claveActual" class="col-form-label">Clave Actual</label>

                              <input type="password" class="form-control" id="claveActual" name="claveActual" placeholder="Clave Actual" title="Ingresa la clave actual" minlength="6" maxlength="20" autocomplete="off" required>
                              <small class="text-muted">Ingrese la Clave Actual para Cambiar la Clave</small>
                    </div>
                    <div class="form-group ">
                      <label for="claveNueva" class="">Nueva Clave</label>

                        <input type="password" class="form-control" id="claveNueva" id="claveNueva" placeholder="Ingresa la Nueva Clave" title="Ingresa la Nueva clave " minlength="6" maxlength="20"  autocomplete="off" required>
                        <small class="text-muted">Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales o emoji.</small>
                    </div>
                    <div class="form-group ">
                            <label for="claveNuevaRepetir" class="">Repetir Nueva Clave </label>

                              <input type="password" class="form-control" id="claveNuevaRepetir" name="claveNuevaRepetir" placeholder="Repetir la Nueva Clave" title="Repita la Nueva clave" minlength="6" maxlength="20" autocomplete="off" required>
                              <small class="text-muted">Repita la Nueva Clave</small>
                          </div>
                    <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto">Guardar Cambios</button>
            </form>
           <!--fin Cambio de Clave------------------------------- -->
          </div>
    <!-----Fin Seguridad-------------------------------->
    </div>
</div>
      <!-- MainBody End ============================= -->
    </main>
<!-- Footer ================================================================== -->
  <?php
    include_once("includes/footer.php");
  ?>
<!-- Footer End================================================================== -->
<!-- Modal -->
  <?php 
    include_once("includes/modal.php");  
  ?>                          
<!-- Fin modal -->
  <?php
    include_once("includes/scriptBootstrap.php")
  ?>
  <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</body>
</html>
