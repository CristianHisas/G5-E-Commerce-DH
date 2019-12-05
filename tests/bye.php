<?php
  session_start();
  session_destroy();

  echo "Estás deslogueado.";
  
  // require "../includes/userManager.php";
  // removeUser(findUserByEmail("usuario@removido.com"));

?>