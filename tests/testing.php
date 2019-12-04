<?php
require "../includes/fileManager.php";

$arr = [];

$arr["key"] = "valor";

// Cambiar "null" por "{}" en el archivo que crea y ya funciona. Después lo corrijo
mergeObjectToFile("fileName.json", $arr);


?>