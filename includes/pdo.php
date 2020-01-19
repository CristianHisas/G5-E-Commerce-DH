<?php
$dsn = "";
$user = "";
$pass = "";

try
{
  $db = new PDO($dsn, $user,$pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (\Exception $e)
{
  echo "Error al conectar la base de datos";
  $e->getMessage();
}
?>
