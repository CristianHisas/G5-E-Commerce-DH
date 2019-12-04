<?php
  session_start();
  require_once "./includes/funciones.php";

  if(isset($_SESSION["activeUser"])){
    header("Location: home.php");
  } else{
    $errores = null;
    if($_POST){
      $requisitos = [
        "usuario" => [
          MINSIZE => 4,
          MAXSIZE => 15
        ],
        "pass" => [
          CLAVE
        ]
      ];
      $errores = hacerValidaciones($_POST, $requisitos);

      if(!$errores){
        // setcookies
        if(
          findUserByEmail($_POST["usuario"])
          ||
          findUserByUserName($_POST["usuario"])
          ){
          // $user = [];
          // $user[$correo] = [
          //   "email" => $correo,
          //   "nombre" => $nombre,
          //   "apellido" => $apellido,
          //   "usuario" => $usuario,
          //   "clave" => password_hash($clave, PASSWORD_DEFAULT),
          //   "telefono" => $telefono,
          //   "fechaNacimiento"=>"",
          //   "direccion"=>"",
          //   "ciudad"=>"",
          //   "provincia"=>"",
          //   "pais"=>"",
          //   "codigoPostal"=>"",
          //   "sexo"=>"",
          //   "nombreTitular"=>"",
          //   "numeroTarjeta"=>"",
          //   "tipoDeTarjeta"=>"",
          //   "fechaVencimiento"=>"",
          //   "cvc"=>"",
          //   "fotoPerfil"=>""
          // ];
          // mergeUser($user);
          // $_SESSION["usuario"]=$usuario;
          // $_SESSION["nombre"]=$nombre;
          // $_SESSION["apellido"]=$apellido;
          // $_SESSION["email"]=$correo;
          header("Location: perfil.php");exit;
        }else{
          $errores["email"] = ["Los datos ingresados son inválidos"];
        }
    }
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
  <header class="container-fluir fixed-top">
    <!--Comienza el nav-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  barra">
      <!--Comienza el nombre de la empresa-->
      <a class="navbar-brand" href="home.html">
        <img src="img/e-com1.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
        <span>E-commerce</span>
      </a>
      <!--Fin el nombre de la empresa-->
      <a class="navbar-brand pregunta" href="faq.html">
        <img src="img/pregunta.png" width="30" height="30" class="d-inline-block align-top ml-auto logo" alt="">
      </a>

    </nav>
  </header>
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
          <input type="submit" value="Ingresar" class="btn-enviar">
        </div>
      </form>
    </section>
  </main>

  <footer class="">
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
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>
