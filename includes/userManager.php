<?php

define("USERS_BBDD_PATH", dirname(__FILE__) . "\..\data\usuarios.json");

if(!file_exists(USERS_BBDD_PATH)){
  file_put_contents(USERS_BBDD_PATH, "{}");
}

function mergeUser($user){
  $users = mergeObjectToFile(USERS_BBDD_PATH, $user);
}
function existsUser($user){
  return existsKeyOnFile(USERS_BBDD_PATH, $user["email"]);
}
function findUserByEmail($email){
  return getObjectFromFile(USERS_BBDD_PATH, $email);
}
function getUsers(){
  return getObjectsFromFile(USERS_BBDD_PATH);
}







?>