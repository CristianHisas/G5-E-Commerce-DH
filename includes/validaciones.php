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
define("CLAVE", "d6");
define("CORREO", "d1");
define("MINSIZE", "d2");
define("MAXSIZE", "d3");
define("SCAPE", "4d");
define("TELEFONO", "5d");


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