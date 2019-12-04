<?php
function validarFeha($fecha){
	$valores = explode('-', $fecha);
	if(count($valores) != 3 || !checkdate($valores[2], $valores[1], $valores[0])){
		return false;
    }
	return true;
}
?>