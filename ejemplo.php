<?php
session_start();
  if(isset($_SESSION["email"])){
    $email=$_SESSION["email"];
  }else{
    $_SESSION["email"]="test";
  }
  $pagina="Datos de Usuario";
  $arraySexo=["Hombre","Mujer","Otro"];
  $arrayTiposDeTarjetas=["Mastercad"=>"img/mastercard.png","Visa"=>"img/visa.png","Discover"=>"img/discover.png","America Express"=>"img/americanExpress.png"];
    $jsonProvincias=file_get_contents("json/doc/provincias.json");
    $arrayProvincias=json_decode($jsonProvincias,true);
    $jsonPaises=file_get_contents("json/doc/paises.json");
    $arrayPaises=json_decode($jsonPaises,true);
  $errores=null;
  include_once("includes/fileManager.php");
  include_once("includes/validaciones.php");
  
  if($_POST){
    $nombre = $_POST["nombre"] ;
    $apellido = $_POST["apellido"] ;
    $telefono = $_POST["telefono"] ;
    $fechaNacimiento=$_POST["fechaNacimiento"];
    $direccion=$_POST["direccion"];
    $ciudad=$_POST["ciudad"];
    $provincia=$_POST["provincia"];
    $pais=$_POST["pais"];
    $codigoPostal=$_POST["codigoPostal"];
    $sexo=$_POST["sexo"];
    $nombreTitular=$_POST["nombreTitular"];
    $numeroTarjeta=$_POST["numeroTarjeta"];
    $tipoDeTarjeta=$_POST["tipoDeTarjeta"];
    $fechaVencimientoMes=$_POST["fechaVencimiento"];
    $cvc=$_POST["cvc"];
    //dd($_FILES);
    $requisitos = [
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
          TIPODETARJETA=>$numeroTarjeta
        ],
        "fechaVencimiento"=>[
          FECHAVENCIMIENTOTARJETA
        ],
        "cvc"=>[
          MINSIZE => 3,
          MAXSIZE => 10
        ]
    ];
    if($_FILES){
      $errorArchivo=( validarArchivo($_FILES["adjunto"]) );
    }
    
    $errores = hacerValidaciones($_POST, $requisitos);

    if($errorArchivo){
      $errores["archivo"]=$errorArchivo;
    }else{
      $imagenUsuario=guardarArchivo($_FILES["adjunto"],$_SESSION["email"]);
    }
   // dd($errores);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include_once("includes/headPerfil.php");
?>
  <link rel="stylesheet" href="css/stylePerfilSeguridadResumen.css">
    <title>Document</title>
