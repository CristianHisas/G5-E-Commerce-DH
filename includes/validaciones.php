<?php
/*
----------------- USO ------------------
0) require_once "validaciones.php";

1) Crear arreglo asociativo $requisitos
    a) Las claves deben ser las de la variable $_POST/GET
    que se quieran validar.
    b) Los valores van dentro de un arreglo.
    EJ:
        $requisitos = [
            "postKey" => [
                MINSIZE => 5,
                CORREO
            ]
        ];
------------------
2) Enviarle $_POST/GET y $requisitos a "hacerValidaciones()" y almacenar
el retorno en una variable.
    EJ:
        $errores = hacerValidaciones($_POST, $requisitos);
-------------------
3) Mostrar los errores enviándole los errores a la funcion "mostrarErrores()"
    EJ:
        <?php if(isset($errores)) echo mostrarErrores($errores) ?>
    
CONSTANTES -----------
    MINSIZE => n
    MAXSIZE => n
    CORREO
    CLAVE
    SCAPE
---------------------

-------- EJEMPLO COMPLETO ---------
Se recibe por $_POST["name","email" y "pass"].
$requisitos = [
    "name" => [
        MINSIZE => 5,
        MAXSIZE => 20
    ],
    "email" => [
        CORREO
    ],
    "pass" => [
        CLAVE
    ]
];
$errores = hacerValidaciones($_POST, $requisitos);
<html>    <?php if(isset($errores)) echo mostrarErrores($errores) ?>  </html>

----------------------------------------
*/
define("CLAVE", "asdfasdfavr");
define("CORREO", "34vq3vfvzxv");
define("MINSIZE", "asdy6we6ar66");
define("MAXSIZE", "asdf444322d");
define("SCAPE", "asdf422f1fds");
define("TELEFONO", "fddf4534ka");
define("FECHA","7d");
define("SEXO","8d");
define("TIPODETARJETANUM","9d");
define("TIPODETARJETA","10d");
define("FECHAVENCIMIENTOTARJETA","11d");
define("SOLONUMEROS","d12");

function hacerValidaciones($arr, $requisitos){
    $errores = [];
    foreach($arr as $key => $val){
        if(isset($requisitos[$key])){
            $errs = validar($val, $requisitos[$key]);
            if($errs){
                $errores[$key] = [];
                foreach($errs as $err){
                    $errores[$key][] = $err;
                }
            }
        }
    }
    return $errores;
}


function validar($value, $requisitos){
    $ret = [];
    $errs = [];
    if(in_array(CLAVE, $requisitos) || isset($requisitos[CLAVE])){
        $errs[] = validarClave($value, $requisitos);
    }
    if(in_array(CORREO, $requisitos) || isset($requisitos[CORREO])){
        $errs[] = validarCorreo($value);
    }
    if(in_array(TELEFONO, $requisitos) || isset($requisitos[TELEFONO])){
        $errs[] = validarTelefono($value, $requisitos);
    }
    if(isset($requisitos[MINSIZE]) || isset($requisitos[MAXSIZE])){
        $errs[] = validarSize($value, $requisitos);
    }
	if(in_array(FECHA, $requisitos) || isset($requisitos[FECHA])){
        $errs[] = validarFecha($value);
    }
    if(isset($requisitos[SEXO])){
        $errs[] = validarSexo($value,$requisitos[SEXO]);
    }
    if(isset($requisitos[TIPODETARJETANUM]) || in_array(TIPODETARJETANUM, $requisitos)){
        $errs[] = validarNumeroDeTarjeta($value);
    }
    if(isset($requisitos[TIPODETARJETA])){
        $errs[] = validarTipoDeTarjeta($value,$requisitos[TIPODETARJETA]);
    }
    if(isset($requisitos[FECHAVENCIMIENTOTARJETA])|| in_array(FECHAVENCIMIENTOTARJETA, $requisitos)){
        $errs[] = validarFechaDeVencimiento($value);
    }
    if(isset($requisitos[SOLONUMEROS])|| in_array(SOLONUMEROS, $requisitos)){
        $errs[] = validarSoloNumeros($value);
    }
    foreach($errs as $err){
        $ret = array_merge($ret, $err);
    }
    return $ret;
}


