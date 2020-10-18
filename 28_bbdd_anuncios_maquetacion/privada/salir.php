<?php
session_start();
//Elimino todas las variables de sesión:
session_destroy();
//Redirigir a la página publica:
header("Location:../publica/index.php");
?>