<?php
  session_start();
  include_once("includes/funciones.php");
  include_once("includes/baseDeDatos.php");
  $pagina="Datos de Usuario";
  //$pagina_anterior=$_SERVER['HTTP_REFERER'];//pagina anterior
  if(isset($_SESSION["activeUser"]) && !is_null($_SESSION["activeUser"])){
    if($_SESSION["activeUser"]["fotoPerfil"]==""){
      $_SESSION["activeUser"]["fotoPerfil"]=(isset($imagenUsuario))?$imagenUsuario:"img/perfil.png";
    }  
    $activeUser=$_SESSION["activeUser"];
  }else{
    header("Location: login.php");exit;
  }
  $pagina="Datos de Usuario";
  $arraySexo=["Hombre","Mujer","Otro"];
  $arrayTiposDeTarjetas=["Mastercad"=>"img/mastercard.png","Visa"=>"img/visa.png","Discover"=>"img/discover.png","America Express"=>"img/americanExpress.png"];
    $jsonProvincias=file_get_contents("json/doc/provincias.json");
    $arrayProvincias=json_decode($jsonProvincias,true);
    $jsonPaises=file_get_contents("json/doc/paises.json");
    $arrayPaises=json_decode($jsonPaises,true);
  $errores=null;
  $input=true;


  if(isset($_POST["guardar"])&& $_POST){
    $usuarioTemporar=[
      "usuario"=>$activeUser["usuario"],
      "email"=>$activeUser["email"],
      "clave"=>$activeUser["clave"],
      "nombre" =>trim($_POST["nombre"]),
      "apellido" =>trim($_POST["apellido"]),
      "telefono" =>trim($_POST["telefono"]),
      "fechaNacimiento"=>trim($_POST["fechaNacimiento"]),
      "direccion"=>trim($_POST["direccion"]),
      "ciudad"=>trim($_POST["ciudad"]),
      "provincia"=>trim($_POST["provincia"]),
      "pais"=>trim($_POST["pais"]),
      "codigoPostal"=>trim($_POST["codigoPostal"]),
      "sexo"=>trim($_POST["sexo"]),
      "nombreTitular"=>trim($_POST["nombreTitular"]),
      "numeroTarjeta"=>trim($_POST["numeroTarjeta"]),
      "tipoDeTarjeta"=>trim($_POST["tipoDeTarjeta"]),
      "fechaVencimiento"=>trim($_POST["fechaVencimiento"]),
      "cvc"=>trim($_POST["cvc"]),
      "fotoPerfil"=>$activeUser["fotoPerfil"]
    ];
    
    //dd($_FILES);
    $requisitos = [
        "usuario"=>[
          MINSIZE=>2,
        ],
        "nombre" => [
            MINSIZE => 2,
            MAXSIZE => 30
        ],
        "apellido" => [
            MINSIZE => 2,
            MAXSIZE => 30
        ],
        "telefono" => [
          MINSIZE => 8,
          TELEFONO
        ],
        "fechaNacimiento"=>[
          FECHA
        ],
        "direccion"=>[
          MINSIZE => 4,
          MAXSIZE => 30
        ],
        "ciudad"=>[
          MINSIZE => 4,
          MAXSIZE => 30
        ],
        "provincia"=>[
          MINSIZE => 4,
          MAXSIZE => 30
        ],
        "pais"=>[
          MINSIZE => 4,
          MAXSIZE => 30
        ],
        "codigoPostal"=>[
          MINSIZE => 2,
          MAXSIZE => 30
        ],
        "sexo"=>[
          SEXO=>$arraySexo
        ],
        "nombreTitular"=>[
          MINSIZE => 2,
          MAXSIZE => 30
        ],
        "numeroTarjeta"=>[
          MINSIZE => 12,
          MAXSIZE => 30,
          TIPODETARJETANUM
        ],
        "tipoDeTarjeta"=>[
          MINSIZE => 3,
          MAXSIZE => 10,
          TIPODETARJETA=>$usuarioTemporar["numeroTarjeta"]
        ],
        "fechaVencimiento"=>[
          FECHAVENCIMIENTOTARJETA
        ],
        "cvc"=>[
          SOLONUMEROS,
          MINSIZE => 3,
          MAXSIZE => 10
        ]
    ];
    //dd($_FILES);
    if($_FILES){
      $errorArchivo=( validarArchivo($_FILES["adjunto"]) );
    }
    
    $errores = hacerValidaciones($_POST, $requisitos);

    if($errorArchivo){
      $errores["archivo"]=$errorArchivo;
    }else{
      if($_FILES["adjunto"]["name"]!=""){
        $imagenUsuario=guardarArchivo($_FILES["adjunto"],$activeUser["usuario"]);
        $usuarioTemporar["fotoPerfil"]=$imagenUsuario;
      }else {
        $imagenUsuario=$usuarioTemporar["fotoPerfil"];
      }
    }
  
    if(!$errores){
      $input=true;
      $miUsuario=$usuarioTemporar;
      $_SESSION["activeUser"]=$miUsuario;
      $arrayUsuarios=getObjectsFromFile("data/usuarios.json");
      //$arrayUsuarios=leerJsonYpasaArray(Direccion);
      $arrayUsuarios[$miUsuario["email"]]=$miUsuario;
      guardarArrayYpasarAJson("data/usuarios.json",$arrayUsuarios);
    }else{
      foreach ($_SESSION["activeUser"] as $key => $value) {
        $valorPersistencia=persistirDato($errores,$key);
        if($key!="fotoPerfil" && $key!="email" && $key!="clave"){
          $_SESSION["activeUser"][$key]=($valorPersistencia=="")?$value:$valorPersistencia;
        }else{
          if($key=="fotoPerfil" && $_SESSION["activeUser"][$key]==""){
            $_SESSION["activeUser"][$key]=(isset($imagenUsuario))?$imagenUsuario:"img/perfil.png";
          }
          
        }
      }
      $input=false;
      //dd($_SESSION["activeUser"]);
    }
   // dd($errores);
  }
  if(isset($_POST["editar"]) && $_POST){
    $input=false;
  }
  if(!($_POST)){

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include_once("includes/headPerfil.php");
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
<!--contenido derecho-->
          <div class="col-12 col-sm-12 col-md-9  col-lg-9 usuario">
            <h1>Perfil</h1>
            <div class=" col-lg-12 mb-4">
                <h2>Datos:</h2>
                <div class="col-12">
                  <!--Formulario-->
    <form class="container-fluir" method="post" action="" name="datosUsuario" enctype="multipart/form-data" autocomplete="on" >
                  
                  <!--imagen-->
                  
                                    <div class="d-flex flex-wrap mx-auto my-4 img-perfil img-fluid">
                                  <div class="contenedor-perfil" >
                                      <img src="<?=(isset($_SESSION["activeUser"]["fotoPerfil"]))?$_SESSION["activeUser"]["fotoPerfil"]:"" ;?>" alt="imagen de perfil" class=" img-hola ">
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
                  
                                        <!-- Campo de selección de archivo -->
                                        <input type="file" name="adjunto" accept=".jpg,.png"  class="examinar col-md-12 col-lg-12 mx-auto" <?=activarDesactivarInput($input) ; ?> >
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
                                  <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"archivo"):""; ?></small>
                              </div>
                  
                  <!--imagen-->
                  <div class="form-group" >
                          <label for="usuario">Usuario</label>
                          <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" value="<?=(isset($_SESSION["activeUser"]["usuario"]))?$_SESSION["activeUser"]["usuario"]:"" ;?>" readonly required>
                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"usuario"):""; ?></small>
                  </div>
                                      <div class="form-row my-1">
                                          <div class="col">
                                              <label for="nombre">Nombre</label>
                                              <input id="nombre" type="text" class="form-control" placeholder="ej:Juan" name="nombre" value="<?=(isset($_SESSION["activeUser"]["nombre"]))?$_SESSION["activeUser"]["nombre"]:"" ;?>" <?=activarDesactivarInput($input) ; ?> required>
                                              <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nombre"):""; ?></small>
                                            </div>
                                            <div class="col">
                                                <label for="apellido">Apellido</label>
                                                <input id="apellido" type="text" class="form-control" placeholder="ej:Lopez" name="apellido" value="<?=(isset($_SESSION["activeUser"]["apellido"]))?$_SESSION["activeUser"]["apellido"]:"" ;?>" <?=activarDesactivarInput($input) ; ?>  required>
                                                <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"apellido"):""; ?></small>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="1564582635"  value="<?=(isset($_SESSION["activeUser"]["telefono"]))?$_SESSION["activeUser"]["telefono"]:"" ;?>" <?=activarDesactivarInput($input) ; ?> required>
                                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"telefono"):""; ?></small>
                                      </div>
                                      <div class="form-group my-2">
                                          <label for="fechaNacimiento ">Fecha de Nacimiento</label>
                                          <input type="date" class="form-control" id="fechaNacimiento" placeholder="dd-mm-yyyy" name="fechaNacimiento" value="<?=(isset($_SESSION["activeUser"]["fechaNacimiento"]))?$_SESSION["activeUser"]["fechaNacimiento"]:"" ;?>" <?=activarDesactivarInput($input) ; ?>  required>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"fechaNacimiento"):""; ?></small>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputAddress">Direccion</label>
                                        <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="calle altura ej:av.rivadavia 4302"  value="<?=(isset($_SESSION["activeUser"]["direccion"]))?$_SESSION["activeUser"]["direccion"]:"" ;?>" <?=activarDesactivarInput($input) ; ?> required>
                                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"direccion"):""; ?></small>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-5">
                                          <label for="inputCity">Ciudad</label>
                                          <input type="text" class="form-control" id="inputCity" value="<?=(isset($_SESSION["activeUser"]["ciudad"]))?$_SESSION["activeUser"]["ciudad"]:"" ;?>" placeholder="Caseros" name="ciudad" <?=activarDesactivarInput($input) ; ?> required>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"ciudad"):""; ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputState">Provincia</label>
                                          <select id="inputState" class="form-control" name="provincia" <?=activarDesactivarInput($input) ; ?> required >
                                            <option value="" >Seleccionar</option>
                                            <?php
                                                $valorProvincia=(isset($_SESSION["activeUser"]["provincia"]))?$_SESSION["activeUser"]["provincia"]:"" ;
                                                for ($i=0; $i <count($arrayProvincias) ; $i++) {
                                                    $valor=$arrayProvincias[$i]["nombre"];
                                                    if($valorProvincia==$valor){
                                                      echo "<option value='$valor' selected>$valor</option>";
                                                    }else{
                                                      echo "<option value='$valor' >$valor</option>";
                                                    }
                                                }
                                            ?>
                                          </select>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"provincia"):""; ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Pais</label>
                                            <select id="inputState" class="form-control" name="pais" <?=activarDesactivarInput($input) ; ?> required >
                                              <option value="" >Seleccionar</option>
                                              <?php
                                                $valorPais=(isset($_SESSION["activeUser"]["pais"]))?$_SESSION["activeUser"]["pais"]:"" ;
                                                for ($i=0; $i <count($arrayPaises) ; $i++) {
                                                    $valor=$arrayPaises[$i];
                                                    if($valorPais==$valor){
                                                      echo "<option value='$valor' selected >$valor</option>";
                                                    }else{
                                                      echo "<option value='$valor' >$valor</option>";
                                                    }
                                                }
                                            ?>
                                            </select>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"pais"):""; ?></small>
                                          </div>
                                        <div class="form-group col-md-3">
                                          <label for="inputZip">Codigo Postal</label>
                                          <input type="text" class="form-control" id="inputZip" placeholder="codigo postal" value="<?=(isset($_SESSION["activeUser"]["codigoPostal"]))?$_SESSION["activeUser"]["codigoPostal"]:"" ;?>" <?=activarDesactivarInput($input) ; ?> name="codigoPostal" required>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"codigoPostal"):""; ?></small>
                                        </div>
                                      </div>
                                      <fieldset class="form-group">
                                          <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Sexo </legend>
                                            <div class="col-sm-10">
                                              <?php $valorSexo=(isset($_SESSION["activeUser"]["sexo"]))?$_SESSION["activeUser"]["sexo"]:"" ; ?>
                                              <?php foreach ($arraySexo as $value): ?>
                                              <div class="form-check">
                                                 <?php if($valorSexo==$value){ ?>
                                                  <input class="form-check-input" type="radio" name="sexo" id="<?=$value ; ?>" value="<?=$value;?>" checked <?=activarDesactivarInput($input) ; ?> required>
                                                <label class="form-check-label" for="<?=$value ; ?>">
                                                  <?=$value; ?>
                                                </label>
                                                 <?php }else{ ?>
                                                    <input class="form-check-input" type="radio" name="sexo" id="<?=$value ; ?>" value="<?=$value;?>" <?=activarDesactivarInput($input) ; ?> required>
                                                <label class="form-check-label" for="<?=$value ; ?>">
                                                  <?=$value; ?>
                                                </label>
                                                 <?php } ?>
                                                
                                                
                                              </div>
                                              <?php endforeach ?>
                                            </div>
                                          </div>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"sexo"):""; ?></small>
                                        </fieldset>
                                        <label for="datoDeTarjeta"><h5>Datos de Tarjeta</h5></label>
                                        <div class="form-group">
                                            <label for="NombreTarjeta">Nombre Completo del Titular</label>
                                            <input type="text" class="form-control" id="NombreTarjeta" name="nombreTitular"  value="<?=(isset($_SESSION["activeUser"]["nombreTitular"]))?$_SESSION["activeUser"]["nombreTitular"]:"" ;?>" placeholder="Nombre del titular" <?=activarDesactivarInput($input) ; ?> required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nombreTitular"):""; ?></small>
                                        </div>
                                        <div class="form-group" id="datoDeTarjeta">
                                            <label for="Numerotarjeta">Numero de tarjeta</label>
                                            <input type="text" class="form-control" id="Numerotarjeta" name="numeroTarjeta"  value="<?=(isset($_SESSION["activeUser"]["numeroTarjeta"]))?$_SESSION["activeUser"]["numeroTarjeta"]:"" ;?>"  placeholder="ingrese el numero sin guiones(-) ej 5119101838103698" <?=activarDesactivarInput($input) ; ?> required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"numeroTarjeta"):""; ?></small>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                              <legend class="col-form-label col-sm-4 pt-0">Tipo de pago </legend>
                                              <div class="col-sm-10">
                                              <?php $valorTP=(isset($_SESSION["activeUser"]["tipoDeTarjeta"]))?$_SESSION["activeUser"]["tipoDeTarjeta"]:"" ; ?>
                                                <?php foreach ($arrayTiposDeTarjetas as $key => $value): ?>
                                                <div class="form-check col-4 form-check-inline">
                                                  <?php
                                                   if($valorTP==$key){ ?>
                                                         <input class="form-check-input" type="radio" name="tipoDeTarjeta" id="<?=$key; ?>" value="<?=$key; ?>" checked <?=activarDesactivarInput($input) ; ?> required>
                                                  <label class="form-check-label" for="<?=$key; ?>">
                                                      <img src="<?=$value; ?>" alt="<?=$key; ?>" width="60">
                  
                                                  </label>
                                                  <?php }else{ ?>
                                                    <input class="form-check-input" type="radio" name="tipoDeTarjeta" id="<?=$key; ?>" value="<?=$key; ?>" <?=activarDesactivarInput($input) ; ?> required>
                                                  <label class="form-check-label" for="<?=$key; ?>">
                                                      <img src="<?=$value; ?>" alt="<?=$key; ?>" width="60">
                  
                                                  </label>   
                                                 <?php } ?>
                                                 
                                                </div>
                                                <?php endforeach ?>
                                              </div>
                                            </div>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"tipoDeTarjeta"):""; ?></small>
                                          </fieldset>
                                        <div class="form-group" >
                                            <label for="fechaVencimiento col-6">Fecha de Vencimiento</label>
                                            <input type="text" class="form-control col-6" id="fechaVencimiento" name="fechaVencimiento" value="<?=(isset($_SESSION["activeUser"]["fechaVencimiento"]))?$_SESSION["activeUser"]["fechaVencimiento"]:"" ;?>" <?=activarDesactivarInput($input) ; ?> placeholder="mm/yyyy" required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"fechaVencimiento"):""; ?></small>
                                        </div>
                                        <div class="form-group" >
                                            <label for="cvc" class="col-sm-4 px-0">CVC</label>
                                            <input type="text" class="form-control col-sm-6" id="cvc" name="cvc"  value="<?=(isset($_SESSION["activeUser"]["cvc"]))?$_SESSION["activeUser"]["cvc"]:"" ;?>" placeholder="ingrese el cvc" <?=activarDesactivarInput($input) ; ?> required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"cvc"):""; ?></small>
                                        </div>
                                      <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto my-2" name="editar">Editar</button>
                                      <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto my-2" name="guardar">guardar</button>
                                    </form>
                                    <!--Formulario-->
                </div>
          </div>
        </div>
        <!--contenido derecho-->
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
