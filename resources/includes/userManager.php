<?php
require_once "./includes/fileManager.php";
/*
COMO MODIFICAR USUARIOS:
  1) $_SESSION["activeUser"]["<atributo>"] = "<valor>";
  2) mergeUser($_SESSION["activeUser"]);
  ** NO PERMITIR CAMBIOS DE EMAIL NI USERNAME





*/
define("USERS_BBDD_PATH", dirname(__FILE__) . "\..\data\usuarios.json");
define("USER_EMAIL", dirname(__FILE__) . "\..\data\user_email.json");

if(!file_exists(USERS_BBDD_PATH)){
  file_put_contents(USERS_BBDD_PATH, "{}");
}
if(!file_exists(USER_EMAIL)){
  file_put_contents(USER_EMAIL, "{}");
}

function mergeUser($user){
  $u = [];
  $u[$user["email"]] = $user;
  mergeObjectToFile(USERS_BBDD_PATH, $u);
  foreach($u as $theUser){
    $userEmail[$theUser["usuario"]] = $theUser["email"];
    mergeObjectToFile(USER_EMAIL, $userEmail);
  }
}

function existsUser($user){
  if(
    existsKeyOnFile(USERS_BBDD_PATH, $user["email"])
    || existsKeyOnFile(USER_EMAIL, $user["usuario"])
  ){
    return true;
  }
  return false;
}

function existsUserName($userName){
  return existsKeyOnFile(USER_EMAIL, $user["usuario"]);
}
function existsUserEmail($userEmail){
  return existsKeyOnFile(USERS_BBDD_PATH, $user["email"]);
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
function removeUser($user){
  $users = getUsers();
  removeObjectFromFile(USERS_BBDD_PATH, $user["email"]);
  removeObjectFromFile(USER_EMAIL, $user["usuario"]);
}

function updateUserEmail($new, $old){
  if(existsUserEmail($new)) return false;
  $user = findUserByEmail($old);
  removeUser($user);
  $user["email"] = $new;
  mergeUser($user);
}

function updateUserName($new, $old){
  if(existsUserName($new)) return false;
  $user = findUserByUserName($old);
  // innecesario
  removeUser($user);
  $user["usuario"] = $new;
  mergeUser($user);
}




?>
