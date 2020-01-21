<?php
$dsn = "mysql:host=localhost;dbname=e_commerce";//esto es porque cuando lo  cree puse mal el nombre e_commmer pero seria e-Commerce
$user = "root";
$pass = "";

try
{
  $db = new PDO($dsn, $user,$pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec('SET CHARACTER SET utf8');//para que acepte Ñ por ejemplo
}
catch (\Exception $e)
{
  echo "Error al conectar la base de datos";
  echo $e->getMessage();
}
?>