function validarSize($value, $requisitos){
    // unset($requisitos[MINSIZE])
    $errores = [];
    foreach($requisitos as $key => $val){
        if(
            $key === MINSIZE
            && strlen($value) < $val    
        ){
            $errores[] = "al menos $val caracteres";
        }
        else
        if(
            $key === MAXSIZE
            && strlen($value) > $val    
        ){
            $errores[] = "menos de $val caracteres";
        }
    }
    return $errores;
}

function validarClave($value, $requisitos){
    $ret = [];
    if(strlen($value) < 8){
        $ret[] = "al menos ocho caracteres";
    }
    if (!preg_match('`[a-z]`',$value)){
        $ret[] = "al menos una letra minúscula";
     }
     if (!preg_match('`[A-Z]`',$value)){
        $ret[] = "al menos una letra mayúscula";
     }
     if (!preg_match('`[0-9]`',$value)){
        $ret[] = "al menos un caracter numérico";
     }
     return $ret;
}

function validarCorreo($value){
    $ret = [];
    if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
        $ret[] = "un formato válido";
    }
    return $ret;
}

function validarTelefono($value, $requisitos){
    $ret = [];
    if (preg_match('`[^0-9]`',$value)){
        $ret[] = "sólo caracteres numéricos";
    }
    return $ret;
}
//agregado
function pre($valor){
    echo "<pre>";
    var_dump($valor);
    echo "<pre/>";
}
function dd($valor){
    pre($valor);
    exit;
}
//agregado
//agregado

