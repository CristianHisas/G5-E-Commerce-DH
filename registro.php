<?php
require_once "php/funciones.php";

if($_POST /*|| true*/){
    // $_POST["nombre"] = "test";
    // $_POST["apellido"] = "test";
    // $_POST["correo"] = "test";
    // $_POST["usuario"] = "test";
    // $_POST["clave"] ="test";
    // $_POST["telefono"] = "test";

    $nombre = $_POST["nombre"] ;
    $apellido = $_POST["apellido"] ;
    $correo = $_POST["correo"] ;
    $usuario = $_POST["usuario"] ;
    $clave = $_POST["clave"];
    $telefono = $_POST["telefono"] ;

    $requisitos = [
        "nombre" => [
            MINSIZE => 4,
            MAXSIZE => 15
        ],
        "apellido" => [
            MINSIZE => 4,
            MAXSIZE => 15
        ],
        "correo" => [
            CORREO
        ],
        "usuario" => [
            MINSIZE => 4,
            MAXSIZE => 15
        ],
        "clave" => [
            CLAVE
        ],
        "telefono" => [
            TELEFONO
        ]
    ];

    $errores = hacerValidaciones($_POST, $requisitos);

    if(!$errores){
        // setcookies
        header("Location: perfil.html");
    }

}
else{     
        $nombre = "";
        $apellido = "";
        $correo = "";
        $usuario = "";
        $clave = "";
        $telefono = "" ; 
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
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                crossorigin="anonymous">
        <link rel="stylesheet" href="css/styleAnto.css">
        <title>registro</title>
        <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body class="main-login">
        <header class="container-fluir fixed-top">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark  barra">
                        <a class="navbar-brand" href="home.html">
                                <img src="img/e-com1.png" width="30" height="30" class="d-inline-block align-top logo"
                                        alt="">
                                <span>E-commerce</span>
                        </a>
                        <a class="navbar-brand pregunta" href="faq.html">
                                <img src="img/pregunta.png" width="30" height="30"
                                        class="d-inline-block align-top ml-auto logo" alt="">
                        </a>

                </nav>
        </header>
        <main class=" container mb-4 main-inicio">
                <ul class=" ubicacion col-12">
                        <li><a href="home.html">Home</a> <span class="divider">/</span></li>
                        <li>Cuenta <span class="divider">/</span></li>
                        <li class="active">Registro</li>
                </ul>
                <section class=" mb-2">
                        <!--<h2>Inicio de Seccion</h2> -->
                        <form class="col-10 col-sm-6 col-md-6 col-lg-6 mx-auto" action="" method="post">
                                <!-- <form action="registrar.php" metodo="post" class="form"> -->
                                <h2 class="form-titulo">CREA UNA CUENTA</h2>
                                <div class="contenedor-inputs">
                                        <input type="text" name="nombre" placeholder="Nombre" class="input-48" required value="<?=$nombre?>">
                                        <input type="text" name="apellido" placeholder="Apellido" class="input-48"
                                                required value="<?=$apellido?>">
                                        <input type="email" name="correo" placeholder="Correo" class="input-100"
                                                required value="<?=$correo?>">
                                        <input type="text" name="usuario" placeholder="Usuario" class="input-48"
                                                required value="<?=$usuario?>">
                                        <input type="password" name="clave" placeholder="Contraseña" class="input-48"
                                                required value="<?=$clave?>">
                                        <input type="text" name="telefono" placeholder="Telefono" class="input-100"
                                                required value="<?=$telefono?>">
                                        <ul class="errores col-12">
                                            <?php
                                               if($_POST){
                                                foreach($errores as $key => $errores){
                                                    $coma = "";
                                                    $return = "<li>El campo <u>$key</u> debe tener ";
                                                    foreach($errores as $error){
                                                        $return .= "$coma $error";
                                                        if(!$coma) $coma = ",";
                                                    }
                                                    echo $return .".</li>";
                                                }
                                               }
                                            ?>
                                        </ul>
                                        <input type="submit" value="Registrar" class="btn-enviar">
                                        <p class="form__link">¿Ya tienes una cuenta?<a href="login.html">Ingresa aqui</a></p>
                                </div>

                        </form>
                </section>
        </main>

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
                                        <a href="registro.html">REGISTRATION</a>
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