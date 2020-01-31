<?php
  session_start();
  $pagina="Login";
  //session_destroy();
  require_once "./includes/funciones.php";

  if(isset($_SESSION["activeUser"])){
    header("Location: perfil.php");
  } else{ 
    $errores = null; 
    if($_POST){
      $user = $_POST["usuario"];
      $pass = $_POST["pass"];
      $requisitos = [
        "usuario" => [
          MINSIZE => 4,
          MAXSIZE => 155
        ],
        "pass" => [
          CLAVE
        ]
      ];
      $errores = hacerValidaciones($_POST, $requisitos);

      if(!$errores){
        // setcookies
        if(findUserByEmail($_POST["usuario"])){
          $activeUser = findUserByEmail($_POST["usuario"]);
          if(password_verify($_POST["pass"], $activeUser["clave"])){
            $_SESSION["activeUser"] = $activeUser;
            if($_POST["recordame"]="on"){
              setcookie("usuario",$activeUser["usuario"],time()+60*60);
              setcookie("clave",$activeUser["clave"],time()+60*60);
              setcookie("email",$activeUser["email"],time()+60*60);                
            }
            header("Location: perfil.php");exit;
          }else{
            $errores["soloTexto"] = ["Los datos ingresados son inválidos"];
          }
        }else
          if(findUserByUserName($_POST["usuario"])){
            $activeUser = findUserByUserName($_POST["usuario"]);
            if(password_verify($_POST["pass"], $activeUser["clave"])){
              $_SESSION["activeUser"] = $activeUser;
              if($_POST["recordame"]="on"){
                setcookie("usuario",$activeUser["usuario"],time()+60*60);
                setcookie("clave",$activeUser["clave"],time()+60*60);
                setcookie("email",$activeUser["email"],time()+60*60);                
              }
              header("Location: perfil.php");exit;
            }else{
              $errores["soloTexto"] = ["Los datos ingresados son inválidos"];
            }
        }else{
          $errores["soloTexto"] = ["Los datos ingresados son inválidos"];
        }
      }
    }else{
      $user = "";
      $pass = "";
    }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,500,700&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600|Roboto:500,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <title>Login</title>
  <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="main-login">
        <!--Comienza el header-->
        <header class="container-fluir fixed-top">
    <?php
      include_once("includes/headerPerfil.php");
    ?>
    </header>
     <!--Fin el header-->
  <main class=" container mb-4 main-inicio">
    <ul class="breadcrumb col-12">
      <li><a href="home.html">Home</a> <span class="divider">/</span></li>
      <li>Cuenta <span class="divider">/</span></li>
      <li class="active">Ingreso</li>
    </ul>
    <section class=" mb-2">
      <!--<h2>Inicio de Seccion</h2> -->
      <form class="col-10 col-sm-6 col-md-6 col-lg-6 mx-auto" action="" method="post">
        <!--<form action="iniciar sesion.php" metodo="post" class="form">-->
        <h2 class="form-titulo">INICIO DE SESION</h2>
        <div class="contenedor-inputs">
          <h3>Hola! Ingresa tu e-mail o usuario</h3>
          <input type="text" name="usuario" id="usuario" value="" placeholder="E-mail o usuario" class="input-100"
            required>
          </br>
          <h3>Ahora, tu clave</h3>
          <input type="password" name="pass" id="pass" value="" placeholder="clave" class="input-100" required>
          </br>
           <?php if(isset($errores)) echo imprimirErrores($errores) ?>
           <div>
           
			      <label class="input-100 px-1" for="recordar"><input type="checkbox" name="recordar" class="col-ms-1 mx-1" checked>Recodar</label>
           </div>
           
          <input type="submit" value="Ingresar" class="btn-enviar">
        </div>
      </form>
    </section>
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
