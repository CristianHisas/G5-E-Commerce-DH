<?php
function guardarArrayYpasarAJson($direccion,$miArray){
    $miJsonUsuarios=json_encode($miArray);
    file_put_contents($direccion,$miJsonUsuarios);
}
function activarDesactivarInput($valor=true){
    if($valor){
        echo "disabled";
    }else{
        echo "";
    }
}