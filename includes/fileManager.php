<?php

function leerArchivo($path){
  return file_get_contents($path);
}

function sobreescribirArchivo($path, $content){
  return file_put_contents($path, $content);
}

function agregarAArchivo($path, $content, $cut = PHP_EOL){
  return file_put_contents($path, $cut . $content);
}

function getJsonFromFile($path, $likeArray = true){
  $content = file_get_contents($path);
  $json = json_decode($content, $likeArray);
  return $json;
}

function agregarJsonToFile($path, $arrayAssoc){
  $content getJsonFromFile($path);
  $todo = json_decode($content, true);
  
}










?>