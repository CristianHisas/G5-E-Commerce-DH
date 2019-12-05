<?php
  session_start();
  
  include_once("includes/funciones.php");
  include_once("includes/baseDeDatos.php");
  $pagina="Seguridad";
  if(isset($_SESSION["activeUser"]) && !is_null($_SESSION["activeUser"])){ 
    $activeUser=$_SESSION["activeUser"];
  }
  $errores=null;
  if(isset($_POST["enviarClave"])&& $_POST){
    $cambios=
    [
      "claveActual"=>trim($_POST["claveActual"]),
      "claveNueva"=>trim($_POST["claveNueva"]),
      "claveNuevaRepetir"=>trim($_POST["claveNuevaRepetir"])
    ];
    $requisitos = 
    [
      "claveActual"=>[
        CLAVE
      ],
      "claveNueva"=>[
        CLAVE
      ],
      "claveNuevaRepetir"=>[
        CLAVE
      ]
    ];
    $errores = hacerValidaciones($cambios,$requisitos);
	//dd($_POST);
	//dd($activeUser);
	//dd($cambios);
    if(!$errores){
      if(!password_verify($cambios["claveActual"],$activeUser["clave"])){
        $errores["claveActual"]="clave incorrecta";
      }else {
		//dd($cambios);
        if($cambios["claveNueva"]!=$cambios["claveNuevaRepetir"]){
			
          $errores["claveNueva"]="clave incorrecta";
          $errores["claveNuevaRepetir"]="clave incorrecta";
		  //dd($errores);
        }else{
			if(!$errores){
				$activeUser["clave"]=password_hash($cambios["claveNueva"],PASSWORD_DEFAULT);
				$_SESSION["activeUser"]=$activeUser;
				$arrayUsuarios=getObjectsFromFile("data/usuarios.json");
				//$arrayUsuarios=leerJsonYpasaArray(Direccion);
				$arrayUsuarios[$activeUser["email"]]=$activeUser;
				guardarArrayYpasarAJson("data/usuarios.json",$arrayUsuarios);
				header("Location:logOut.php");exit;
			}else{
				//dd("hola");
			}
        }
      }
    }
  }
  if(isset($_POST["cambiosEmail"])&& $_POST){
    $cambiosMail=
    [
      "nuevoMail"=>trim($_POST["nuevoMail"]),
      "claveActualMail"=>trim($_POST["claveActualMail"])
    ];
    $requisitos = 
    [
      "nuevoMail"=>[
        CORREO
      ],
      "claveActualMail"=>[
        CLAVE
      ]
    ];
    $errores = hacerValidaciones($cambiosMail,$requisitos);
    if(!$errores){
      if(!password_verify($cambiosMail["claveActualMail"],$activeUser["clave"])){
        $errores["claveActualMail"][]="clave incorrecta";
      }
			if(!$errores){
				$arrayUsuarios=getObjectsFromFile("data/usuarios.json");
        
        if( isset($arrayUsuarios[$cambiosMail["nuevoMail"]]) ){
            $errores["nuevoMail"][]="utilize otro email";
        }
        if(!$errores){
          unset($arrayUsuarios[$activeUser["email"]]);
		  //--------------
			$arrayUM=getObjectsFromFile("data/user_email.json");
			$arrayUM[$activeUser["usuario"]]=$cambiosMail["nuevoMail"];
			guardarArrayYpasarAJson("data/user_email.json",$arrayUM);
		//--------------
          $activeUser["email"]=$cambiosMail["nuevoMail"];
		$_SESSION["activeUser"]=$activeUser;
          $arrayUsuarios[$activeUser["email"]]=$activeUser;
          unlink("data/usuarios.json");
				  guardarArrayYpasarAJson("data/usuarios.json",$arrayUsuarios);
        }
        
				//header("Location:logOut.php");exit;
			}else{
				//dd("hola");
			}
        
      
    }
  }
  
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
          <form class="my-3 px-4 col-10 form-mail" name="formCambioMail" method="post" action="">
                <div class="form-group" >
                        <label for="viejoMail">Email </label>
                        <input type="email" class="form-control" id="viejoMail" name="viejoMail" aria-describedby="emailHelp" value="<?=$activeUser["email"]; ?>" readonly>
                        <small class="text-muted">E-mail Actual</small>

                </div>
                <div class="form-group" >
                        <label for="nuevoMail">Nuevo Email</label>
                        <input type="email" class="form-control" id="nuevoMail"  name="nuevoMail" aria-describedby="emailHelp" placeholder="Ingrese Nuevo email" title="Ingresar el nuevo e-mail" required>
                        <small class="text-muted">Ingrese el Nuevo E-mail</small>
                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nuevoMail"):""; ?></small> 
                </div>
                <div class="form-group" >
                        <label for="claveActualMail" class="">Clave Actual</label>
                        <input type="password" class="form-control" id="claveActualMail" name="claveActualMail" placeholder="Clave Actual"  title="Ingresa la clave actual para cambiar el e-mail" minlength="6" maxlength="20" autocomplete="off" required>
                        <small class="text-muted">Ingrese la Clave Actual para guardar los cambios</small>
                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"claveActualMail"):""; ?></small> 
                </div>
                <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto" name="cambiosEmail" >Guardar Cambios</button>
            </form>
            <!--Fin Cambio de Email-->




            <!-----Comienzo de Cambio de Clave------------------------------------------------------------------------------>
            <h2 class="col-12 text-left my-4">Cambio de Clave</h2>
            <div class="informacion">
                <h5 class="">Recomendaciones de seguridad</h5>
                <p class="">Ingresá entre 6 y 20 caracteres.</br>
                No usés la misma clave de otro sitio.</p>
            </div>
            <form class="my-3 px-4 col-10 form-clave" name="formCambioClave" method="post" action="">
                    <div class="form-group">
                            <label for="claveActual" class="col-form-label">Clave Actual</label>

                              <input type="password" class="form-control" id="claveActual" name="claveActual" placeholder="Clave Actual" title="Ingresa la clave actual" minlength="6" maxlength="20" autocomplete="off" required>
                              <small class="text-muted">Ingrese la Clave Actual para Cambiar la Clave</small>
                              <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"clave"):""; ?></small>
                    </div>
                    <div class="form-group ">
                      <label for="claveNueva" class="">Nueva Clave</label>

                        <input type="text" class="form-control" id="claveNueva" name="claveNueva" placeholder="Ingresa la Nueva Clave" title="Ingresa la Nueva clave " minlength="6" maxlength="20"  autocomplete="off" required>
                        <small class="text-muted">Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales o emoji.</small>
                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"claveNueva"):""; ?></small>
                    </div>
                    <div class="form-group ">
                            <label for="claveNuevaRepetir" class="">Repetir Nueva Clave </label>

                              <input type="text" class="form-control" id="claveNuevaRepetir" name="claveNuevaRepetir" placeholder="Repetir la Nueva Clave" title="Repita la Nueva clave" minlength="6" maxlength="20" autocomplete="off" required>
                              <small class="text-muted">Repita la Nueva Clave</small>
                              <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"claveNuevaRepetir"):""; ?></small> 
                          </div>
					                 
                    <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto" name="enviarClave">Guardar Cambios</button>
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