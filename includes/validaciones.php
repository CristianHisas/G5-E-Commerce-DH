<?php

define("CLAVE", 6);
define("CORREO", 1);
define("MINSIZE", 2);
define("MAXSIZE", 3);
define("SCAPE", 4);
define("TELEFONO", 5);

function validar($value, $requisitos){
    $ret = [];
    $errs = [];
    if(
        in_array(MINSIZE, $requisitos) || isset($requisitos[MINSIZE])
        || in_array(MAXSIZE, $requisitos) || isset($requisitos[MAXSIZE])
     ){
        $errs[] = validarSize($value, $requisitos);
    }
    if(isset($requisitos[CORREO])){
        $errs[] = validarEmail($value, $requisitos);
    }
    if(in_array(CLAVE, $requisitos) || isset($requisitos[CLAVE])){
        // echo "<h2>CLAVE</h2>";
        $errs[] = validarClave($value, $requisitos);
    }
    if(in_array(CORREO, $requisitos) || isset($requisitos[CORREO])){
        // echo "<h2>CORREO</h2>";
        $errs[] = validarCorreo($value);
    }
    if(in_array(TELEFONO, $requisitos) || isset($requisitos[TELEFONO])){
        // echo "<h2>TEL</h2>";
        $errs[] = validarTelefono($value, $requisitos);
    }
    foreach($errs as $err){
        $ret = array_merge($ret, $err);
    }
    // var_dump($ret);
    return $ret;
}


function validarSize($value, $requisitos){
    $errores = [];
    foreach($requisitos as $key => $val){
        if(
            $key == MINSIZE
            && strlen($value) < $val    
        ){
            $errores[] = "al menos $val caracteres";
        }
        else
        if(
            $key == MAXSIZE
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

?>

<?php
// define("CLAVE", 0);
// define("CORREO", 1);
// define("MINSIZE", 2);
// define("MAXSIZE", 3);
// define("SCAPE", 4);
// define("TELEFONO", 5);

// if($_POST){
//     $nombre = $_POST["nombre"];
//     $apellido = $_POST["apellido"];
//     $email = $_POST["correo"];
//     $usuario = $_POST["usuario"];
//     $clave = $_POST["clave"];
//     $telefono = $_POST["telefono"];
    
//     $requisitos = [
//         $nombre => [
//             MINSIZE => 4,
//             MAXSIZE => 15
//         ],
//         $apellido => [
//             MINSIZE => 4,
//             MAXSIZE => 15
//         ],
//         $email => CORREO,
//         $usuario => [
//             MINSIZE => 4,
//             MAXSIZE => 15
//         ],
//         $clave => CLAVE,
//         $telefono => TELEFONO
//     ]

//     $errores = [];
//     foreach($_POST as $key => $val){
//         if($err = validar($val, $requisitos[$key])){
//             $errores[$key] = "El campo $key $err";
//         }
//     }

// }

// function validar($value, $requisitos){
//     $ret = [];
//     if($requisitos[MINSIZE] || $requisitos[MAXSIZE]){
//         $ret[] = validarSize($value, $requisitos);
//     }
//     if($requisitos[EMAIL]){
//         $ret .= validarEmail($value, $requisitos);
//     }
//     if($requisitos[CLAVE]){
//         $ret .= validarClave($value, $requisitos);
//     }
// }

// function validarClave($value){
//     $err = false;
//     $ret = "debe contener ";
//     if(strlen($$value) < 8){
//         $ret .= "al menos ocho caracteres";
//         $err = true;
//     }
//     if (!preg_match('`[a-z]`',$value)){
//         $ret .= $err ? ", " : "";
//         $ret .= "al menos una letra minúscula";
//         $err = true;
//      }
//      if (!preg_match('`[A-Z]`',$value)){
//         $ret .= $err ? ", " : "";
//         $ret .= "al menos una letra mayúscula";
//         $err = true;
//      }
//      if (!preg_match('`[0-9]`',$value)){
//         $ret .= $err ? ", " : "";
//         $ret .= "al menos un caracter numérico";
//         $err = true;
//      }
// }












?>