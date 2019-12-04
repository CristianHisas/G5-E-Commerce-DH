<?php

define("USERS_BBDD_PATH", dirname(__FILE__) . "\..\data\usuarios.json");
define("USER_EMAIL", dirname(__FILE__) . "\..\data\user_email.json");

if(!file_exists(USERS_BBDD_PATH)){
  file_put_contents(USERS_BBDD_PATH, "{}");
}
if(!file_exists(USER_EMAIL)){
  file_put_contents(USER_EMAIL, "{}");
}

function mergeUser($user){
  mergeObjectToFile(USERS_BBDD_PATH, $user);
  foreach($user as $theUser){
    $userEmail[$theUser["usuario"]] = $theUser["email"];
    mergeObjectToFile(USER_EMAIL, $userEmail);
  }
}

function existsUser($user){
  if(existsKeyOnFile(USERS_BBDD_PATH, $user["email"])
   ||
   existsKeyOnFile(USER_EMAIL, $user["usuario"])
   ){
    return true;
   }
   return false;
}
function findUserByEmail($email){
  return getObjectFromFile(USERS_BBDD_PATH, $email);
}
function findUserByUserName($userName){
  $email = getObjectFromFile(USER_EMAIL, $userName);
  return findUserByEmail($email);
}
function getUsers(){
  return getObjectsFromFile(USERS_BBDD_PATH);
}







?>