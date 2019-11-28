<?php

function leerFile($path){
  return file_get_contents($path);
}

function escribirFile($path, $content){
  return file_put_contents($path, $content);
}

function agregarToFile($path, $content, $cut = ""){
  return file_put_contents($path, $cut . $content, FILE_APPEND);
}

function getObjectFromFile($path, $likeArray = true){
  $content = file_get_contents($path);
  $json = json_decode($content, $likeArray);
  return $json;
}

function mergeObjectToFile($path, $nuevo){
  $todo = getObjectFromFile($path);
  $todo = array_merge($todo, $nuevo);
  escribirFile($path, json_encode($todo));
}

function existsKeyOnFile($path, $key){
  $todo = getObjectFromFile($path);
  echo in_array($key, array_keys($todo));
}





// TESTING  ----------------------------------------------

// $arr = [];
// $arr["a"] = 1;
// $arr["b"] = 2;

// $path = "datos.json";

// escribirFile($path, json_encode($arr));

// $nuevo = ["c" => 3];

// mergeObjectToFile($path, $nuevo);

// echo "<br>";

// echo leerFile($path);


// echo "<br>";

// if(existsKeyOnFile($path, "b")){
//   echo "Está seteado 'b'";
// }else{
//   echo "No está seteado 'b'";
// }

// echo "<br>";

// if(existsKeyOnFile($path, "z")){
//   echo "Está seteado 'z'";
// }else{
//   echo "No está seteado 'z'";
// }

// echo "<br>";

// echo getObjectFromFile($path)["b"];

// echo "<br>";

// agregarToFile($path, "Texto random agregado", PHP_EOL);

// echo leerFile($path);

// END TESTING ----------------------------------------------------------------

?>