function validarFecha($fecha){
    $ret=[];
    $fecha=preg_replace("/[\-\/.]/","/", $fecha);
    $valores = explode('/', $fecha);

    if(empty($fecha)){
        $ret[]="Debe llenar este campo";
    }elseif(count($valores) != 3 || !( checkdate($valores[1], $valores[2], $valores[0]) xor checkdate($valores[0], $valores[1], $valores[2]) xor checkdate($valores[1], $valores[0], $valores[2]) ) ){
        $ret[]="un formato válido";
    }
	return $ret;
}
function validarSexo($sexo,$requisitos){
    $ret=[];
    $msj=null;
    if(empty($sexo)){
        $ret[]="Debe llenar este campo";
    }elseif(!in_array($sexo, $requisitos)){
        $msj="Seleccione una de las opciones: ";
        foreach ($requisitos as $value) {
        $msj.=" - ".$value." ";
        }
        $ret[]=$msj;
    }
    
    return $ret;
}
function validarNumeroDeTarjeta($numeroDeTarjeta){
    $ret=[];
    if(empty($numeroDeTarjeta)){
        $ret[]="Debe llenar este campo";
    }elseif(
        !(
        preg_match('/^6(?:011|5[0-9]{2})[0-9]{12}$/',$numeroDeTarjeta)
            || 
        preg_match('/^3[47][0-9]{13}$/',$numeroDeTarjeta)
            ||
        preg_match('/^5[1-5][0-9]{14}$/',$numeroDeTarjeta)
        ||
        preg_match('/^4[0-9]{15}$/',$numeroDeTarjeta)
        )
        ){
            $ret[]="Numero de Tarjeta Invalida";
    }
    return $ret;
}
function validarTipoDeTarjeta($tipoDeTarjeta,$numeroDeTarjeta){
    $arrayTarjeta=[3=>"America Express",4=>"Visa",5=>"Mastercad",6=>"Discover"];
    $resultado=validarNumeroDeTarjeta($numeroDeTarjeta);
    if(!$resultado){
        $valor=trim($numeroDeTarjeta);
        $valor=substr($valor,0,1);
        if(!($arrayTarjeta[$valor]==$tipoDeTarjeta)){
            $resultado[]="Seleccion Incorrecta de Tipo de Tarjeta";
        }
    }
    return $resultado;
}
function validarFechaDeVencimiento($mesYAnio){
    $ret=[];
    //pre("es ");
    //pre(preg_replace("/^[\-\/.]$/","/^[\/]$/", $mesYAnio));
    //dd(preg_match("/^(0[1-9]|1[012])[\-\/.](1|2)\d\d\d$/",$mesYAnio));
    //dd(preg_match("/^(0[1-9]|1[0-2])\/[0-9]{4}$/",$mesYAnio));
    //checkdate($valores[2], $valores[1], $valores[0]);
    //$valores = explode('/', $mesYAnio);
    if(empty($mesYAnio)){
        $ret[]="Debe llenar este campo";
    }else{
        if(preg_match("/^(0[1-9]|1[012])[\-\/.](1|2)\d\d\d$/",$mesYAnio)>0){
            $mesYAnio=preg_replace("/[\-\/.]/","/",$mesYAnio);
            //$valores = explode('/', $mesYAnio);
            $fecha_actual = date("d-m-Y");
            $diff = ( strtotime("01/".$mesYAnio) - strtotime($fecha_actual) );
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            if($years<=0 && $months<=0){
                $ret[]="La tarjeta esta vencida";
            }
            //preg_match("/^(1|2)\d\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/",$mesYAnio); verifica el yyyy-mm-dd
            //$fecha_actual = date("d-m-Y");
            //dd(date("d-m-Y",strtotime($fecha_actual."- ".$valores[0]." month"."- ".$valores[1]." year")) );            
            }else{
    
                $ret[]="un formato válido";
            }
    }
	return $ret;
}
function validarArchivo($archivo){
    $ret=[];
    if( !($archivo["error"]===UPLOAD_ERR_NO_FILE && $archivo["name"]=="") ){

        if($archivo["error"]!==UPLOAD_ERR_OK){
            $ret[]="El archivo subido fue sólo parcialmente cargado";
            switch ($archivo["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                    $ret[] = "El archivo cargado supera la directiva upload_max_filesize en php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $ret[] = "El archivo cargado excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $ret[] = "El archivo cargado solo se cargó parcialmente";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $ret[] = "No se cargó ningún archivo";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $ret[] = "Falta una carpeta temporal";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $ret[] = "Error al escribir el archivo en el disco";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $ret[] = "Carga de archivo detenida por extensión";
                    break;
    
                default:
                    $ret[] = "Error de carga desconocido";
                    break;
            } 
        }else{
            if($archivo["size"]>10000000){
                $ret[]="No puede superar los 10MB";
            }else{
                $nombre=$archivo["name"];
                $ext=pathinfo($nombre,PATHINFO_EXTENSION);
                if($ext!="jpg" && $ext!="png"){
                    $ret[]="Subir una imagen de tipo jpg o png";
                }
            }
        }
    

    }
    return $ret;
}
function guardarArchivo($file,$nombre="text"){
    if($file["name"]!=""){
        $nombreArchivo=$file["name"];
    $archivo=$file["tmp_name"];
    $ext=pathinfo($nombreArchivo,PATHINFO_EXTENSION);
    $miArchivo="img/Usuario/".$nombre;
     //ruta actual
    $nombre="avatar".uniqid();
    if (!file_exists($miArchivo)) {
        mkdir($miArchivo, 0777, true);
    }
    $directorio = opendir($miArchivo);
    $cont=0;
    $archivoEliminar="";
    while ($archivoDir = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
    {
        if (!is_dir($archivoDir))//verificamos si es o no un directorio
            {
        //var_dump ($archivoDir );
            if(preg_match("/avatar/i" ,$archivoDir)){//encuentra un archivo que coincida con el patron
                $cont++;
                $archivoEliminar=$archivoDir;   
            }
        }
    }
    if($cont>1){
        unlink($miArchivo."/".$archivoEliminar);
    }
    $miArchivo=$miArchivo."/".$nombre.".".$ext;
    move_uploaded_file($archivo,$miArchivo);
    return $miArchivo;
    }
    return null;
}
function persistirDato($arrayE, $string) {
    if(isset($arrayE[$string])) {
        return "";
    } else {
        if(isset($_POST[$string])) {
            return $_POST[$string];
        }
    }
    return "";
}
function mostrarErroresPerfil($arrayError,$nombre){
    if(isset($arrayError[$nombre])){
        echo"<ul class='text-decoration-none'>";
        foreach ($arrayError[$nombre] as $key => $value) {
            echo "<li>$value</li>";
        }
        echo"</ul>";     
    }
}
function validarSoloNumeros($value){
    $ret = [];
    if (preg_match('`[^0-9]`',$value)){
        $ret[] = "sólo caracteres numéricos";
    }
    return $ret;
}
//agregado
// Si se envía la clave "soloTexto" no imprime ..el campo tal bla bla bla.
function imprimirErrores($errores){
    if($_POST){
        echo "<ul class='errores col-12'>";
        foreach($errores as $key => $errores){
        $coma = "";
        $return = "<li>El campo <u style='color:black'>$key</u> debe tener ";
        foreach($errores as $error){
                $return .= "$coma $error";
                if(!$coma) $coma = ",";
        }
        echo $return .".</li>";
        }
        echo '</ul>';
    }
}
?>