</head>
<body class="px-5">
    <!--Formulario-->
    <form class="container-fluir" method="post" action="" name="datosUsuario" enctype="multipart/form-data" autocomplete="on">
                  
                  <!--imagen-->
                  
                                    <div class="d-flex flex-wrap mx-auto my-4 img-perfil img-fluid">
                                  <div class="contenedor-perfil" >
                                      <img src="<?=(isset($imagenUsuario))?$imagenUsuario:"img/img-perfil.png";?>" alt="imagen de perfil" class=" img-hola ">
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
                                        <input type="file" name="adjunto" accept=".jpg,.png"  class="examinar col-md-12 col-lg-12 mx-auto">
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
        
                                      <div class="form-row my-1">
                                          <div class="col">
                                              <label for="nombre">Nombre</label>
                                              <input id="nombre" type="text" class="form-control" placeholder="ej:Juan" name="nombre" value="<?= persistirDato($errores, 'nombre'); ?>"  required>
                                              <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nombre"):""; ?></small>
                                            </div>
                                            <div class="col">
                                                <label for="apellido">Apellido</label>
                                                <input id="apellido" type="text" class="form-control" placeholder="ej:Lopez" name="apellido" value="<?= persistirDato($errores, 'apellido'); ?>"   required>
                                                <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"apellido"):""; ?></small>
                                            </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="1564582635"  value="<?= persistirDato($errores, 'telefono'); ?>"  required>
                                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"telefono"):""; ?></small>
                                      </div>
                                      <div class="form-group my-2">
                                          <label for="fechaNacimiento ">Fecha de Nacimiento</label>
                                          <input type="date" class="form-control" id="fechaNacimiento" placeholder="dd-mm-yyyy" name="fechaNacimiento" value="<?= persistirDato($errores, 'fechaNacimiento'); ?>"   required>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"fechaNacimiento"):""; ?></small>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputAddress">Direccion</label>
                                        <input type="text" class="form-control" id="inputAddress" name="direccion" placeholder="calle altura ej:av.rivadavia 4302"  value="<?= persistirDato($errores, 'direccion'); ?>"  required>
                                        <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"direccion"):""; ?></small>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-5">
                                          <label for="inputCity">Ciudad</label>
                                          <input type="text" class="form-control" id="inputCity" value="<?= persistirDato($errores, 'ciudad'); ?>" placeholder="Caseros" name="ciudad"  required>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"ciudad"):""; ?></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputState">Provincia</label>
                                          <select id="inputState" class="form-control" name="provincia" required >
                                            <option value="" >Seleccionar</option>
                                            <?php
                                                for ($i=0; $i <count($arrayProvincias) ; $i++) {
                                                    $valor=$arrayProvincias[$i]["nombre"];
                                                    if(persistirDato($errores, 'provincia')==$valor){
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
                                            <select id="inputState" class="form-control" name="pais" required >
                                              <option value="" >Seleccionar</option>
                                              <?php
                                                for ($i=0; $i <count($arrayPaises) ; $i++) {
                                                    $valor=$arrayPaises[$i];
                                                   echo "<option value='$valor' >$valor</option>";
                                                }
                                            ?>
                                            </select>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"pais"):""; ?></small>
                                          </div>
                                        <div class="form-group col-md-3">
                                          <label for="inputZip">Codigo Postal</label>
                                          <input type="text" class="form-control" id="inputZip" placeholder="codigo postal" value="1245"  name="codigoPostal" required>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"codigoPostal"):""; ?></small>
                                        </div>
                                      </div>
                                      <fieldset class="form-group">
                                          <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Sexo </legend>
                                            <div class="col-sm-10">
                                              <?php foreach ($arraySexo as $value): ?>
                                              <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sexo" id="<?=$value ; ?>" value="<?=$value;?>"  required>
                                                <label class="form-check-label" for="<?=$value ; ?>">
                                                  <?=$value; ?>
                                                </label>
                                                
                                              </div>
                                              <?php endforeach ?>
                                            </div>
                                          </div>
                                          <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"sexo"):""; ?></small>
                                        </fieldset>
                                        <label for="datoDeTarjeta"><h5>Datos de Tarjeta</h5></label>
                                        <div class="form-group">
                                            <label for="NombreTarjeta">Nombre Completo del Titular</label>
                                            <input type="text" class="form-control" id="NombreTarjeta" name="nombreTitular"  value="Juan Lopez" placeholder="Nombre del titular"  required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"nombreTitular"):""; ?></small>
                                        </div>
                                        <div class="form-group" id="datoDeTarjeta">
                                            <label for="Numerotarjeta">Numero de tarjeta</label>
                                            <input type="number" class="form-control" id="Numerotarjeta" name="numeroTarjeta"  value="5241123512685436" maxlength="12" placeholder="ingrese el numero sin guiones(-)" required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"numeroTarjeta"):""; ?></small>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                              <legend class="col-form-label col-sm-4 pt-0">Tipo de pago </legend>
                                              <div class="col-sm-10">
                                                <?php foreach ($arrayTiposDeTarjetas as $key => $value): ?>
                                                <div class="form-check col-4 form-check-inline">
                                                  <input class="form-check-input" type="radio" name="tipoDeTarjeta" id="<?=$key; ?>" value="<?=$key; ?>" required>
                                                  <label class="form-check-label" for="<?=$key; ?>">
                                                      <img src="<?=$value; ?>" alt="<?=$key; ?>" width="60">
                  
                                                  </label>
                                                </div>
                                                <?php endforeach ?>
                                              </div>
                                            </div>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"tipoDeTarjeta"):""; ?></small>
                                          </fieldset>
                                        <div class="form-group" >
                                            <label for="fechaVencimiento col-6">Fecha de Vencimiento</label>
                                            <input type="text" class="form-control col-6" id="fechaVencimiento" name="fechaVencimiento" value="03/2030" placeholder="mm/yyyy" required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"fechaVencimiento"):""; ?></small>
                                        </div>
                                        <div class="form-group" >
                                            <label for="cvc" class="col-sm-4 px-0">CVC</label>
                                            <input type="number" class="form-control col-sm-2" id="cvc" name="cvc"  value="356" placeholder="ingrese el cvc"  required>
                                            <small class="text-danger"><?=(isset($errores))?mostrarErroresPerfil($errores,"cvc"):""; ?></small>
                                        </div>
                                      <button type="button" class="btn btn-secondary ml-md-auto boton-efecto my-2">Editar</button>
                                      <button type="submit" class="btn btn-secondary ml-md-auto boton-efecto my-2">guardar</button>
                                    </form>
                                    <!--Formulario-->
<?php
    include_once("includes/scriptBootstrap.php")
?>
</body>
</html>