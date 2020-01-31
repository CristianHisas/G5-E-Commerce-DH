<?php
$dsn = "mysql:host=localhost;dbname=e-commerce";
$user = "root";
$pass = "";

try
{
  $db = new PDO($dsn, $user,$pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec('SET CHARACTER SET utf8');
}
catch (\Exception $e)
{
 
 $e->getMessage();
 echo "Error al conectar la base de datos";
}
?>
