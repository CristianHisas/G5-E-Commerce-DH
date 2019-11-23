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