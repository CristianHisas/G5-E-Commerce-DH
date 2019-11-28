<!DOCTYPE html>
<?php
$pagina="Registro";
require "./includes/funciones.php";

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
    $telefono = $_POST["telefono"];


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
            MINSIZE => 8,
            TELEFONO
        ]
    ];

    $errores = hacerValidaciones($_POST, $requisitos);

    if(!$errores){
        // setcookies
        
        header("Location: perfil.php");
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

<html lang="en">

<head>
<?php
include_once("includes/headPerfil.php");
?>
        <link rel="stylesheet" href="css/styleAnto.css">
        <title>registro</title>
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
				<?php
                        include_once("includes/ubicacionPerfil.php")
                ?>
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
                                        <?php if(isset($errores)) echo imprimirErrores($errores) ?>
                                        <input type="submit" value="Registrar" class="btn-enviar">
                                        <p class="form__link">¿Ya tienes una cuenta?<a href="login.html">Ingresa aqui</a></p>
                                </div>

                        </form>
                </section>
        </main>

        <!-- footer -->
<?php
    include_once("includes/footer.php");
  ?>
<!-- fin footer -->
<?php
    include_once("includes/scriptBootstrap.php");
  ?>
    <script src="https://kit.fontawesome.com/67f61afa3e.js" crossorigin="anonymous"></script>
</body>

</html>
