<?php
    session_start();
    session_destroy();
    setcookie("usuario",null,time()-1);
    setcookie("clave",null,time()-1);
    setcookie("email",null,time()-1); 
    header("Location: login.php");exit;
?>